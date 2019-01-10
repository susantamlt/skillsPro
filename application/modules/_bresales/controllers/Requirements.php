<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Requirements extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('requirements/list');
		$this->load->view('common/sales-bottom');
	}

	public function requirements_list() {
		$this->load->model('requirements_model');
		$result = $this->requirements_model->get_requirements_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}
			if($row[7]!=''){
				$row[7]= ucwords($row[7]);
			}
			if($row[9]!=''){
				$row[9]= date('jS M Y', strtotime($row[9]));
			}
			$row[10] = '<a href="'.base_url('sales/requirements/requirements_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/requirements/requirements_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/requirements/requirements_assign/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-plus" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function requirements_edit($id="") {
		$this->load->view('common/sales-top');
		$this->load->view('requirements/requirements-edit');
		$this->load->view('common/sales-bottom');
	}

	public function requirements_view($id="") {
		$this->load->model('requirements_model');
		$data['requirement'] = $this->requirements_model->requirements_view($id);
		$this->load->view('common/sales-top');
		$this->load->view('requirements/requirements-view',$data);
		$this->load->view('common/sales-bottom');
	}

	public function requirements_assign($id="") {
		$this->load->view('common/sales-top');
		$this->load->view('requirements/requirements-assign');
		$this->load->view('common/sales-bottom');
	}
}