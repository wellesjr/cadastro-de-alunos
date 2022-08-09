<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper();
    }

    public function home()
    {
        $data['title'] = 'Home';
        $this->load->view('home', $data);
    }

    public function cadastro()
    {
        verifica_login();

        /** Validação do formulario */
        $this->load->helper('form');
        $this->load->library(array('form_validation'));


        /** Regras de validação */
        $this->form_validation->set_rules('imagem', 'Imagem', 'trim');
        $this->form_validation->set_rules('nome_aluno', '<strong>Nome</strong>', 'trim|required');
        $this->form_validation->set_rules('cep', 'Cep', 'trim|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('estado', 'Estado', 'trim');
        $this->form_validation->set_rules('rua', 'Rua', 'trim');
        $this->form_validation->set_rules('numero', 'Numero', 'trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim');

        if ($this->form_validation->run() == FALSE) {
            if (validation_errors()) {
                set_msg(validation_errors());
            }
        } else {

            $this->load->model('cadastro_model');
            $this->load->library('upload', config_upload());
            if ($this->upload->do_upload('imagem')) {

                /**Upload ok */
                $dados_upload = $this->upload->data();
            } else {
                /**Mensagem de erro */
                $msg = $this->upload->display_errors();
                $msg .= '<p>"Falha no carregamento da Imagem! limite maximo 512kb, PNG e JPG"</p>';
                set_msg($msg);
            }
            $dados_upload = $this->upload->data();
            $dados_form = $this->input->post();
            $dados_insert['nome_aluno'] = $dados_form['nome_aluno'];
            $dados_insert['cep'] = $dados_form['cep'];
            $dados_insert['estado'] = $dados_form['estado'];
            $dados_insert['cidade'] = $dados_form['cidade'];
            $dados_insert['rua'] = $dados_form['rua'];
            $dados_insert['numero'] = $dados_form['numero'];
            $dados_insert['bairro'] = $dados_form['bairro'];
            $dados_insert['foto_aluno'] = $dados_upload['file_name'];


            if ($id = $this->cadastro_model->insert_aluno($dados_insert)) {

                set_msg('<p>"O cadastro foi realizado com sucesso"</p>');
                redirect('page/editar/' . $id, 'refresh');
            } else {
                set_msg('<p>"Falha ao realizar cadastro"</p>');
            }
        }

        $this->load->model('cadastro_model');
        $data['estados'] = $this->cadastro_model->estado();
        $data['tela'] = 'cadastrar';
        $data['title'] = 'Cadastrar novo Aluno';
        $this->load->view('aluno/cadastro_page', $data);
    }

    public function editar()
    {
        verifica_login();
        $this->load->model('editar_model');
        $this->load->model('cadastro_model');

        //verifica se o id do aluno foi passado
        $id = $this->uri->segment(3);

        if ($id > 0) {
            if ($aluno = $this->editar_model->get_aluno($id)) {
                $data['aluno'] = $aluno;
                $dados_upload = $aluno->id_aluno;
            } else {
                set_msg('<script language="javascript">alert("Aluno inexistente! Escolha um aluno para editar!")</script>');
                set_msg('<p>"Aluno inexistente!Escolha um aluno para editar!"</p>');
                redirect('buscar', 'refresh');
            }
        } else {
            set_msg('<script language="javascript">alert("Você deve selecionar um aluno para a edição!")</script>');
            set_msg('<p>"Você deve selecionar um aluno para a exclusão!"</p>');
            redirect('buscar', 'refresh');
        }

        $this->load->helper('form');
        $this->load->library(array('form_validation'));

        /**Regra de validação */
        $this->form_validation->set_rules('imagem', 'Imagem', 'trim');
        $this->form_validation->set_rules('nome_aluno', '<strong>Nome</strong>', 'trim|required');
        $this->form_validation->set_rules('cep', 'Cep', 'trim|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('estado', 'Estado', 'trim');
        $this->form_validation->set_rules('rua', 'Rua', 'trim');
        $this->form_validation->set_rules('numero', 'Numero', 'trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim');


        /** Verifica a validação */
        if ($this->form_validation->run() == FALSE) {
            if (validation_errors()) {
                set_msg(validation_errors());
            }
        } else {
            $this->load->library('upload', config_upload());

            if (isset($_FILES['imagem']) && $_FILES['imagem']['name'] != '') {

                //ja existe uma imagem foto no banco de dados 
                if ($this->upload->do_upload('imagem')) {

                    $imagem_anterior = 'uploads/' . $aluno->foto_aluno;
                    $dados_upload = $this->upload->data();
                    $dados_form = $this->input->post();
                    $dados_update['id_aluno'] = $id;
                    $dados_update['nome_aluno'] = $dados_form['nome_aluno'];
                    $dados_update['cep'] = $dados_form['cep'];
                    $dados_update['estado'] = $dados_form['estado'];
                    $dados_update['cidade'] = $dados_form['cidade'];
                    $dados_update['rua'] = $dados_form['rua'];
                    $dados_update['numero'] = $dados_form['numero'];
                    $dados_update['bairro'] = $dados_form['bairro'];
                    $dados_update['foto_aluno'] = $dados_upload['file_name'];
                    
                    if ($this->cadastro_model->insert_aluno($dados_update)) {
                        if (!empty($aluno->foto_aluno)) {
                            if (file_exists('uploads/' . $aluno->foto_aluno)) {
                                unlink('uploads/' . $aluno->foto_aluno);
                                set_msg('<p>O cadastro do aluno foi alterado com sucesso!</p>');
                                redirect('buscar', 'refresh');
                            }
                            set_msg('<p>O cadastro do aluno foi alterado com sucesso!</p>');
                            redirect('buscar', 'refresh');
                            $data['aluno']->foto_aluno = $dados_update['foto_aluno'];
                            
                        }
                    } else {
                        set_msg('<p>Erro! O cadastro do aluno não foi alterado!</p>');
                    }
                } else {
                    /** Erro no Upload */

                    $msg = $this->upload->display_errors();
                    $msg .= '<p>"Falha no carregamento da Imagem!\n limite maximo 512kb, PNG e JPG"</p>';
                    set_msg($msg);
                }
            } else {
                /**Não foi enviado uma imagem pelo form  */
                $dados_form = $this->input->post();
                $dados_update['id_aluno'] = $id;
                $dados_update['nome_aluno'] = $dados_form['nome_aluno'];
                $dados_update['cep'] = $dados_form['cep'];
                $dados_update['estado'] = $dados_form['estado'];
                $dados_update['cidade'] = $dados_form['cidade'];
                $dados_update['rua'] = $dados_form['rua'];
                $dados_update['numero'] = $dados_form['numero'];
                $dados_update['bairro'] = $dados_form['bairro'];
                if ($this->cadastro_model->insert_aluno($dados_update)) {
                    set_msg('<p>O cadastro do aluno foi alterado com sucesso!</p>');
                    redirect('buscar', 'refresh');
                } else {
                    set_msg('<p>Erro! O cadastro do aluno não foi alterado!</p>');
                }
            }
        }


        $data['estados'] = $this->cadastro_model->estado();
        $data['tela'] = 'editar';
        $data['title'] = 'Editar Aluno';
        $this->load->view('aluno/cadastro_page', $data);
    }

    public function buscar()
    {
        verifica_login();
        $this->load->model('editar_model');
        $dados['alunos'] = $this->editar_model->listar_alunos();
        $dados['title'] = 'Editar Alunos';

        $this->load->view('aluno/buscar_aluno_page', $dados);
    }

    public function excluir()
    {
        verifica_login();
        $this->load->model('editar_model');

        //verifica se o id do aluno foi passado
        $id = $this->uri->segment(3);

        if ($id > 0) {
            if ($aluno = $this->editar_model->get_aluno($id)) {
                // print_r('entrou');
                $data['aluno'] = $aluno;
            } else {
                set_msg('<script language="javascript">alert("Aluno inexistente!\n Escolha um aluno para excluir!")</script>');
                set_msg('<p>"Aluno inexistente!\n Escolha um aluno para excluir!"</p>');
                redirect('buscar', 'refresh');
            }
        } else {
            set_msg('<script language="javascript">alert("Você deve selecionar um aluno para a exclusão!")</script>');
            set_msg('<p>"Você deve selecionar um aluno para a exclusão!"</p>');
            redirect('buscar', 'refresh');
        }

        $this->load->helper('form');
        $this->load->library(array('form_validation'));

        $data['tela'] = 'excluir';
        $data['title'] = 'Excluir Aluno';
        $this->load->view('aluno/cadastro_page', $data);

        /**Regra de validação */
        $this->form_validation->set_rules('enviar', 'Sim', 'trim|required');

        /** Verifica a validação */
        if ($this->form_validation->run() == FALSE) {
            if (validation_errors()) {
                set_msg(validation_errors());
            }
        } else {

            if (!empty($aluno->foto_aluno)) {
                if (file_exists('uploads' . $aluno->foto_aluno)) {
                    unlink('uploads/' . $aluno->foto_aluno);
                    $this->editar_model->excluir_aluno($id);
                }
                $this->editar_model->excluir_aluno($id);
                set_msg('<p>O cadastro do aluno foi excluido com sucesso!</p>');
                redirect('buscar', 'refresh');
            } elseif (empty($aluno->foto_aluno)) {
                $this->editar_model->excluir_aluno($id);
                set_msg('<p>O cadastro do aluno sem imagem foi excluido com sucesso!</p>');
                redirect('buscar', 'refresh');
            } else {
                set_msg('<p>Erro ao excluir o cadastro do aluno!</p>');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('usuario_logado');
        $this->session->unset_userdata('user_email');
        echo '<script language="javascript">alert("O você saiu do sistema!")</script>';
        redirect('login', 'refresh');
    }
}
