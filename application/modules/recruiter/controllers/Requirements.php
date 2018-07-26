<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Requirements extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_recruiter_logged_in');
	}

	public function index() {		
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/list');
		$this->load->view('common/recruiter-bottom');
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
				$row[6]= date('jS M Y', strtotime($row[6]));
			}
			$row[7] = '<a href="'.base_url('recruiter/requirements/requirements_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function requirements_edit($id="") {
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/leadsedit');
		$this->load->view('common/recruiter-bottom');
	}

	public function requirements_view($id="") {
		$this->load->model('requirements_model');
		$data['requirement'] = $this->requirements_model->requirements_view($id);
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/requirements-view',$data);
		$this->load->view('common/recruiter-bottom');
	}
	public function requirements_assign($id="") {
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/requirements_assign');
		$this->load->view('common/recruiter-bottom');
	}
	public function requirements_assigns($id="") {
		$this->load->model('requirements_model');
	    $result = $this->requirements_model->requirements_assigns();
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
				$row[6]= date('jS M Y', strtotime($row[6]));
			}
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
}