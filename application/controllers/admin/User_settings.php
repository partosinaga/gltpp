<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_settings extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	//$this->load->model('ap/M_ap');
	// $this->load->model('ar/M_ar');
	$this->load->model('admin/M_user_settings');
	$this->load->helper('url');
	}

	public function user_settings(){
		$data['page'] = 'admin/user_settings';
		$data['user'] = $this->M_user_settings->get_user();
	
		$this->load->view('template/template', $data);
	}

	public function change_password(){
        $id = $this->input->post('username');
        $new_pass = $this->input->post('new');
        $this->M_user_settings->change_password($id, $new_pass);

        $this->session->set_flashdata('success', 'New Password Saved');
        redirect('home/dashboard');
    }

}