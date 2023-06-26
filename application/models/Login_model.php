<?php
class Login_model extends CI_Model
{
    public function login($email, $contrasena): bool
    {
        $this->db->where('email', $email);
        $this->db->where('estado', 1);
        $this->db->select('users.id,users.nombre,users.apellido,users.contrasena,roles.super_admin');
        $this->db->join('roles', 'roles.id = users.rol_id');

        $query = $this->db->get('users');

        $result = $query->row_array();

        if ($query->num_rows()== 0) { return false; }

        $decrypted_pass = $this->encrypt->decode($result['contrasena']);

        if ($decrypted_pass != $contrasena) { return false; }

        $_SESSION['id'] = $result['id'];
        $_SESSION['nombres'] = $result['nombre'];
        $_SESSION['apellidos'] = $result['apellido'];
        $_SESSION['super_admin'] = $result['super_admin'];

        return true;
    }
}
