<?php defined('BASEPATH') OR exit('No direct script access allowed');

class syspar extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	$this->load->model('master/M_syspar');

		$this->load->helper('url');
        
    }

	public function view_syspar(){
		$data['page']='master/syspar';
		//get form  table currency
		$data['getCurr']= $this->db->get('currency');
		$data['syspar'] = $this->M_syspar->get_syspar();
		$this->load->view('template/template', $data);
	}

	public function edit_syspar(){
		$data['page'] = 'master/edit_syspar';
		//get  table coa
		$data['coa']= $this->M_syspar->get_coa();
		//get form  table currency
		$data['getCurr']= $this->db->get('currency');
		$data['syspar'] = $this->M_syspar->get_syspar();
		$this->load->view('template/template', $data);
	}

	public function save_edit(){
		$id = $this->input->post('id');
		$company_id = $this->input->post('company_id');
		$name = $this->input->post('name');
		$top_approval = $this->input->post('top_approval');
		$base_currency = $this->input->post('base_currency');
		$financial_month = $this->input->post('financial_month');
		$financial_year = $this->input->post('financial_year');
		$reaa = $this->input->post('reaa');
		$reac = $this->input->post('reac');

		// print_r($financial_month);
		// exit();


		$data = array(
			'id' => $id,
			'company_id' => $company_id,
			'name' => $name,
			'top_approval' => $top_approval,
			'base_currency' => $base_currency,
			'financial_month' => $financial_month,
			'financial_year' => $financial_year,
			'reaa' => $reaa,
			'reac' => $reac,
			);


		$this->M_syspar->save_edit($id, $company_id, $name, $top_approval, $base_currency, $financial_month, 
			$financial_year, $reaa, $reac );
		// $this->db->last_query();
		// exit();
		$this->session->set_flashdata('success', 'System Parameter Saved!');
		
		redirect('master/syspar/view_syspar');


	}

}
