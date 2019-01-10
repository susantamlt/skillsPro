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

	public function contractors_timesheet_add() {
	 	$this->load->model('contractors_model');
		$this->load->view('common/clients-top');
		$this->load->view('contractors/contractors_timesheet_add');
		$this->load->view('common/clients-bottom');
	}

	public function contractors_timesheet_list() {
		$this->load->model('contractors_model');
		$result = $this->contractors_model->get_contractors_timesheet_list();
		$aaData = array();
		$total=0;
		if(!empty($result['aaData'])){
			foreach($result['aaData'] as $row){
				$total = $total + $row[3];
				if($row[1]!=''){
					$row[1]= ucwords(date('l', strtotime($row[2])));
				}
				if($row[2]!=''){
					$row[2]= '('.date('m/d/Y', strtotime($row[2])).')';
				}
				if($row[3]!=''){
					$row[3]= ucwords($row[3]);
				}
				$row[4] = '<a href="'.base_url('clients/contractors/timesheet_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
				$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="'. $row[0] .'"/><label for="checkbox-1-'.intval($row[0]).'"></label>';
				$aaData[] = $row;
			}
			$aaData[] = array('0'=>'','1'=>'Total Hours','2'=>'','3'=>$total,'4'=>'');
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function contractors_timesheet_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('contractors_model');
			$data['date'] = date('Y-m-d', strtotime($data['date']));
			$cts_id = $this->contractors_model->contractors_timesheet_save($data);
			if($cts_id > 1){
				$_data['status'] = 1;
				$_data['msg'] = 'Update';
			} else if($cts_id == 1){
				$_data['status'] = 1;
				$_data['msg'] = 'Success';
			} else {
				$_data['status'] = 0;
				$_data['msg'] = 'Already exist';
			}
			
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}

	public function contractors_view($id="") {
		$this->load->model('contractors_model');
		$data['contractors'] = $this->contractors_model->contractors_view($id);
		$this->load->view('common/clients-top');
		$this->load->view('contractors/contractors_view',$data);
		$this->load->view('common/clients-bottom');
	}

	public function contractors_alllist() {
		$this->load->model('contractors_model');
		$data['timesheets'] = $this->contractors_model->contractors_alllist();
		$this->load->view('common/clients-top');
		$this->load->view('contractors/alllist',$data);
		$this->load->view('common/clients-bottom');
	}

	public function contractors_alllists() {
		$data = $this->input->post();
		if(!empty($data) && isset($data['date']) && $data['date']!=''){
			$this->load->model('contractors_model');
			$ndateN = date('Y-m-d',strtotime($data['date']));
			if(date('D', strtotime($ndateN))=='Sun'){
				$ndata['to'] = date('Y-m-d', strtotime("This Sunday", strtotime($ndateN)));
			} else {
				$ndata['to'] = date('Y-m-d', strtotime("Next Sunday", strtotime($ndateN)));
			}
			if(date('D', strtotime($ndateN))=='Mon'){
				$ndata['from'] = date('Y-m-d', strtotime("This Monday", strtotime($ndateN)));;
			} else {
				$ndata['from'] = date('Y-m-d', strtotime("Last Monday", strtotime($ndateN)));;
			}
			$data['from']=$ndata['from'];
			$data['to']=$ndata['to'];
			$data['timesheets'] = $this->contractors_model->contractors_alllist($ndata);
			$newHtml = $this->load->view('contractors/alllists',$data,true);
			$arrayName = array('status' =>'1','html'=>$newHtml);
		} else {
			$arrayName = array('status' =>'0','html'=>'');
		}
		echo json_encode($arrayName);
	}

	public function contractors_timesheets_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('contractors_model');
			$cts_id = $this->contractors_model->contractors_timesheets_save($data);
			if($cts_id['status'] == 2){
				$_data['status'] = 1;
				$_data['msg'] = 'Update';
				$_data['ids'] = $cts_id['id'];
			} else if($cts_id['status'] == 1){
				$_data['status'] = 1;
				$_data['ids'] = $cts_id['id'];
				$_data['msg'] = 'Success';
			} else {
				$_data['status'] = 0;
				$_data['ids'] = $cts_id['id'];
				$_data['msg'] = 'Already exist';
			}
			
		} else {
			$_data['status'] = 0;
			$_data['id'] = 0;
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}
}