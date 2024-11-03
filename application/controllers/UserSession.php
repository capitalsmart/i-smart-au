<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSession extends CI_Controller {

    public function check()
    {
        $response = [];
        if(!$this->session->userdata("isUserLoggedIn")) {
            $this->session->set_userdata("isUserLoggedIn", false);
            $response = [
                'redirectUrl' => 'Login/index',
                'message' => 'unauthorized',
                'status' => '403'
            ];
        } else {
            $response = [
                'redirectUrl' => '',
                'message' => 'OK',
                'status' => 200
            ];
        }
        header("Content-type:application/json");
        echo json_encode($response);
    }
}
