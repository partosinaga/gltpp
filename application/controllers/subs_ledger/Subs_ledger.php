<?php defined('BASEPATH') OR exit('No direct script access allowed');

class subs_ledger extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	//$this->load->model('ap/M_ap');
	$this->load->model('subs_ledger/M_subs_ledger');

		$this->load->helper('url');
		
	}

	public function subs_ledger_form(){
		$data['page'] = 'subs_ledger/subs_ledger_form';
		$data['coa'] = $this->db->get('coa');
		$this->load->view('template/template', $data);
	}

	public function view_sl(){
		$this->benchmark->mark('code_start');
		$date_from = $this->input->post('date_from'). "<br>";
		$yy = substr($date_from, 0, 4).'-01-01' . "<br>";

		$date_to = $this->input->post('date_to'). "<br>";
		$coa_from = $this->input->post('coa_from');
		$coa_to = $this->input->post('coa_to');

		// $data = array();
		$data['subsled'] = $this->M_subs_ledger->get_trans($date_from, $date_to, $coa_from, $coa_to);
		// echo $this->db->last_query();
		$data['balance'] = $this->M_subs_ledger->get_begining_balance($date_from, $coa_from, $coa_to);


		//get zero account
		$data['subsled2'] = $this->M_subs_ledger->get_trans_zero_account($date_from, $date_to, $coa_from, $coa_to);
		$data['balance2'] = $this->M_subs_ledger->get_balance_zero_account($yy, $date_from, $coa_from, $coa_to);
		
		$data['date_from'] = $date_from;
		$data['date_to'] = $date_to;
		$data['coa_from'] = $coa_from;
		$data['coa_to'] = $coa_to;
		//$data['page'] = 'subs_ledger/view_sl';
		$this->load->view('subs_ledger/view_sl', $data);
		$this->benchmark->mark('code_end');
	}

	public function export(){
		$date_from = $this->input->get('df');
		$date_to = $this->input->get('dt');
		$coa_from = $this->input->get('cf');
		$coa_to = $this->input->get('ct');
		$yy = substr($date_from, 0, 4).'-01-01' . "<br>";
		// $data = array();
		$data['subsled'] = $this->M_subs_ledger->get_trans($date_from, $date_to, $coa_from, $coa_to);
		// echo $this->db->last_query();
		$data['balance'] = $this->M_subs_ledger->get_begining_balance($date_from, $coa_from, $coa_to);

			
		//get zero account
		$data['subsled2'] = $this->M_subs_ledger->get_trans_zero_account($date_from, $date_to, $coa_from, $coa_to);
		$data['balance2'] = $this->M_subs_ledger->get_balance_zero_account($yy, $date_from, $coa_from, $coa_to);


		$data['date_from'] = $date_from;
		$data['date_to'] = $date_to;
		$data['coa_from'] = $coa_from;
		$data['coa_to'] = $coa_to;
		$data['page'] = 'subs_ledger/view_sl';
		$this->load->view('subs_ledger/export', $data);
	}
}