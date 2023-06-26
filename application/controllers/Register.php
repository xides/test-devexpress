<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id'])) {
            redirect('manage');
        }

    }

    public function index()
    {
        $this->load->view('register');
    }

    public function validation()
    {
        $this->form_validation->set_rules('nombre', 'Nombres', 'required|trim');
        $this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim');
        $this->form_validation->set_rules('email', 'Corre electrónico', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required');
        if ($this->form_validation->run()) {

            $encrypted_password = $this->encrypt->encode($this->input->post('contrasena'));

            $data = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'email' => $this->input->post('email'),
                'estado' => 1,
                'contrasena' => $encrypted_password,

            );
            $id = $this->user_model->insert($data);

            redirect('login');
        } else {
            $this->index();
        }
    }

}
