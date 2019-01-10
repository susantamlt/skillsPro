<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Emailmessage extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
        $this->lang->load('data');
        $this->load->helper('url');
        $this->load->model('Emailmessage_model');
	}
	public function index() {		
		$this->load->view('common/sales-top');
	    $this->load->view('emailmessage/list');
		$this->load->view('common/sales-bottom');
	}
	public function emailmessage_list() {
		$this->load->model('emailmessage_model');
		$data = $this->input->post();
		$result = $this->emailmessage_model->get_emailmessage_list($data);
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			$row[3] = '<a href="'.base_url('sales/emailmessage/emailmessage_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/emailmessage/emailmessage_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function emailmessage_view($id="") {
		$this->load->model('emailmessage_model');
		$data['results'] = $this->emailmessage_model->get_ljp_ParticularDataView($id);
		$this->load->view('common/sales-top');
		$this->load->view('emailmessage/emailmessageview',$data);
		$this->load->view('common/sales-bottom');
	}
	public function emailmessage_add() {
		$this->load->model('emailmessage_model');
		$this->load->view('common/sales-top');
		$this->load->view('emailmessage/emailmessageadd');
		$this->load->view('common/sales-bottom');
	}
	public function emailmessage_edit($id="") {
		$this->load->model('emailmessage_model');
		$results= $this->emailmessage_model->get_ljp_ParticularDataView($id);
		$data['results'] = $results;
		$this->load->view('common/sales-top');
		$this->load->view('emailmessage/emailmessageedit',$data);
		$this->load->view('common/sales-bottom');
	}
    public function emailmessage_save() {
    	$this->load->model('emailmessage_model');
    	$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->emailmessage_model->emailmessage_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = 'Record already exits';
			} else if($_dataR==1){
				$_data['status'] = 1;
				$_data['msg'] = 'Record inserted  successfully  ';
			} else if($_dataR==3){
				$_data['status'] = 1;
				$_data['msg'] = 'Record updated successfully ';
			} else {
				$_data['status'] = 0;
				$_data['msg'] = 'Failed to insert record';
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Failed to update record';
		}
		echo json_encode($_data);
		
	}
}
	

