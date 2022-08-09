<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($tab, $value)
    {
        $this->db->like('email_usuario', $tab);
        $this->db->like('senha_usuario', $value);
        $query = $this->db->get('tab_usuario', 1);         
        if ($query->num_rows() == 1) {
            $row = $query->row();
           
            return $row->email_usuario;
        } else {
            return NULL;
        }
    }

    public function logout()
    {
    }
}
