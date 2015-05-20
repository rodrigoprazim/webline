<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{

    public function listarMenu($id=''){
        $id == '' ? : $this->db->where('id',$id);
        $this->db->order_by('id');
        return $this->db->get('wb_menu');
    }

    public function listarPrimeiroMenu(){
        $this->db->order_by('id');
        $this->db->limit(1);
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

    public function listarInfoAd(){
        $this->db->where('id','1');
        return $this->db->get('wb_infoad');
    }
}