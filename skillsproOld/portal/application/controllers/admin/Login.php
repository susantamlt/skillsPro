<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Loginmodel','login');
		
	}

	public function index(){
		$this->load->view('admin/login');

	}

	public function sign_in(){

		$username=$this->input->post('username');
		
		$password=$this->input->post('password');
		
		$result=$this->login->sign_in($username,$password);

		$ret_arr=array('result'=>$result);

		echo json_encode($ret_arr);


	}
}