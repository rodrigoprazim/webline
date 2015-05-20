<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function validate() {
		$this->db->where('login', $this->input->post('login'));
		$this->db->where('senha', md5($this->input->post('senha')));
		
		$query = $this->db->get('wb_usuarios');
		
		if($query->num_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

    public function listarMenu($id=''){
        $id == '' ? : $this->db->where('id',$id);
        $this->db->order_by('id');
        return $this->db->get('wb_menu');
    }

    public function listarConteudoMenu($id=''){
        $id == '' ? : $this->db->where('wb_menu_id',$id);
        $this->db->order_by('id');
        return $this->db->get('wb_conteudo');
    }

    public function listarConteudo($id=''){
        $id == '' ? : $this->db->where('id',$id);
        $this->db->order_by('id');
        return $this->db->get('wb_conteudo');
    }

    public function do_insertConteudo($dados=NULL){
        if($dados!=NULL){
            $this->db->insert('wb_conteudo',$dados);
        }
    }

    public function do_insertMenu($dados=NULL){
        if($dados!=NULL){
            $this->db->insert('wb_menu',$dados);
        }
    }

    public function do_deleteMenu($id=''){
        if($id!='') {
            $this->db->where('id', $id);
            $this->db->delete('wb_menu');
        }
    }

    public function do_updateConteudo($dados=NULL){
        if($dados!=NULL){
            $this->db->where('id',$dados['id']);
            $this->db->update('wb_conteudo',$dados);
        }
    }

    public function do_deleteConteudoUnico($id=''){
        if($id!=''){
            $this->db->where('id',$id);
            $this->db->delete('wb_conteudo');
        }
    }

    public function do_deleteConteudo($id=''){
        if($id!=''){
            $this->db->where('wb_menu_id',$id);
            $this->db->delete('wb_conteudo');
        }
    }

    public function do_editarMenu($dados=NULL,$id=''){
        if($dados!=NULL && $id!=''){
            $this->db->where('id',$id);
            $this->db->update('wb_menu',$dados);
        }
    }

    public function listarInfoAd(){
        $this->db->where('id','1');
        return $this->db->get('wb_infoad');
    }

    public function do_insertInfoAd($dados=NULL){
        if($dados!=NULL){
            $this->db->where('id','1');
            $this->db->update('wb_infoad',$dados);
        }
    }

    public function contarConteudo($id=''){
        $this->db->where('wb_menu_id',$id);
        return $this->db->get('wb_conteudo');
    }

    public function do_atualizarIdMenu($dados=NULL,$id=''){
        if($dados!=NULL && $id!='') {
            $this->db->where('wb_menu_id', $id);
            $this->db->update('wb_conteudo', $dados);
        }
    }
}