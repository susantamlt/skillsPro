<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		$this->load->view('common/sales-top');
		$this->load->view('dashboard');
		$this->load->view('common/sales-bottom');
	}
}