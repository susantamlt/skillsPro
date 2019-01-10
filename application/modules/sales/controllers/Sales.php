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

	public function repotrs() {
		$this->load->model('sales_model');
		$date = $this->input->post();
		if(isset($date['date']) && $date['date']!=''){
			$days[] = date('Y-m-d',strtotime($date['date']));
			$days[] = date('Y-m-d', strtotime('-1 days', strtotime($date)));
			$days[] = date('Y-m-d', strtotime('-2 days', strtotime($date)));
		} else {
			$days[] = date("Y-m-d");
			$days[] = date("Y-m-d",strtotime('-1 days'));
			$days[] = date("Y-m-d",strtotime('-2 days'));
		}
		$result = $this->sales_model->reports($days);
		$_result = array('sEcho' =>'1','iTotalRecords' =>count($result),'iTotalDisplayRecords' =>count($result),'aaData'=>$result);
		print_r(json_encode($_result));
	}
}