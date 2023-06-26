<?php
class User_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function getUsers($id=0)
    {
        if( $id!=0 ){
            $this->db->where('id', $id);
        }

        if ( $this->input->get('$orderby') ) {
            $this->db->order_by( $this->input->get('$orderby') );
        }else{
            $this->db->order_by( 'created_at','desc' );
        }

        $r = $this->db->get('users');

        return $r->result_array();
    }

    function delete( ){

        $this->db->where('user_id', $this->input->post('key') );
        $this->db->delete('pagos');

        $this->db->where('id', $this->input->post('key') );
        return $this->db->delete('users');
    }

    function update( $data ){
        $this->db->where('id', $this->input->post('key') );
        $this->db->update('users',$data);
    }
}
