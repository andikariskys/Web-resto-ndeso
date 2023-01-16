<?php

    class Login extends CI_Controller
    {
        public function index()
        {
            $title['title'] = "Login";
            $this->load->view('templates/header', $title);
            $this->load->view('login');
            $this->load->view('templates/footer');
        }

        public function reset_pass()
        {
            $title['title'] = "Reset Password";
            $this->load->view('templates/header', $title);
            $this->load->view('reset_password');
            $this->load->view('templates/footer');
        }
    }


?>