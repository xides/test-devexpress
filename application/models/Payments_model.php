<?php
class Payments_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('pagos', $data);
        return $this->db->insert_id();
    }

    function get($userId)
    {
        if($_SESSION['super_admin']!='1'){
            $this->db->where('user_id', $_SESSION['id']);
        }

        $this->db->select('pago_tipos.pago,users.nombre as usuario');
        $this->db->select('pagos.*');

        if ( $userId ) {
            $this->db->where('user_id', $userId );
        }

        if ( $this->input->get('$orderby') ) {
            $this->db->order_by( $this->input->get('$orderby') );
        }


        $this->db->join('pago_tipos', 'pago_tipos.id = pagos.tipo_id');
        $this->db->join('users', 'users.id = pagos.user_id');

        $r = $this->db->get('pagos');

        return $r->result_array();
    }

    function get_types( )
    {
        $r = $this->db->get('pago_tipos');
        return $r->result_array();
    }

    function delete( ){

        $this->db->where('id', $this->input->post('key') );
        return $this->db->delete('pagos');
    }

    function update( $data ){
        $this->db->where('id', $this->input->post('key') );
        $this->db->update('pagos',$data);
    }
}
