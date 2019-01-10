<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Interview extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('upload');
		$this->load->model('interview_model');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
	    $this->load->view('interview/list');
		$this->load->view('common/sales-bottom');
	}
	public function interview_list() {
		$this->load->model('interview_model');
		$result = $this->interview_model->get_interview_list();
		$status = array('0'=>'Shortlisted', '1'=>'On-Hold', '2'=>'Interview Schedule', '3'=>'Rejected');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($status[$row[2]]);
			}
			if($row[3]!=''){
				$row[3]= date('jS M Y', strtotime($row[3]));
			}
			if($row[4]!=''){
				$row[4]= date('h:i a', strtotime($row[4]));
			}
			$row[5] = '<a href="'.base_url('sales/interview/interview_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/interview/interview_form/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	/*public function interview_form() {
		$this->load->model('interview_model');
		 $data['user'] = $this->interview_model->get_client_name();
			$this->load->view('common/sales-top');
			$this->load->view('sales/interview/interview_form',$data);
			$this->load->view('common/sales-bottom');
		}*/
	public function interview_form($id="") {
		$this->load->model('interview_model');
		if($id > 0){
			$data['user'] = $this->interview_model->get_client_name($id);
			$ljp_data = $this->interview_model->get_details($id);
			$data['ljp_data']=$ljp_data;
			$data['pdata']=array(''=>'--Select One--');
			$data['id'] = $id;
			$this->load->view('common/sales-top');
			$this->load->view('sales/interview/interview_form',$data);
			$this->load->view('common/sales-bottom');
		} else {
			$this->load->view('common/sales-top');
			$this->load->view('common/sales-bottom');
		}
	}
	public function get_prospect() {
		$data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['prospect'] = $this->interview_model->get_prospect_title($data);
		} else {
			$_data['status'] = 0;
			$_data['prospect'] = '';
		}
		echo json_encode($_data);
	}

    public function schedule_save($value='') { 
    	$this->load->model('interview_model');
		   $data = $this->input->post();
		   $_data = array('status'=>1,'message'=>'');
		   //print_r($data);exit();
		if(!empty($data)){
               if(isset($_FILES['file_name']) && !empty($_FILES['file_name'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'interview'.DIRECTORY_SEPARATOR,
					'allowed_types' => "pdf|doc|docx",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				$fname = $_FILES['file_name']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_name')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['file_name'] = 'user/'.$redata['file_name'];
				}
			}
			if($_data['status'] > 0){
			$data['interview_date'] = date('Y-m-d',strtotime($data['interview_date']));
			$data['interview_time'] = date('H:i',strtotime($data['interview_time']));
			//print_r($data);exit();
		  	$result=$this->interview_model->contractors_save($data);
		  	//print_r($result);exit();
		  	if ($result==1) {
				$_data['status'] = 1;
			    $_data['msg'] = 'Successful';
			} else {
               $_data['status'] = 0;
			   $_data['msg'] = 'Failure';			
			}
		} else {
			$_data['status']=0;
			$_data['msg']='Failure';
		}
	}else{
		$_data['status']=0;
			$_data['msg']='Failure';
	}
		echo json_encode($_data);
	}

	public function interview_view($id="") {
		$this->load->model('interview_model');
		$ljp_data = $this->interview_model->get_details($id);
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/sales-top');
		$this->load->view('sales/interview/interview_view',$data);
		$this->load->view('common/sales-bottom');
	}
}