<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("username")) {
            redirect(base_url("Home"));
        }
    }

    public function index() {
        $this->load->view("masuk");
    }

    public function saveUserData() {
        $username = $this->input->post("username");
        $userData = $this->input->post("userData");
        $this->session->set_userdata("username", $username);
        $this->session->set_userdata("userData", $userData);    
        echo "Data disimpan dalam sesi";
    }
}

