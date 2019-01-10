<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		modules::run('login/login/is_clients_logged_in');
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		$this->load->model('clients_model');
		$data = $this->clients_model->clientid();
		if(!empty($data)){
			$this->session->set_userdata(array('client_c_id'  => $data[0]['client_id']));
		} else {
			$this->session->set_userdata(array('client_c_id'  => '0'));
		}
		$this->load->view('common/clients-top');
		$this->load->view('dashboard');
		$this->load->view('common/clients-bottom');
	}
}