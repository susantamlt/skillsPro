<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Recruiter extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
        modules::run('login/login/is_recruiter_logged_in');
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		$this->load->view('common/recruiter-top');
		$this->load->view('dashboard');
		$this->load->view('common/recruiter-bottom');
	}
	public function contractors_list() {
		$this->load->model('contractors_model');
		$result = $this->contractors_model->get_contractors_list();
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
				$row[5]= date('jS M Y', strtotime($row[5]));
			}
			$row[6] = '<a href="'.base_url('recruiter/contractors/contractors_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('recruiter/contractors/contractors_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	
}