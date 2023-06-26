<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        @session_start();
        parent::__construct();

        if (isset($_SESSION['id'])) {
            redirect('manage');
        }

        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function validation()
    {
        $this->form_validation->set_rules('email', 'Correo electrónico', 'required|trim|valid_email');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required');

        if ($this->form_validation->run()) {
            $result = $this->login_model->login($this->input->post('email'), $this->input->post('contrasena'));

            if ($result) {
                redirect('manage');
            }
        }
        $this->index();
    }
}
