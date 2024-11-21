 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileUploader extends CI_Controller {

 
 public function __construct() {
        // Ensure session is started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if user is logged in and handle AJAX requests
       /*  if ($this->session->userdata("isUserLoggedIn") && !isset($_REQUEST['isAjax'])) {
            redirect('/Login/index', 'refresh');
        } elseif (!$this->session->userdata("isUserLoggedIn") && isset($_REQUEST['isAjax'])) {
            $response = [
                'redirectUrl' => '/Login/index',
                'message' => 'Not Authorized',
                'code' => '403'
            ];
            echo json_encode($response);
            exit;
        }
		*/

        $this->load->library("fineuploader");
        $this->load->helper("fineuploader");
    }

    public function index() {
        // Check if user UUID is set
        if ($this->session->userdata("uuid-user") === null) {
            header('HTTP/1.1 401 Unauthorized', true, 401);
            exit();
        }

        $this->fineuploader->allowedExtensions = ['jpeg', 'jpg', 'png'];
        $this->fineuploader->sizeLimit = 2000000; // 2 MB
        $uploadDir = 'assets/uploads/' . $this->session->userdata("uuid-user");
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "POST") {
            header("Content-Type: text/plain");

            if (isset($_GET["done"])) {
                $result = $this->fineuploader->combineChunks("files");
            } else {
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $result = $this->fineuploader->handleUpload($uploadDir);
                $result["uploadName"] = $this->fineuploader->getUploadName();
                $files = $this->session->userdata("user-files") == null ? [] : $this->session->userdata("user-files");
                $files[$result['uuid']] = $result['uploadName'];
                $this->session->set_userdata("user-files", $files);
            }
            echo json_encode($result);
        } elseif ($method == "DELETE") {
            $result = $this->fineuploader->handleDelete($uploadDir);
            $tempDir = 'assets/uploads/' . $this->session->userdata("uuid-user") . "/" . $result['uuid'];
            if (file_exists($tempDir)) {
                deleteDir($tempDir);
            }
            $files = $this->session->userdata("user-files") == null ? [] : $this->session->userdata("user-files");
            unset($files[$result['uuid']]);
            $this->session->set_userdata("user-files", $files);
            echo json_encode($result);
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
    }
}
