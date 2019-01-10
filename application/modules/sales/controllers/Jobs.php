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
		$this->load->model('jobs_model');
		$data['ljp_country'] = $this->jobs_model->get_ljp_country();
		$data['ljp_state'] = $this->jobs_model->get_ljp_state();
		$data['ljp_citys'] = $this->jobs_model->get_ljp_citys();
		$data['ljp_industry'] = $this->jobs_model->get_ljp_industry();
		$this->load->view('common/sales-top');
		$this->load->view('jobs/list',$data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_a() {
		$data = $this->input->post();
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_lista($data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_ns() {
		$data = $this->input->post();
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_listns($data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_s() {
		$data = $this->input->post();
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_lists($data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_CL() {
		$data = $this->input->post();
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_listnCL($data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_indeed() {
		$data = $this->input->post();
		$this->load->model('jobs_model');
		$result = $this->jobs_model->get_Jobs_listnIndeed($data);
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
				$row[4]= strtolower($row[4]);
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
			$isVerified = $row[9];
			if($isVerified=='Y'){
				$confirmClass = 'v_confirm';
				$confirmClassI = 'glyphicon-ok';
			} else {
				$confirmClass = 'a_confirm';
				$confirmClassI = 'glyphicon-ban-circle';
			}
			$row[9] = '<a href="'.base_url('sales/jobs/jobs_view/').$row[0].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/jobs/jobs_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" id="confirm-'.$row[0].'" class="'.$confirmClass.'" title="Verified Checking" data-id="'.$row[0].'" data-toggle="tooltip"><i id="confirm-i-'.$row[0].'" class="glyphicon '.$confirmClassI.'" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function jobs_list_filter($value='') {
		$data = $this->input->post();
		print_r(json_encode($data));
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
		if(isset($jobs[0]['is_sms_sent']) && $jobs[0]['is_sms_sent']=='Y'){
			$data['is_sent']='Y';
			
		}else{
			$data['is_sent']='N';
		}

		$data['email_verified']=$this->jobs_model->email_verified($id);
		$template=$this->jobs_model->get_template_sms();
		$template_email=$this->jobs_model->get_template_email();
		
		$ljp_status = $this->config->item('ljp_status');
		$ljp_leadtype = $this->config->item('ljp_leadtype');
		$ljp_typeSalary = $this->config->item('ljp_typeSalary');
		if($jobs[0]['client_id'] > 0){
			$ljp_catid = $this->jobs_model->contactdetails($jobs[0]);
		} else {
			$ljp_catid = $this->config->item('ljp_leadcat');
		}		
		$jobs[0]['lead_type']=$ljp_leadtype[$jobs[0]['lead_type']];
		$jobs[0]['lead_status']=$ljp_status[$jobs[0]['lead_status']];
		unset($ljp_catid['']);
		if($jobs[0]['cat_id']!='' && !empty($ljp_catid)){
			$jobs[0]['cat_id']=$ljp_catid[$jobs[0]['cat_id']];
		} else {
			$jobs[0]['cat_id']='';
		}

		$data['jobs'] = $jobs;
		$data['template']=$template;
		$data['get_template_email']=$template;
		$data['ljp_projectStage'] = $this->config->item('ljp_projectStage');
		$this->load->view('common/sales-top');
		$this->load->view('jobs/jobsview',$data);
		$this->load->view('common/sales-bottom');
	}

	public function jobs_search() {
		$this->load->model('jobs_model');
		$_data['cat_id']='3';
		$data['urlname'] = 'Job';
		$data['ljp_data']['cat_id'] = '3';
		$data['ljp_catid'] = $this->config->item('ljp_lead_cats');
		$data['ljp_projectType'] = $this->jobs_model->indtype($_data);
		$data['ljp_country'] = $this->jobs_model->get_ljp_country();
		$this->load->view('common/sales-top');
		$this->load->view('jobs/jobssearch',$data);
		$this->load->view('common/sales-bottom');
	}

	public function jobsearch() {
		$data = $this->input->post();
		if(isset($data['lead_type']) && $data['lead_type']!='' && isset($data['city_id']) && $data['city_id']!='' && isset($data['state_code']) && $data['state_code']!='' && isset($data['country_code']) && $data['country_code']!=''){
			$client = new Indeedapi("444214432879792");
			$params = array(
				"q" => $data['lead_type'],
				"l" => $data['city_id'].','.$data['state_code'],
				"userip" => "1.2.3.4",
				"useragent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2)",
				'start' => 0,
				'limit' => 25,
				'co'=>$data['country_code']
			);
			$results = $client->search($params);
			if(!empty($results['results'])){
				if($results['totalResults'] > '25'){
					$_sEcho = ((int)$results['totalResults'] / 25);
					if(is_float($_sEcho)){
						$_sEcho1 = explode('.', $_sEcho);
						$sEcho = $_sEcho1[0]+1;
					} else {
						$sEcho = $_sEcho;
					}
				} else {
					$sEcho = 1;
				}

				$data = array('sEcho'=>(int)$sEcho,'iTotalRecords'=>(int)$results['totalResults'],'iTotalDisplayRecords'=>(int)$results['end'],'aaData'=>'');
				$aaData = array();
				foreach($results['results'] as $rk => $_data){
					$_rk = $rk+1;
					$row = array();
					$row[0]='';
					$row[1]= ucwords($_data['jobtitle']);
					$row[2]= ucwords($_data['company']);
					$row[3]= ucwords($_data['city'].', '.$_data['state'].', '.$_data['country']);
					$row[4]= ucwords($_data['language']);
					$row[5]= ucwords($_data['source']);
					//$row[6]= ucwords($_data['snippet']);
					$row[6]= ucwords($_data['formattedRelativeTime']);
					$row[7]= date('jS M Y', strtotime($_data['date']));
					$row[8] = '<a href="'.base_url('sales/jobs/jobsearchview/').$_data['jobkey'].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>';
					$row[0] = '<input type="checkbox" id="checkbox-1-' . $_rk. '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $_rk . '"/><label for="checkbox-1-' . $_rk . '"></label>';
					$aaData[] = $row;
				}
				$data['aaData'] = $aaData;
			} else {
				$data = array('sEcho'=>'0','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
			}
		} else {
			$data = array('sEcho'=>'0','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
		}
		print_r(json_encode($data));
	}

	public function jobsearchview($id='') {
		$data['urlname'] = 'Job';
		if($id!=''){
			$client = new Indeedapi("444214432879792");
			$params = array(
				"jobkeys" => array("$id"),
			);
			$results = $client->jobs($params);
			if(!empty($results['results'])){
				$data['results'] = $results['results'];
				$this->load->view('common/sales-top');
				$this->load->view('jobs/jobssearchview',$data);
				$this->load->view('common/sales-bottom');
			} else {
				$this->load->view('common/sales-top');
				$this->load->view('common/sales-bottom');
			}
		} else {
			$this->load->view('common/sales-top');
			$this->load->view('common/sales-bottom');
		}
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
			$_data['msg'] = 'Failure';
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
			$_data['message'] = 'Failure';
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
			$_data['message'] = 'Failure';
		}
		echo json_encode($_data);
	}

	public function sendcontract() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$_data['status'] = 1;
			$send = $this->jobs_model->sendcontract($data);
			$config = array('protocol'=>'sendmail','mailpath'=>'/usr/sbin/sendmail','charset'=>'iso-8859-1','wordwrap'=>TRUE);
			if(!empty($send)){
				if($send['email_1']!=''){
					$send['contact_email_id'] = $data['id'];
					$message = $this->load->view('jobs/emailTemplate',$send, TRUE);
					$this->load->library('email');
					$this->email->initialize($config);
					$this->email->set_mailtype("html");
					$this->email->from('danny.peters@newtonmast.com', 'Danny Peters');
					$this->email->cc('aaron.myers@newtonmast.com', 'Aaron Myers'); 
					$this->email->to("'".$send['email_1']."'");
					/*$this->email->to('avik.mitra@mindtechlabs.com');*/
					$this->email->subject('Re: Craigslist: Job Post');
					$this->email->message($message);
					$this->email->send();
				}
				if($send['phone_1']!='' && $send['phone_type']=='M'){
					
				}
			}
			$_data['sendid'] = $send;
			$_data['message'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Failure';
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
				$_data['message'] = 'Failure';
			}
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Failure';
		}
		echo json_encode($_data);
	}

    public function get_template_content(){
    	$this->load->model('jobs_model');
    	$template_id=$this->input->post('message_temaplte_id');
    	$result=$this->jobs_model->get_content($template_id);
    	$ret_arr=array('result'=>1,'content'=>$result);
    	echo  json_encode($ret_arr);
    }

    public function call_status(){
    	$data['call_status']=$this->input->post('call_status');
    	$data['call_comment']=$this->input->post('call_status');
    	//$data['called']
    	$data['job_id']=$this->input->post('job_id');

    	$data['called_by']=$this->session->userdata('');
    }

    public function email_list_create(){
    	$this->load->model('jobs_model');
    	$data['email']=$this->input->post('email');
    	$data['job_id']=$this->input->post('job_id');

    	$result=$this->jobs_model->email_save($data);
    	
    	$ret_arr=array('result'=>$result);
    	echo json_encode($ret_arr);
    }

    public function verifiedChecking() {
    	$this->load->model('jobs_model');
    	$data = $this->input->post();
    	if(!empty($data)){
    		$resultEmail = $this->jobs_model->get_ljp_jobsView($data['job_id']);
    		if($resultEmail[0]['prospect_email_1']!='' && preg_match("/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/",$resultEmail[0]['prospect_email_1']) !== 0){
    			$data['email']=$resultEmail[0]['prospect_email_1'];
    			$result = $this->jobs_model->verifiedChecking($data);
    			if($result > 0){
    				$_data = array('status'=>1,'msg'=>'Verified');
    			} else {
    				$_data = array('status'=>0,'msg'=>'Sorry not available');
    			}
    		}
    	} else {
    		$_data = array('status'=>0,'msg'=>'Sorry not available');
    	}
    	echo json_encode($_data);
    }

	public function jobgoogleurl() {
		$data = $this->input->post();
		if(isset($data['user_id']) && $data['user_id'] > 0){
			$this->load->model('jobs_model');
			$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$data['click_time'] = date('Y-m-d H:i:s');
			$data['is_url'] = 'G';
			$this->jobs_model->jobgoogleurl_save($data);
			echo json_encode(array('status' =>'1','msg'=>'Thank You'));
		} else {
			echo json_encode(array('status' =>'0','msg'=>'No data found'));
		}
	}

	public function joburl() {
		$data = $this->input->post();
		if(isset($data['user_id']) && $data['user_id'] > 0){
			$this->load->model('jobs_model');
			$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$data['click_time'] = date('Y-m-d H:i:s');
			$data['is_url'] = 'U';
			$this->jobs_model->jobgoogleurl_save($data);
			echo json_encode(array('status' =>'1','msg'=>'Thank You'));
		} else {
			echo json_encode(array('status' =>'0','msg'=>'No data found'));
		}
	}

	public function jobs_client_save_data($value='') {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('jobs_model');
			$Result = $this->jobs_model->jobs_client_save_data($data);
			if($Result > 0){
				$data['prospect_phone_1']=$Result['phone_1'];
				$data['prospect_email_1']=$Result['email_1'];
				$data['client_id']=$Result['contact_id'];
				unset($data['phonenumber']);
				unset($data['emailid']);
				unset($data['contact_name']);
				$update=$this->jobs_model->jobs_save($data);
				$_data['status'] = 1;
				$_data['msg'] = 'Successful';
			} else {
				$_data['status'] = 0;
				$_data['msg'] = 'Failure';				
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}
}