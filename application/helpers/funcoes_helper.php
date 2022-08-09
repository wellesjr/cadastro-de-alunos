<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('set_msg')) {
    function set_msg($msg = NULL)
    {
        $page = &get_instance();
        $page->session->set_userdata('aviso', $msg);
    }
}

if (!function_exists('get_msg')) {
    function get_msg($destroy = TRUE)
    {
        $page = &get_instance();
        $retorno = $page->session->userdata('aviso');
        if ($destroy) {
            $page->session->unset_userdata('aviso');
            return $retorno;
        }
    }
    if (!function_exists('verifica_login')) {
        function verifica_login($redirect = 'login')
        {
            $page = &get_instance();
            if($page->session->userdata('usuario_logado') != TRUE){
                set_msg('<script language="javascript">alert("Acesso restrito! Faça login para contnuar")</script>');
                redirect($redirect,'refresh');
            }
        }
    }

    if (!function_exists('config_upload')) {
        function config_upload($path='./uploads/', $types='jpg|png', $size=512){
            $config['upload_path'] = $path;
            $config['allowed_types'] = $types;
            $config['max_size'] = $size;
            return $config;
        }
    }

}
