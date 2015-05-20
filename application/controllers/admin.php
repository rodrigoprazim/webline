<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->default_model->do_Validador();
        $this->load->helper('form');
        $this->load->model('admin_model');
        $this->load->helper('array');
        $this->load->library('form_validation');
    }

	public function index(){
        $dados = array(
            'tela' => 'indexAdmin'
        );

        $this->load->view('gerenciador',$dados);
	}

    public function menu(){
        $info = $this->uri->segment(3)!=NULL ? $this->admin_model->listarMenu($this->uri->segment(4))->num_rows() > 0 ? $this->admin_model->listarMenu($this->uri->segment(4))->row() : redirect(base_url().'admin/menu') : NULL ;
        $dados = array(
            'tela' => 'menu',
            'menuList' => $this->admin_model->listarMenu(),
            'info' => $info
        );
        $this->load->view('gerenciador',$dados);
    }

    public function actionMenu(){
        $this->form_validation->set_message('is_unique', 'Já existe um <b>%s</b> igual!');
        $this->form_validation->set_rules('menu','[MENU]','required|trim|max_length[20]|is_unique[wb_menu.descricao]');
        $this->form_validation->set_rules('id','[ID]','trim|max_length[10]|numeric|is_unique[wb_menu.id]');
        if($this->form_validation->run()){
            $valueId = $this->input->post('id')!='' ? $this->input->post('id') : NULL ;

            $dados = array(
                'id' => $valueId,
                'descricao' => $this->input->post('menu'),
            );
            $this->admin_model->do_insertMenu($dados);
            redirect(base_url().'admin/menu');
        }else{
            $dados = array(
                'tela' => 'menu',
                'menuList' => $this->admin_model->listarMenu(),
                'info' => NULL
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function actionExcluirMenu(){
        $this->uri->segment(3)!=NULL ? $this->admin_model->listarMenu($this->uri->segment(3))->num_rows() > 0 ? : redirect(base_url().'admin/menu') : redirect(base_url().'admin/menu');

        $id = $this->admin_model->listarMenu($this->uri->segment(3))->row()->id;

        $this->admin_model->do_deleteConteudo($id);

        $this->admin_model->do_deleteMenu($id);

        redirect(base_url().'admin/menu');
    }

    public function actionEditarMenu(){
        $info = $this->uri->segment(3)!=NULL ? $this->admin_model->listarMenu($this->uri->segment(3))->num_rows() > 0 ? $this->admin_model->listarMenu($this->uri->segment(3))->row() : redirect(base_url().'admin/menu') : redirect(base_url().'admin/menu');

        $id = $this->admin_model->listarMenu($this->uri->segment(3))->row()->id;
        $desc = $this->admin_model->listarMenu($this->uri->segment(3))->row()->descricao;

        $val = $this->input->post('menu')==$desc ? :'|is_unique[wb_menu.descricao]';
        $val1 = $this->input->post('id')==$id ? :'|is_unique[wb_menu.id]';

        $this->form_validation->set_message('is_unique', 'Já existe um <b>%s</b> igual!');
        $this->form_validation->set_rules('menu','[MENU]','required|trim|max_length[20]'.$val);
        $this->form_validation->set_rules('id','[ID]','trim|max_length[10]|numeric'.$val1);

        $valueId = $this->input->post('id')!='' ? $this->input->post('id') : $id ;

        if($this->form_validation->run()){
            $dados = array(
                'id' => $valueId,
                'descricao' => $this->input->post('menu'),
            );

            $dados1 = array('wb_menu_id' => $valueId);
            $this->input->post('id')==$id ? : $this->admin_model->do_atualizarIdMenu($dados1,$id) ;

            $this->admin_model->do_editarMenu($dados,$id);
            redirect(base_url().'admin/menu');
        }else{
            $dados = array(
                'tela' => 'menu',
                'menuList' => $this->admin_model->listarMenu(),
                'info' => $info
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function conteudo(){
        $dados = array(
            'tela' => 'conteudo',
            'menuList' => $this->admin_model->listarMenu(),
        );

        $this->load->view('gerenciador',$dados);
    }

    public function getConteudo(){
        $dados = array(
            'conteudo' => $this->admin_model->listarConteudoMenu($this->uri->segment(3)),
            'menuId' => $this->uri->segment(3),
        );
        $this->load->view('main/getConteudo',$dados);
    }

    public function adicionarConteudo(){
        $id = $this->admin_model->listarMenu($this->uri->segment(3))->row()->id;
        $dados = array(
            'tela' => 'crud_conteudo',
            'menuList' => $this->admin_model->listarMenu($id),
            'cont' => NULL
        );
        $this->load->view('gerenciador',$dados);
    }

    public function actionAdicionarConteudo(){
        $this->form_validation->set_rules('conteudo','[CONTEÚDO],trim|required');
        if($this->form_validation->run()){
            $dados = array(
                'wb_menu_id' => $this->uri->segment(3),
                'descricao' => $this->input->post('conteudo'),
            );
            $this->admin_model->do_insertConteudo($dados);
            redirect(base_url().'admin/conteudo');
        }else{
            $id = $this->uri->segment(3);
            $dados = array(
                'tela' => 'crud_conteudo',
                'menuList' => $this->admin_model->listarMenu($id),
                'cont' => NULL
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function editarConteudo(){
        $id = $this->admin_model->listarConteudo($this->uri->segment(3))->row()->wb_menu_id;
        $dados = array(
            'tela' => 'crud_conteudo',
            'menuList' => $this->admin_model->listarMenu($id),
            'cont' => $this->admin_model->listarConteudo($this->uri->segment(3)),
        );
        $this->load->view('gerenciador',$dados);
    }

    public function actionEditarConteudo(){
        $id = $this->uri->segment(3);
        $dados = array(
            'id' => $id,
            'descricao' => $this->input->post('conteudo'),
        );
        $this->admin_model->do_updateConteudo($dados);
        redirect(base_url().'admin/conteudo');
    }

    public function actionExcluirConteudo(){
        $id = $this->uri->segment(3);
        $this->admin_model->do_deleteConteudoUnico($id);
        redirect(base_url().'admin/conteudo');
    }

    public function infoAd(){
        $dados = array(
            'tela' => 'infoAd',
            'cont' => $this->admin_model->listarInfoAd()->row(),
        );
        $this->load->view('gerenciador',$dados);
    }

    public function actionUploadBannerFg(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'banner-fg';
        $config['overwrite'] = TRUE;
        $config['max_filename'] = 0;
        $config['remove_spaces'] = TRUE;
        $config['max_size']	= '15000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload()){
            redirect(base_url().'admin/infoAd');
        }else{
            $dados = array(
                'tela' => 'infoAd',
                'cont' => $this->admin_model->listarInfoAd()->row(),
                'error1_1' => $this->upload->display_errors('<span class="alert-link">','</span><br>'),
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function actionUploadBannerBg(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'banner-bg';
        $config['overwrite'] = TRUE;
        $config['max_filename'] = 0;
        $config['remove_spaces'] = TRUE;
        $config['max_size']	= '15000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload()){
            redirect(base_url().'admin/infoAd');
        }else{
            $dados = array(
                'tela' => 'infoAd',
                'cont' => $this->admin_model->listarInfoAd()->row(),
                'error1_2' => $this->upload->display_errors('<span class="alert-link">','</span><br>'),
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function actionUploadBg(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'bg-inicial';
        $config['overwrite'] = TRUE;
        $config['max_filename'] = 0;
        $config['remove_spaces'] = TRUE;
        $config['max_size']	= '15000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload()){
            redirect(base_url().'admin/infoAd');
        }else{
            $dados = array(
                'tela' => 'infoAd',
                'cont' => $this->admin_model->listarInfoAd()->row(),
                'error2' => $this->upload->display_errors('<span class="alert-link">','</span><br>'),
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function actionUploadRodapeBg(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'png';
        $config['file_name'] = 'rodape-bg';
        $config['overwrite'] = TRUE;
        $config['max_filename'] = 0;
        $config['remove_spaces'] = TRUE;
        $config['max_size']	= '15000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload()){
            redirect(base_url().'admin/infoAd');
        }else{
            $dados = array(
                'tela' => 'infoAd',
                'cont' => $this->admin_model->listarInfoAd()->row(),
                'error3' => $this->upload->display_errors('<span class="alert-link">','</span><br>'),
            );
            $this->load->view('gerenciador',$dados);
        }
    }

    public function actionInfoAd(){
        $dados = array(
            'email' => $this->input->post('email'),
            'rodape' => $this->input->post('rodape'),
            'telefone' => $this->input->post('contato'),
            'c_menu' => $this->input->post('c_color'),
            'c_hover_menu' => $this->input->post('hover_color'),
        );
        $this->admin_model->do_insertInfoAd($dados);
        redirect(base_url().'admin/infoAd');
    }

    public function deleteBannerFg(){
        unlink('./assets/img/banner-fg.png');
        redirect(base_url().'admin/infoAd/');
    }

    public function deleteBannerBg(){
        unlink('./assets/img/banner-bg.png');
        redirect(base_url().'admin/infoAd/');
    }

    public function deleteBg(){
        unlink('./assets/img/bg-inicial.png');
        redirect(base_url().'admin/infoAd/');
    }

    public function deleteRodapeBg(){
        unlink('./assets/img/rodape-bg.png');
        redirect(base_url().'admin/infoAd/');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
