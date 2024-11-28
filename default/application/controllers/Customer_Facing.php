<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

class Customer_Facing extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
		/*
        if (!$this->session->userdata("isUserLoggedIn") && !isset($_REQUEST['isAjax'])) {
            redirect('/Login/index', 'refresh');
        } elseif(!$this->session->userdata("isUserLoggedIn") && isset($_REQUEST['isAjax'])) {
            $response = [
                'redirectUrl' => '/Login/index',
                'message' => 'unauthorized',
                'status' => 403
            ];
            echo json_encode($response);
            die;
        }
		*/
        $this->load->model('Cars_Model');
        $this->load->model('Car_Models_Model');


        $this->load->helper('url');
        $config['upload_path'] = '/assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        $this->load->helper('fineuploader');
    }


    /*--------------   Index Function of the Controller -- return view --------------------------*/
    public function index()
    {

        if ($this->session->userdata("uuid-user")) {
            if($this->session->userdata("form-status") !== "submitted") {
                $tempDir = 'assets/uploads/'.$this->session->userdata("uuid-user");
                if (file_exists($tempDir)) {
                    deleteDir($tempDir);
                    $this->session->unset_userdata("user-files");
                }
            }
        }
        $newSessionInfo = [
            'uuid-user' => uniqid("user_"),
            'form-status' => 'new'
        ];
        $this->session->set_userdata($newSessionInfo);
        $data = array();
        $data['first_name'] = (isset($_GET["fname"]) && !empty($_GET["fname"])) ? $_GET['fname'] : "";
        $data['sur_name'] = (isset($_GET["sname"]) && !empty($_GET["sname"])) ? $_GET['sname'] : "";
        $data['email'] = (isset($_GET["em"]) && !empty($_GET["em"])) ? $_GET['em'] : "";
        $data['phone'] = (isset($_GET["ph"]) && !empty($_GET["ph"])) ? $_GET['ph'] : "";
        $data['car_make'] = (isset($_GET["cmake"]) && !empty($_GET["cmake"])) ? $_GET['cmake'] : "";
        $data['car_reg'] = (isset($_GET["vreg"]) && !empty($_GET["vreg"])) ? $_GET['vreg'] : "";
        $data['car_model'] = (isset($_GET["cmodel"]) && !empty($_GET["cmodel"])) ? $_GET['cmodel'] : "";
        $data['car_year'] = (isset($_GET["cyear"]) && !empty($_GET["cyear"])) ? $_GET['cyear'] : "";

        $this->load->view('customer_facing', $data);

    }


    public function get_car()
    {
        $key = $_POST['car_make'];
        $data = $this->Cars_Model->get_car($key);

        if ($data) {
            echo json_encode($data);
        } else {
            echo false;
        }
    }

    public function get_model()
    {
        $car_id = $_POST['car_make'];
        $key = $_POST['car_model'];
        $data = $this->Car_Models_Model->get_model($car_id, $key);

        if ($data) {
            echo json_encode($data);
        } else {
            echo false;
        }
    }

    function load_cars()
    {
        $keyword = $_POST['keyword'];
        $data = $this->Cars_Model->get_cars_list($keyword);
        echo json_encode($data);
    }

    function load_car_models()
    {
        $car_id = $_POST['car_id'];
        $keyword = $_POST['keyword'];

        $data = $this->Car_Models_Model->get_car_models($car_id, $keyword);
        echo json_encode($data);

    }

    /*  --------------------- From Submit ----------    */
    function Submit()
    {
        $this->load->library('form_validation');
        $rules = $this->Cars_Model->rules;
        $this->load->helper('file');

        if ($this->input->post()) {
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == TRUE) {
                $return = false;
                $data = $_POST;
                $annotatedImage = null;
                if ($this->session->userdata('user-files') == null ||  count($this->session->userdata('user-files')) == 0) {
                    $array = array("message" => "error", "status" => 400);
                    echo json_encode($array);
                    exit;
                }

                if (!empty($_POST['annotated-image'])) {
                    $annotatedImage = base64_to_jpeg($_POST['annotated-image'], 'assets/uploads/'
                            . $this->session->userdata("uuid-user") . '/damage-capture-' . time() . '.jpg');
                }
                
                $photos = $this->getUserUploadedFiles();
                $sent_to_customer = $this->sendEmailToCustomer($data, $photos, $annotatedImage);
                $sent_to_csra = $this->sendEmailToCSRATeam($data, $photos, $annotatedImage);

                if ($sent_to_customer && $sent_to_csra) {
                    $return = true;
                }

                if ($return) {
                    rrmdir("assets/uploads/" . $this->session->userdata("uuid-user"));
                    if ($this->session->userdata("user-files")) {
                       $this->session->unset_userdata("user-files");
                    }
                    $newSessionInfo = [
                        'uuid-user' => uniqid("user_"),
                    ];
                    $this->session->set_userdata($newSessionInfo);

                    $array = array("message" => "success", "status" => 200);
                    echo json_encode($array);
                } else {
                    $array = array("message" => "error", "status" => 400);
                    echo json_encode($array);
                }
            } else {

                $errors_array = $this->validation_errors_to_array($rules);
                $errors = array();
                if ($errors_array) {
                    foreach ($errors_array as $error_field => $error_msg) {
                        $errors[$error_field] = str_replace(["<p>", "</p>"], "", $error_msg);
                    }
                }
                $json = $this->array2json($errors);
                echo $json;
            }
        }
    }

    private function sendEmailToCSRATeam($data, $photos, $annotatedImage)
    {
        $email_template_data = [
            'first_name' => ucfirst(strtolower(trim($data['first_name']))),
            'surname' => ucfirst(strtolower(trim($data['surname']))),
            'photos' => $photos,
            'forminputs' => [
                'Email' => trim($data['email']),
                'Phone Number' => trim($data['phone']),
               // 'Order Number' => trim($data['order_number']),
                'Site' => trim($data['csra_site']),
               // 'Car Make' => trim($data['car_make']),
                'Car Registration' => trim($data['vehicle_registration']),
              //  'Car Model' => trim($data['car_model']),
              //  'Car Year' => trim($data['car_year']),
              //  'Body Type' => trim($data['car_type']),
                'Vin Number' => trim($data['vin_number']),
              //  'Color' => trim($data['car_color']),
                'Comments' => trim($data['comments']),
            ]
        ];
        $message = $this->load->view('emails/csra_team_email.php', $email_template_data, TRUE);
		$xmlFile = save_data_as_xml_file($data, $this->session->userdata("uuid-user"));
        
		$crsateam = implode(";",$this->config->item('csra_emails')[ENVIRONMENT]['csra_team_emails']);
		
		//echo $crsateam;
		//return custom_send_email(
		return sendgrid_send_email(
                $crsateam,
                null,
		"i-S.M.A.R.T Repair Request - ".trim($data['vehicle_registration']),
                $message,
                $photos,
                $annotatedImage,
                $xmlFile
        );
    }

    private function sendEmailToCustomer($data, $photos, $annotatedImage)
    {
        $email_template_data = [
            'first_name' => ucfirst(strtolower(trim($data['first_name']))),
            'surname' => ucfirst(strtolower(trim($data['surname']))),
           // 'order_number' => trim($data['order_number']),
            'photos' => $photos,
            'forminputs' => [
           //     'Make' => trim($data['car_make']),
            //    'Model' => trim($data['car_model']),
                'Registration' => trim($data['vehicle_registration']),
            ]
        ];
        $message = $this->load->view('emails/customer_email.php', $email_template_data, TRUE);
        
        //return custom_send_email(
		return sendgrid_send_email(
                $data['email'],
                $this->config->item('csra_emails')[ENVIRONMENT]['cc_recipient_customer_email'],
                "i-S.M.A.R.T Repair Request - ".trim($data['vehicle_registration']),
                $message,
                $photos,
                $annotatedImage
        );
    }

    private function getUserUploadedFiles()
    {
        $photos = [];
        foreach ($this->session->userdata("user-files") as $key => $photo) {
            $photos[] = "assets/uploads/" . $this->session->userdata("uuid-user") . "/" . $key ."/" . $photo;
        }
        return $photos;
    }
    /* ----------- Name Check --------------*/
    public function name_check($str)
    {

        if (empty($str)) {
            return FALSE;
        }
//        return (!preg_match("/^[a-z' '\s]+$/i", $str)) ? FALSE : TRUE;
        return (!preg_match("/^[a-zA-Z' '\s]+$/i", $str)) ? FALSE : TRUE;
    }


    /* ----------- phone Check ------------*/
    public function phone_check($str)
    {
        return (!preg_match("/^(?:\+)?[0-9]{7,18}$/i", $str)) ? FALSE : TRUE;
    }


    public function validate_car_make()
    {
        $keyword = $_POST['car_make'];
        $data = $this->Cars_Model->get_cars_list($keyword);
       if(isset($data) && !empty($data)){
        echo json_encode('true');
       }else{
           echo json_encode('Car Make does not exist');
       }

    }


    public function validate_car_model()
    {

        $car_id = $_POST['car_make'];
        $keyword = $_POST['car_model'];

        $data = $this->Car_Models_Model->get_car_models($car_id, $keyword);
        if(isset($data) && !empty($data)){
            echo json_encode('true');
        }else{
            echo json_encode('Car Model does not exist');
        }
    }


    /* -------------------  convert errors to array ----------------- */
    public function validation_errors_to_array($validation_rules)
    {

        $errors_array = array();

        if ($this->form_validation->run() == false) {

            foreach ($validation_rules as $row) {

                $field = $row['field'];
                $error = form_error($field);
                if ($error)
                    $errors_array[$field] = $error;
            }

            $errors = array();
            foreach ($errors_array as $error_field => $error_msg) {
                $errors[$error_field] = str_replace(["<p>", "</p>"], "", $error_msg);
            }


            return $errors;
        } else
            return false;
    }


    /*  ---------   Errors array to Json ----------- */
    function array2json($arr)
    {
        if (function_exists('json_encode')) return json_encode($arr); //Lastest versions of PHP already has this functionality.
        $parts = array();
        $is_list = false;

        //Find out if the given array is a numerical array
        $keys = array_keys($arr);
        $max_length = count($arr) - 1;
        if (($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
            $is_list = true;
            for ($i = 0; $i < count($keys); $i++) { //See if each key correspondes to its position
                if ($i != $keys[$i]) { //A key fails at position check.
                    $is_list = false; //It is an associative array.
                    break;
                }
            }
        }

        foreach ($arr as $key => $value) {
            if (is_array($value)) { //Custom handling for arrays
                if ($is_list) $parts[] = array2json($value); /* :RECURSION: */
                else $parts[] = '"' . $key . '":' . array2json($value); /* :RECURSION: */
            } else {
                $str = '';
                if (!$is_list) $str = '"' . $key . '":';

                //Custom handling for multiple data types
                if (is_numeric($value)) $str .= $value; //Numbers
                elseif ($value === false) $str .= 'false'; //The booleans
                elseif ($value === true) $str .= 'true';
                else $str .= '"' . addslashes($value) . '"'; //All other things
                $parts[] = $str;
            }
        }
        $json = implode(',', $parts);

        if ($is_list) return '[' . $json . ']';//Return numerical JSON
        return '{' . $json . '}';//Return associative JSON
    }


}
