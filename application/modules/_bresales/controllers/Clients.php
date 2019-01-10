<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('clients/list');
		$this->load->view('common/sales-bottom');
	}

	public function clients_list() {
		$this->load->model('clients_model');
		$result = $this->clients_model->get_clients_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}			
			$row[7] = '<a href="'.base_url('sales/clients/clients_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/clients/clients_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function clients_edit($id="") {
		$this->load->view('common/sales-top');
		$this->load->view('clients/clientsedit');
		$this->load->view('common/sales-bottom');
	}

	public function clients_view($id="") {
		$this->load->view('common/sales-top');
		$this->load->view('clients/clientsview');
		$this->load->view('common/sales-bottom');
	}
}