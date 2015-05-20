<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin_model');
        $this->load->helper('array');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->session->userdata('is_logged') ? redirect(base_url().'admin') : redirect(base_url().'login/acesso');
	}

    public function acesso()
    {
        $this->load->view('login');
    }

    public function actionLogin(){
        $this->form_validation->set_rules('usuario','[Usuário]','required|trim|xss_clean|callback_validate');
        $this->form_validation->set_rules('senha','[Senha]','required|md5|trim');

        if($this->form_validation->run()){
            $data = array(
                'tipo' => 'Administrador',
                'is_logged' => TRUE,
            );
            $this->session->set_userdata($data);
            redirect(base_url().'admin');
        }else{
            redirect(base_url().'login/acesso/error');
        }
    }

    public function validate(){
        if($this->admin_model->validate()){
            return TRUE;
        }else{
            $this->form_validation->set_message('validate_credentials','Usuário ou Senha Incorretos.');
            return FALSE;
        }
    }
}
