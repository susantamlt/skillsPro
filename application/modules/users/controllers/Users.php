<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
        modules::run('login/login/is_user_logged_in');
	}

	public function index() {
		$this->dashboard();
	}
	
	public function dashboard() {
		$this->load->view('common/users-top');
		$this->load->view('dashboard');
		$this->load->view('common/users-bottom');
	}
}
