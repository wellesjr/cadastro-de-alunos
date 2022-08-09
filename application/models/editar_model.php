<?php defined('BASEPATH') or exit('No direct script access allowed');

class Editar_model extends CI_Model
{
    public function listar_alunos()
    {
        $this->db->select('*, nome_completo');
        $this->db->join('tab_estado', 'id_estado = estado');
        $this->db->order_by('id_aluno', 'desc');
        $query = $this->db->get('tab_aluno')->result_array();
        return $query;
    }

    public function get_aluno($id = 0)
    {
        $this->db->where('id_aluno', $id);
        $this->db->join('tab_estado', 'id_estado = estado');
        $query = $this->db->get('tab_aluno', 1);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row;
        } else {
            return NULL;
        }
    }

    public function excluir_aluno($id = 0)
    {
        $this->db->where('id_aluno', $id);
        $this->db->delete('tab_aluno');
        return $this->db->affected_rows();
    }
}
