<?php
class Role_model extends CI_Model
{
    function get()
    {
        $r = $this->db->get('roles');
        return $r->result_array();
    }
}
