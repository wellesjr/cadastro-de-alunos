<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro_model extends CI_Model
{
    public function estado()
    {
        $this->db->select('id_estado,nome_completo');
        $results = $this->db->get('tab_estado')->result();
        $list = array();
        foreach ($results as $result) {
            $list[$result->id_estado] = $result->nome_completo;
        }
        return $list;
    }

    public function insert_aluno($dados)
    {
        if (isset($dados['id_aluno']) and  $dados['id_aluno'] > 0) {
            /**Aluno já existe, vou editar */
            $this->db->where('id_aluno', $dados['id_aluno']);
            unset($dados['id_aluno']);
            $this->db->update('tab_aluno', $dados);
            return $this->db->affected_rows();
        } else {
            /**Aluno não existe ,vou inserir */
            $this->db->insert('tab_aluno', $dados);
            $id = $this->db->insert_id();
            return $id;
        }
    }
}
