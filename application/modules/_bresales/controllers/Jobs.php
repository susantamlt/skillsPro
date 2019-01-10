<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Jobs extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->helper('file');
		$this->load->library('upload');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('jobs/list');
		$this->load->view('common/sales-bottom');
	}

	public function jobs_list_m() {
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_listm();
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
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_a() {
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_lista();
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
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_add() {
		$this->load->model('jobs_model');
		$data['urlname'] = 'Job';
		$date['client_id'] = '';
		$date['cat_id'] = '';
		$data['ljp_status'] = $this->config->item('ljp_status');
		$data['ljp_leadtype'] = $this->config->item('ljp_leadtype');
		$data['ljp_typeSalary'] = $this->config->item('ljp_typeSalary');
		$data['ljp_projectStage'] = $this->config->item('ljp_projectStage');
		$data['ljp_catid'] = $this->jobs_model->contactdetails($date);
		$data['ljp_industry'] = $this->jobs_model->indtype($date);
		$data['ljp_country'] = $this->jobs_model->get_ljp_country();
		$data['ljp_clients'] = $this->jobs_model->get_ljp_clients();
		$this->load->view('common/sales-top');
		$this->load->view('jobs/jobsadd',$data);
		$this->load->view('common/sales-bottom');
	}

	public function jobs_edit($id="") {
		$this->load->model('jobs_model');
		$data['urlname'] = 'Job';
		$data['ljp_status'] = $this->config->item('ljp_status');
		$data['ljp_leadtype'] = $this->config->item('ljp_leadtype');
		$data['ljp_typeSalary'] = $this->config->item('ljp_typeSalary');
		$data['ljp_projectStage'] = $this->config->item('ljp_projectStage');
		$jobs = $this->jobs_model->get_ljp_jobs($id);
		$data['jobs'] = $jobs;
		$data['ljp_industry'] = $this->jobs_model->indtype($jobs[0]);
		$data['ljp_country'] = $this->jobs_model->get_ljp_country();
		$data['ljp_clients'] = $this->jobs_model->get_ljp_clients();
		$data['ljp_catid'] = $this->jobs_model->contactdetails($jobs[0]);
		$data['ljp_state'] = $this->jobs_model->statelist($jobs[0]);
		$data['ljp_city'] = $this->jobs_model->citylist($jobs[0]);
		$this->load->view('common/sales-top');
		$this->load->view('jobs/jobsedit',$data);
		$this->load->view('common/sales-bottom');
	}

	public function jobs_view($id='') {
		$this->load->model('jobs_model');
		$data['urlname'] = 'Job';
		$jobs = $this->jobs_model->get_ljp_jobsView($id);
		
		$ljp_status = $this->config->item('ljp_status');
		$ljp_leadtype = $this->config->item('ljp_leadtype');
		$ljp_typeSalary = $this->config->item('ljp_typeSalary');
		
		$ljp_catid = $this->jobs_model->contactdetails($jobs[0]);
		$jobs[0]['lead_type']=$ljp_leadtype[$jobs[0]['lead_type']];
		$jobs[0]['lead_status']=$ljp_status[$jobs[0]['lead_status']];
		$jobs[0]['cat_id']=$ljp_catid[$jobs[0]['cat_id']];

		$data['jobs'] = $jobs;
		$data['ljp_projectStage'] = $this->config->item('ljp_projectStage');
		$this->load->view('common/sales-top');
		$this->load->view('jobs/jobsview',$data);
		$this->load->view('common/sales-bottom');
	}

	public function jobs_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$_dataNP = array();
			$_dataN = array();
			$this->load->model('jobs_model');
			if(isset($data['pcmt_id'])){
				if($data['pcmt_id']!=''){
					$_dataN['pcmt_id'] = $data['pcmt_id'];
				}
				unset($data['pcmt_id']);
			}
			if(isset($data['pfile_id'])){
				if($data['pfile_id']!=''){
					$_dataNP['pfile_id'] = $data['pfile_id'];
				}
				unset($data['pfile_id']);
			}
			$prospect_id = $this->jobs_model->jobs_save($data);
			if(!empty($_dataN)){
				$_dataN['prospect_id'] = $prospect_id;
				$cmt_id = $this->jobs_model->jobs_comment_save($_dataN);
			}
			if(!empty($_dataNP)){
				$_dataNP['prospect_id'] = $prospect_id;
				$file_id = $this->jobs_model->jobs_file_save($_dataNP);
			}
			$_data['prospect_id'] = $prospect_id;
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function jobs_client_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['client_id'] = $this->jobs_model->jobs_client_save($data);
			$_data['ljp_clients'] = $this->jobs_model->get_ljp_clients();
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function indtype() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['status'] = 1;
			$_data['indtype'] = $this->jobs_model->indtype($data);
		} else {
			$_data['status'] = 0;
			$_data['indtype'] = '';
		}
		echo json_encode($_data);
	}

	public function contactdetails() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['status'] = 1;
			$_data['catid'] = $this->jobs_model->contactdetails($data);
		} else {
			$_data['status'] = 0;
			$_data['catid'] = '';
		}
		echo json_encode($_data);
	}

	public function jobs_comment_save(){
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['status'] = 1;
			$_data['pcmtid'] = $this->jobs_model->jobs_comment_save($data);
			$_data['message'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function jobs_file_save(){
		$data = $this->input->post();
		if(!empty($data)){
			if(isset($_FILES['documentfile']) && !empty($_FILES['documentfile'])){
				$config = array(
					'upload_path' => "./assets/jobs/doc/",
					'allowed_types' => "docx|jpeg|doc|pdf|jpg|xls|xlsx|csv|ppt|pptx",
					'overwrite' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('documentfile')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$this->load->model('jobs_model');
					$ndata['documentfile']=$redata['file_name'];
					$ndata['pfile_name']=$data['pfile_name'];
					if(isset($data['prospect_id']) && $data['prospect_id']!=''){
						$ndata['prospect_id']=$data['prospect_id'];
					}
					$_data['status'] = 1;
					$_data['pfileid'] = $this->jobs_model->jobs_file_save($ndata);
					$_data['message'] = 'Successful';
				}
			} else {
				$_data['status'] = 1;
				$_data['pfileid'] = $this->jobs_model->jobs_file_save($data);
				$_data['message'] = 'Successful';
			}
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function sendcontract() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['status'] = 1;
			$_data['sendid'] = $this->jobs_model->sendcontract($data);
			$_data['message'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function receivecontract() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$r = $this->jobs_model->receivecontract($data);
			if($r > 0){
				$_data['status'] = 1;
				$_data['recid'] = $this->jobs_model->receivecontract($data);
				$_data['message'] = 'Successful';
			} else {
				$_data['status'] = 0;
				$_data['message'] = 'Faillure';
			}
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Faillure';
		}
		echo json_encode($_data);
	}
}