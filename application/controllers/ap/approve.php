<?php defined('BASEPATH') OR exit('No direct script access allowed');

class approve extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	// $this->load->model('ap/M_ap');
	$this->load->model('ap/M_approve');

		$this->load->helper('url');
		
	}

	public function ap_approve(){
		$data['page'] = 'ap/ap_approve';
		//CEK USER LOGGIN, TO ADJUST VIEWED DATA
		$us = $this->session->userdata('user_id');

		$user = $this->M_approve->cek_user($us);

		if ($user->order == 1) {
			$data['onest'] = $this->M_approve->get_onest();
		} else if ($user->order == 2) {
			$data['onest'] = $this->M_approve->get_second();
		 } else if ($user->order == 3) {
			$data['onest'] = $this->M_approve->get_third();
		} else if ($user->order == 4) {
			$data['onest'] = $this->M_approve->get_fourth();
		} else
		
		$data['onest'] = $this->M_approve->get_onest();
		$this->load->view('template/template', $data);
	}

	public function ap_detail(){
		$data['page'] = 'ap/ap_detail';
		$id = $this->input->get('id');
		$data['trx'] = $this->M_approve->get_header($id);
		$data['dtl'] = $this->M_approve->get_detail($id);
		$this->load->view('template/template', $data);
	}

	public function ap_suggest(){
		$no_voucher = $this->input->post('no_voucher');
		$suggest = $this->input->post('suggest');
		$data = array('no_voucher' => $no_voucher,
						'suggest' => $suggest,
						'user_id' => $this->session->userdata('user_id'),
						'module'=> 'ap'
						 );
		$this->M_approve->add_suggest($data, 'log_suggest');

		// SEND EMAIL TO CREATOR TO REPAIR


		$this->session->set_flashdata('success', 'Your Suggestion Sent!');
		redirect('/ap/approve/ap_approve');
	}

	public function ap_accept(){
		$id = $this->input->get('id');

		//TO CEK URUTAN TERAKHIR ATAU TIDAK, IF YES, GO POSTING. IF NO, NEXT SEND EMAIL
		//1. cek table log_email to get last order
		$max_le = $this->M_approve->cek_max_le();
		//2. cek table ar_header to get last approve_status
		$max_ap = $this->M_approve->cek_max_ap($id);
		if ($max_le->max_le == $max_ap->max_ap) {
			//UPDATE APPROVE STATUS = 0 
			$this->M_approve->update_approveStatus($id);
			//SEND EMAIL TO CREATOR


		} else {
			//CEK NOMOR URUT KIRIM EMAIL ORANG KEBERAPA
			$ord = $this->M_approve->cek_order($id);
			$order = $ord->approve_status+1;
			// TO UPDATE + 1 ORDER IN AR_HEADER
			$this->M_approve->ap_accept($id, $order);
			
			// SEND EMAIL TO NEXT USER
			

		 }
		$this->session->set_flashdata('success', 'Approved!');
		redirect('/ap/approve/ap_approve');
	}

	public function get_trx(){
		$data['page'] = 'ap/ap_status';
		$id = $this->input->get('id');
		
		$data['head'] = $this->M_approve->header_status($id);
		$data['det'] = $this->M_approve->detail_status($id);

		$data['suggest'] = $this->M_approve->trx_suggest($id);

		$this->load->view('template/approve_template',$data);
	}

}
?>