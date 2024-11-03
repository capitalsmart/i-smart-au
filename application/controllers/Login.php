<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("isUserLoggedIn")) {
            redirect("/", "refresh");
        }
    }

    public function index()
    {
        $data['error'] = "";
        if ($this->input->post()) {
            if($this->input->post("password") === ADMIN_PASSWORD) {
                $this->session->set_userdata("isUserLoggedIn", true);
                redirect("/", "refresh");
            } else {
                $data['error'] = "Incorrect Password Entered.";
            }
        }
        $this->load->view('login/index', $data);
    }
}