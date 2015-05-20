<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Default_model extends CI_Model{
	
	public function do_Validador() {
		if(!$this->session->userdata('is_logged')){
            redirect(base_url());
        }
	}
}