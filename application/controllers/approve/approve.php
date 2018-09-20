<?php defined('BASEPATH') OR exit('No direct script access allowed');

class approve extends CI_Controller{
	function __Construct(){
	parent ::__construct();
	$this->load->model('approve/M_approve');
	$this->load->helper('url');
	}

	public function approve_setting(){
		$data['page'] = 'approve/approve_setting';
		$data['user'] = $this->M_approve->get_user();
		$this->load->view('template/template', $data);
	}

	public function add(){
		$data['page'] = 'approve/add';
		$data['user'] = $this->db->get('user');
		$data['order'] = $this->M_approve->get_order();
		$this->load->view('template/template', $data);
	}

	public function save(){
		$user_id = $this->input->post('user_id');
		$order = $this->input->post('order');
		$role = $this->input->post('role');

		$data =  array('user_id' => $user_id,
						'order' => $order,
						'role' => $role
					);

		$this->M_approve->add_log($data, 'log_email');
		$this->session->set_flashdata('success', 'Saved!');
		redirect('/approve/approve/approve_setting');
	}

	public function delete(){
		$id = $this->input->get('id');
		$this->M_approve->delete($id);
		$this->session->set_flashdata('success', 'Deleted!');
		redirect('/approve/approve/approve_setting');

	}
//========================== AR APPROVAL==============================
	public function ar_approve(){
		$data['page'] = 'ar/ar_approve';

	

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

	public function ar_detail(){
		$data['page'] = 'ar/ar_detail';
		$id = $this->input->get('id');
		$data['trx'] = $this->M_approve->get_header($id);
		$data['dtl'] = $this->M_approve->get_detail($id);
		$this->load->view('template/template', $data);
	}

	public function ar_suggest(){
		$no_voucher = $this->input->post('no_voucher');
		$suggest = $this->input->post('suggest');

		$data = array('no_voucher' => $no_voucher,
						'suggest' => $suggest,
						'user_id' => $this->session->userdata('user_id'),
						'module' => 'ar'
						 );
		$this->M_approve->add_suggest($data, 'log_suggest');

		// SEND EMAIL TO CREATOR TO REPAIR


		$this->session->set_flashdata('success', 'Your Suggestion Sent!');
		redirect('/approve/approve/ar_approve');
	}

	public function ar_accept(){
		$id = $this->input->get('id');
		$tot = $this->input->get('total');

		if ($tot >= 50000000) {
			//JIKA TOTAL ? 50JT KIRIM EMAIL SAMPAI KE ORANG TERAKHIR
			//TO CEK URUTAN TERAKHIR ATAU TIDAK, IF YES, SEND EMAIL TO CREATOR. IF NO, NEXT SEND EMAIL
			//1. cek table log_email to get last order
			$max_le = $this->M_approve->cek_max_le();
			//2. cek table ar_header to get last approve_status
			$max_ar = $this->M_approve->cek_max_ar($id);
			if ($max_le->max_le == $max_ar->max_ar) {
				//UPDATE APPROVE STATUS = 0 
				$this->M_approve->update_approveStatus($id);
				//SEND EMAIL TO CREATOR

			} else {
				//CEK NOMOR URUT KIRIM EMAIL ORANG KEBERAPA
				$ord = $this->M_approve->cek_order($id);
				$order = $ord->approve_status+1;
				// TO UPDATE + 1 ORDER IN AR_HEADER
				$this->M_approve->ar_accept($id, $order);
				
				// SEND EMAIL TO NEXT USER
			}
		} else {
			//JIKA < 50JT KIRIM GAUSA SAMPAI ORANG TERAKHIR
			//TO CEK URUTAN TERAKHIR ATAU TIDAK, IF YES, SEND EMAIL TO CREATOR. IF NO, NEXT SEND EMAIL
			//1. cek table log_email to get order where ROLE = 'c'
		}
		

		

		$this->session->set_flashdata('success', 'Approved!');
		redirect('/approve/approve/ar_approve');
	}
//========================== END OF AR APPROVAL==============================


	public function get_trx(){
		$data['page'] = 'ar/ar_status';
		$id = $this->input->get('id');
		
		$data['head'] = $this->M_approve->header_status($id);
		$data['det'] = $this->M_approve->detail_status($id);

		$data['suggest'] = $this->M_approve->trx_suggest($id);

		$this->load->view('template/approve_template',$data);
	}
}