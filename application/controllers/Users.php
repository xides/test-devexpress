<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        @session_start();
        parent::__construct();

        if (!isset($_SESSION['id'])) {
            redirect('login');
        }
    }

    public function get_users()
    {

        $this->db->select('id,nombre,apellido,email,estado,created_at');

        $data = $this->user_model->getUsers();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function delete()
    {
        if($this->input->post('key')==2){
            return false;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($this->user_model->delete()));
    }

    public function store()
    {
        $data = json_decode( $this->input->post('values'),true );
        $data['contrasena'] = $this->encrypt->encode( $data['contrasena'] );

        $this->output->set_content_type('application/json')->set_output(json_encode( $this->user_model->insert($data) ));
    }

    public function update()
    {
        $encrypted_password = $this->encrypt->encode($this->input->post('contrasena'));

        $data = json_decode( $this->input->post('values'),true );

        $this->output->set_content_type('application/json')->set_output(json_encode( $this->user_model->update($data) ));
    }
}
