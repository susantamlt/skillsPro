<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contractors extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_clients_logged_in');
	}

	public function index() {		
		$this->load->view('common/clients-top');
		$this->load->view('contractors/list');
		$this->load->view('common/clients-bottom');
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
				$row[3]= date('jS M Y', strtotime($row[3]));
			}
			$row[4] = '<a href="'.base_url('clients/contractors/contractors_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('clients/contractors/contractors_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="'. $row[0] .'"/><label for="checkbox-1-'.intval($row[0]).'"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function contractors_view($id="") {
		$this->load->model('contractors_model');
		$data['contractors'] = $this->contractors_model->contractors_view($id);
		$this->load->view('common/clients-top');
		$this->load->view('contractors/contractors_view',$data);
		$this->load->view('common/clients-bottom');
	}

}