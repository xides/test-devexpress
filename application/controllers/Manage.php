<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        @session_start();
        parent::__construct();

        if (!isset($_SESSION['id'])) {
            redirect('login');
        }
    }

    public function index()
    {
        if($_SESSION['super_admin']=='0'){ redirect('manage/payments'); }

        $data['roles'] = $this->role_model->get();
        $this->load->view('registers',$data);
    }

    public function payments($id=0)
    {
        if($id){
            $user = $this->user_model->getUsers($id);
            if(!$user){
                die('Usuario no encontrado');
            }
            $data['user'] = $user[0];
        }else {
            $data['user'] = NULL;
        }

        $data['roles'] = $this->role_model->get();
        $data['current_id'] = (int) $id;
        $data['pago_tipos'] = $this->payments_model->get_types();
        $this->load->view('payments',$data);
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
