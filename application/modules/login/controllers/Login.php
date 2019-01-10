<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
        $this->lang->load('data');
        $this->load->helper('url');
        $this->load->model('Login_model');
	}

	public function index() {
		$data['info_msg'] = 'Please Login below';
		$data['type'] = 'admin';
		$data['go_to_url'] = '';
		$this->load->view('login/login', $data);
	}

	public function userlogin() {
		$_data = $this->input->post();
		if(!empty($_data)){
			$this->load->model('Login_model');
			$res = $this->Login_model->login($_data);
			if($res['status'] == 'failure') {
				$data['errmsg'] =  'Invalid Login id or Password.';
				$data['status'] = 0;
			} elseif($res['status'] == 'blocked') {
				$data['errmsg'] = 'Your Profile is Blocked.';
				$data['status'] = 0;
			} elseif($res['status'] == 'deleted') {
				$data['errmsg'] = 'Your Profile is Deleted.';
				$data['status'] = 0;
			} else {
				switch($res['user_type']) {
					case 0: $go_to = 'admin/dashboard'; break;
					case 1: $go_to = 'users/dashboard';  break;
					case 2: $go_to = 'sales/jobs'; break;
					case 3: $go_to = 'recruiter/dashboard'; break;
					case 4: $go_to = 'performance/dashboard'; break;
					case 5: $go_to = 'operation/dashboard'; break;
					case 6: $go_to = 'contractor/dashboard';break;
					case 7: $go_to = 'clients/dashboard';break; 
					default: $go_to = 'admin/dashboard'; break; 
				}
				$data['info_msg'] = 'Successfully logged in.';
				$data['status'] = 1;
				$data['go_to'] = $go_to;
				$newIpAddress = array('user_id'=>$res['user_id'],'ip_address'=>$_SERVER['REMOTE_ADDR'],'login_time'=>date('Y-m-d H:i:s'));
				$this->Login_model->ipaddress_save($newIpAddress);
			}
		} else {
			$data['errmsg'] =  'Invalid Login id or Password.';
			$data['status'] = 0;
		}
		echo json_encode($data);
	}

	public function register() {
		$data['info_msg'] = 'Please Register below';
		$data['go_to_url'] = '';
		$this->load->view('login/register', $data);
	}

	function user_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['user_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_user_logged_in', 'user_user_id', 'user_org_id','user_user_name','user_email','user_last_login','user_phone','user_image');
		$go_to = 'users';
		$this->session->unset_userdata($array_items);
		$array_item['user_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function admin_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['admin_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_admin_logged_in', 'admin_user_id', 'admin_org_id','admin_user_name','admin_email','admin_last_login','admin_phone','admin_image');
		$go_to = 'admin';
		$this->session->unset_userdata($array_items);
		$array_item['admin_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function recruiter_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['recruiter_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_recruiter_logged_in', 'recruiter_user_id', 'recruiter_org_id','recruiter_user_name','recruiter_email','recruiter_last_login','recruiter_phone','recruiter_image');
		$go_to = 'recruiter';
		$this->session->unset_userdata($array_items);
		$array_item['recruiter_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function operation_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['operation_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_operation_logged_in', 'operation_user_id', 'operation_org_id','operation_user_name','operation_email','operation_last_login','operation_phone','operation_image');
		$go_to = 'operation';
		$this->session->unset_userdata($array_items);
		$array_item['operation_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function performance_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['performance_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_performance_logged_in', 'performance_user_id', 'performance_org_id','performance_user_name','performance_email','performance_last_login','performance_phone','performance_image');
		$go_to = 'performance';
		$this->session->unset_userdata($array_items);
		$array_item['performance_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function sales_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['sales_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_sales_logged_in', 'sales_user_id', 'sales_org_id','sales_user_name','sales_email','sales_last_login','sales_phone','sales_image');
		$go_to = 'sales';
		$this->session->unset_userdata($array_items);
		$array_item['sales_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}
	//contractor_06
	function contractor_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['contractor_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_contractor_logged_in', 'contractor_user_id', 'contractor_org_id','contractor_user_name','contractor_email','contractor_last_login','contractor_phone','contractor_image');
		$go_to = 'contractor';
		$this->session->unset_userdata($array_items);
		$array_item['sales_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	//clients_06
	function clients_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['clients_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_clients_logged_in', 'clients_user_id', 'clients_org_id','clients_user_name','clients_email','clients_last_login','clients_phone','clients_image');
		$go_to = 'clients';
		$this->session->unset_userdata($array_items);
		$array_item['sales_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}


	// Check user login status
	function is_user_logged_in() {
		if ($this->session->userdata('is_user_logged_in') == true && $this->session->userdata('user_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_user_logged_in', 'user_user_id', 'user_fname','user_lname','user_email','user_last_login');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 1;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_admin_logged_in() {
		if ($this->session->userdata('is_admin_logged_in') == true && $this->session->userdata('admin_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_admin_logged_in', 'admin_user_id', 'admin_org_id','admin_user_name','admin_email','admin_last_login','admin_phone','admin_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 0;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_sales_logged_in() {
		if ($this->session->userdata('is_sales_logged_in') == true && $this->session->userdata('sales_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_sales_logged_in', 'sales_user_id', 'sales_org_id','sales_user_name','sales_email','sales_last_login','sales_phone','sales_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 2;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_operation_logged_in() {
		if ($this->session->userdata('is_operation_logged_in') == true && $this->session->userdata('operation_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_operation_logged_in', 'operation_user_id', 'operation_org_id','operation_user_name','operation_email','operation_last_login','operation_phone','operation_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 5;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_performance_logged_in() {
		if ($this->session->userdata('is_performance_logged_in') == true && $this->session->userdata('performance_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_performance_logged_in', 'performance_user_id', 'performance_org_id','performance_user_name','performance_email','performance_last_login','performance_phone','performance_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 4;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_recruiter_logged_in() {
		if ($this->session->userdata('is_recruiter_logged_in') == true && $this->session->userdata('recruiter_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_recruiter_logged_in', 'recruiter_user_id', 'recruiter_org_id','recruiter_user_name','recruiter_email','recruiter_last_login','recruiter_phone','recruiter_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 3;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}
	//contractor 06
	function is_contractor_logged_in() {
		if ($this->session->userdata('is_contractor_logged_in') == true && $this->session->userdata('contractor_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_contractor_logged_in', 'contractor_user_id', 'contractor_org_id','contractor_user_name','contractor_email','contractor_last_login','contractor_phone','contractor_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 3;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	//clients 07
	function is_clients_logged_in() {
		if ($this->session->userdata('is_clients_logged_in') == true && $this->session->userdata('clients_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_clients_logged_in', 'clients_user_id', 'clients_org_id','clients_user_name','clients_email','clients_last_login','clients_phone','clients_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 3;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}
	public function registration_save() {
		$this->load->model('login_model');
		$data = $this->input->post();
		$_data = array('status'=>1,'message'=>'');
		if(!empty($data)){
			$data['password'] = md5($data['password']);
			$data['role_id'] = '1';
			$data['status'] = '1';
			$data['user_code'] = strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(10,100)));;
			$data['activation_key'] = strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(100,999)));
			if($_data['status'] > 0){
				$_dataR = $this->login_model->registration_save($data);
				if($_dataR==2){
					$_data['status'] = 0;
					$_data['msg'] = ' The data already exits';
				} else if($_dataR==1){
					$_data['status'] = 1;
					$_data['msg'] = 'The data successfully insert';
				} 
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}
		
}
