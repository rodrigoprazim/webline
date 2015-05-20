<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('home_model');
        $this->load->helper('array');
        $this->load->library('form_validation');
    }

	public function index(){
        $ver = $this->home_model->listarPrimeiroMenu();
        if($ver->num_rows()>0) {
            $f_id = $ver->row()->id;
            $menu_id = $this->uri->segment(3) == '' ? $f_id : $this->uri->segment(3);
            $dados = array(
                'tela' => 'conteudo',
                'menuList' => $this->home_model->listarMenu(),
                'menuD' => $this->home_model->listarMenu($menu_id),
                'conteudo' => $this->home_model->listarConteudoMenu($menu_id),
                'infoAd' => $this->home_model->listarInfoAd()->row(),
            );
            $this->load->view('home', $dados);
        }else{
            redirect(base_url().'home/contato');
        }
	}

    public function contato(){
        $dados = array(
            'tela' => 'contato',
            'menuList' => $this->home_model->listarMenu(),
            'infoAd' => $this->home_model->listarInfoAd()->row(),
        );
        $this->load->view('home',$dados);
    }

    public function enviarContato(){
        $info = $this->home_model->listarInfoAd()->row();
        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: ".$this->input->post('nome')."<".$this->input->post('email').">\n";
        $headers .= "Return-Path: ".$this->input->post('nome')."<".$this->input->post('email').">\n";
        $envio = mail($info->email, "Contato Webline", $this->input->post('mensagem'), $headers);

        if($envio) {
            $dados = array(
                'tela' => 'contato',
                'menuList' => $this->home_model->listarMenu(),
                'infoAd' => $this->home_model->listarInfoAd()->row(),
            );
            $this->load->view('home', $dados);
        }else{
            echo "A mensagem não pode ser enviada";
        }
    }
}
