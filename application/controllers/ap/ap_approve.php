<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ap_approve extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	// $this->load->model('ap/M_ap');
	// $this->load->model('ar/M_ar');

		$this->load->helper('url');
		
	}

	public function get_trx(){
		$data['page'] = 'ap/approve_ap';
		$id = $this->input->get('id');
		
		$this->load->view('template/approve_template',$data);
	}

}
?>