<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation'));

        /** Regras de validação */
        $this->form_validation->set_rules('email_usuario', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', '<strong>Senha</strong>', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (validation_errors()) {
                set_msg(validation_errors());
            }
        } else {
            $dados_form = $this->input->post();
            $this->load->model('login_model');
            
            if ($this->login_model->login($dados_form['email_usuario'], $dados_form['senha']) ) {

                /**Usuario existe */
                /**senha existe, login */
                $this->session->set_userdata('usuario_logado', TRUE);
                $this->session->set_userdata('email_usuario', $dados_form['email_usuario']);
                redirect('home');
               
            } else {
                /**Usuario não existe */
                echo '<script language="javascript">';
                echo 'alert("Usuario ou Senha incorretos")';
                echo '</script>';
                redirect('login', 'refresh');
            }
        }
        /** Carregamento Pagina inicial */
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }
}
