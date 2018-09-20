<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __Construct(){
		parent ::__construct();
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		$this->output->set_header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

		$this->load->model('ap/M_ap');
		$this->load->model('dashboard/M_dashboard');
		$this->load->helper('url');
		
	}
	
	
	public function input_ap_push(){
		if (isset($_POST['pv_date'])){
			 $bi=$this->M_ap->get_bank_id();
			 //get kode otomatis
			 $kode= $this->M_ap->get_kode();
				
			 $data['no_voucher'] = $kode;
			 $data['date'] = $_POST['pv_date'];
			 $data['bank_id'] = $bi;
			 $data['description'] = $_POST['description'];
			 $data['curr_id'] = 'IDR';
			 $data['total'] = $_POST['total'];
			 $data['kurs'] = '1';
			 $data['receive_from'] = $_POST['paid_to'];
			 $data['gl_date'] = $_POST['gl_date'];
			 $data['status'] ="post";
			 $data['audit_date'] = date("Y-m-d H:i:sa");
			 $data['audit_user'] = 'is_com';
			 $data['com_pv_id'] = $_POST['com_pv_id'];

			 $this->db->insert('ap_header', $data);
		 
		 
			$datax =array();
			$details = $_POST['detail'];
			foreach($details as $detail) {
				$dtl = array(
					'no_voucher' => $kode
				);
				foreach($detail as $d_key => $d_val) {				   
				   if($d_key == 'debit'){
						$dtl['debit'] = $d_val;
				   } else if($d_key == 'credit'){
						$dtl['credit'] = $d_val;
				   } else if($d_key == 'coa_id'){
						$dtl['coa_id'] = $d_val;
				   }
				}
				
				array_push($datax, $dtl);
			}
			$this->db->insert_batch('ap_detail', $datax);
			/*$this->session->set_flashdata('success', 'Payment voucher saved!');
			redirect('ap/ap/view_ap');*/
		
			$result = array('err' => 0, 'message' => 'Payment voucher saved!');

       	 	/*
        	 * err = 0 => success
        	 * err = 1 => error
         	* message => error message
         	*/

		} else {
			$result = array('err' => 1, 'message' => 'No data post!');
		}
        echo json_encode($result);
	}


	public function dashboard(){
		if($this->session->userdata('username') == null){
            redirect('home');
        }

        $user = $this->session->userdata('user_id');
 

		$data['page']='template/dashboard';
		$data['ar'] = $this->M_dashboard->get_ar();
		$data['ap'] = $this->M_dashboard->get_ap();
		$data['jv'] = $this->M_dashboard->get_jv();

		// GET REMINDER
		$m = date("m", strtotime("-1 months"));
		$y = date("Y");
		$data['current'] = $this->M_dashboard->get_current($m, $y);

		$data['logged'] = $this->M_dashboard->get_log($user);
		$this->load->view('template/template', $data);
	}
	public function index()
	{
		$this->load->view('login/form_login');
	}

	public function valid_login(){
		
		$us = $this->input->post('username');
		$ps = $this->input->post('password');
		
		$this->db->where('username', $us);	//nama kolom username pada form
		$this->db->where('password', $ps);	//nama kolom password pada form
		$akun = $this->db->get('user');
		if ($akun->num_rows() >0){ 
			
			$logindata = array(
				'user_id' => $akun->result_array()[0]['user_id'],
				'username'  => $us,
				'departemen'     => $akun->result_array()[0]['departemen'],
				'AREntry'     => $akun->result_array()[0]['AREntry'],
				'ARPost'     => $akun->result_array()[0]['ARPost'],
				'APEntry'     => $akun->result_array()[0]['APEntry'],
				'APPost'     => $akun->result_array()[0]['APPost'],
				'GLEntry'     => $akun->result_array()[0]['GLEntry'],
				'GLPost'     => $akun->result_array()[0]['GLPost'],
				'reportACC'     => $akun->result_array()[0]['reportACC'],
				'adminACC'     => $akun->result_array()[0]['adminACC'],
				'approve'     => $akun->result_array()[0]['approve'],
				'password'     => $akun->result_array()[0]['password'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($logindata);
			// to add log_login table
			$user_id = $akun->result_array()[0]['user_id'];
			$date = date('d-m-Y'). ' / ' . date('H;i;sa');

			$data = array('user_id' => $user_id,
							'date_time' => $date
							 );
			
			$this->M_dashboard->add_log($data, 'log_login');

			redirect('home/dashboard');

			} else { 
			redirect ('home/index');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/index');
	}

	public function notfound(){
		$data['page'] = '404';
		$this->load->view('template/template', $data);
	}
}
