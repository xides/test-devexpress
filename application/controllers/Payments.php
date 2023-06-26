<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    public function __construct()
    {
        @session_start();
        parent::__construct();

        if (!isset($_SESSION['id'])) {
            redirect('login');
        }
    }

    public function get( $userId=0 )
    {
        $data = $this->payments_model->get($userId);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function delete()
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($this->payments_model->delete()));
    }

    public function store()
    {
        $data = json_decode( $this->input->post('values'),true );
        $data['contrasena'] = $this->encrypt->encode( $data['contrasena'] );

        $this->output->set_content_type('application/json')->set_output(json_encode( $this->payments_model->insert($data) ));
    }

    public function save()
    {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'tipo_id' => $this->input->post('Tipo'),
            'cantidad' => $this->input->post('Cantidad'),
            'monto_a_pagar' => $this->input->post('Monto_a_pagar'),
            'fecha_a_pagar' => $this->input->post('Fecha_a_pagar'),
            'comentarios' => $this->input->post('Comentarios'),
        ];

        $this->payments_model->insert($data);
        redirect('/manage/payments');
    }

    public function update()
    {
        $data = json_decode( $this->input->post('values'),true );

        $this->output->set_content_type('application/json')->set_output(json_encode( $this->payments_model->update($data) ));
    }

    public function add($id=0)
    {
        $data['roles'] = $this->role_model->get();
        $data['current_id'] = (int) $id;
        $data['pago_tipos'] = $this->payments_model->get_types();
        $this->load->view('add_payment',$data);
    }

}
