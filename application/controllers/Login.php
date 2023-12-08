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

    public function listData() {
        $username = trim(str_replace("'", "''",$this->input->get("username")));
        $pass = trim(str_replace("'", "''", $this->input->get("pass")));
        $ambil_data = file_get_contents('http://103.215.177.169/hris/API/Employee/CheckEmployeeExist?id=' . $username . '&password=' . $pass);
        if ($ambil_data === FALSE) {
            echo json_encode(["status" => "error", "message" => "Gagal mengambil data dari server"]);
            return;
        }

        $userdata = json_decode($ambil_data, true);
        if ($this->saveUserData($username, $userdata)) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal menyimpan data ke dalam sesi"]);
        }

    }

    public function saveUserData($username, $userData) {
        $this->session->set_userdata("username", $username);
        $this->session->set_userdata("userData", $userData);

        return $this->session->userdata("username") === $username && $this->session->userdata("userData") === $userData;
    }
}
