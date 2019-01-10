<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('upload');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('leads/list');
		$this->load->view('common/sales-bottom');
	}

	public function leads_list_m() {
		$this->load->model('leads_model');
		$result = $this->leads_model->get_Leads_listm();
		$leadcat = $this->config->item('ljp_leadcats');
		$aaData = array();
		$Data = array('1'=>'Company-to-Company','2'=>'Requirement Basic');
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$ValArray = explode(',', $row[3]);
				$catVal = '';
				foreach ($ValArray as $vk => $vAv) {
					if($catVal!=''){
						$catVal = $catVal.', '.$leadcat[$vAv];
					} else {
						$catVal = $leadcat[$vAv];
					}
				}
				$row[3]= ucwords($catVal);
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
				$row[7]= ucwords($Data[$row[7]]);
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/leads/leads_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/leads/leads_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function leads_list_a() {
		$this->load->model('leads_model');
		$result = $this->leads_model->get_Leads_lista();
		$leadcat = $this->config->item('ljp_leadcats');
		$Data = array('1'=>'Company-to-Company','2'=>'Requirement Basic');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$ValArray = explode(',', $row[3]);
				$catVal = '';
				foreach ($ValArray as $vk => $vAv) {
					if($catVal!=''){
						$catVal = $catVal.', '.$leadcat[$vAv];
					} else {
						$catVal = $leadcat[$vAv];
					}
				}
				$row[3]= ucwords($catVal);
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
				$row[7]= ucwords($Data[$row[7]]);
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/leads/leads_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/leads/leads_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function leads_add() {
		$data['urlname'] = 'Contract Type';
		$this->load->model('leads_model');
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');
		$data['ljp_contractType'] = $this->config->item('ljp_contractType');
		$data['ljp_leadsource'] = $this->leads_model->get_ljp_leadsource();
		$data['ljp_leadstatus'] = $this->leads_model->get_ljp_leadstatus();
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsadd',$data);
		$this->load->view('common/sales-bottom');
	}

	public function leads_edit($id="") {
		$this->load->model('leads_model');		
		$data['urlname'] = 'Contract Type';
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');		
		$data['ljp_contractType'] = $this->config->item('ljp_contractType');
		$ljp_Data = $this->leads_model->get_ljp_ParticularData($id);
		$data['ljp_Data'] = $ljp_Data;
		$data['ljp_industry'] = $this->leads_model->get_ljp_industry($ljp_Data[0]['cat_id']);
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsedit',$data);
		$this->load->view('common/sales-bottom');
	}

	public function leads_view($id="") {
		$this->load->model('leads_model');
		$data['ljp_Data'] = $this->leads_model->get_ljp_ParticularDataView($id);
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsview',$data);
		$this->load->view('common/sales-bottom');
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
	public function leads_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('leads_model');
			$_data['client_id'] = $this->leads_model->leads_save($data);
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}

	public function leads_client_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('leads_model');
			$_data['client_id'] = $this->leads_model->leads_client_save($data);
			$_data['ljp_clients'] = $this->leads_model->get_ljp_clients();
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
			$this->load->model('leads_model');
			$_data['status'] = 1;
			$_data['indtype'] = $this->leads_model->indtype($data);
		} else {
			$_data['status'] = 0;
			$_data['indtype'] = '';
		}
		echo json_encode($_data);
	}
	public function leadsimport() {
		//$data['ljp_website'] = $this->leads_model->get_ljp_contact();
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsimport');
		$this->load->view('common/sales-bottom');
	}

	public function leadsformat($value='') {
		$this->load->helper('download');
		$list[] = array( 'Client Name','Contact Name','Industry','Primary Phone','Secoundary Phone','Primary Email','Secoundary Email','Depertment','Fax No','Job Title','Linkedin','Twitter','Address','Skype ID','Website Address');
		$fp = fopen('php://output', 'w');
		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}

		$data = file_get_contents('php://output'); 
		$name = 'leadsformat.csv';
		// Build the headers to push out the file properly.
		header('Pragma: public');     // required
		header('Expires: 0');         // no cache
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Cache-Control: private',false);
		header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
		header('Content-Transfer-Encoding: binary');
		header('Connection: close');
		exit();
		force_download($name, $data);
		fclose($fp);
	}
	public function validationMethod($data='') {
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('contact_name', 'Client Name', 'required|regex_match[/^([a-zA-Z0-9 ])+$/i]');
		$this->form_validation->set_rules('decision_maker_name', 'Contact Name', 'required|regex_match[/^([a-zA-Z0-9 ])+$/i]');
		$this->form_validation->set_rules('phone_1','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('phone_2','Secondary Phone','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('email_1', 'E-mail', 'required|valid_email|regex_match[/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/]');
		$this->form_validation->set_rules('email_2', 'E-mail', 'required|valid_email|regex_match[/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/]');
		$this->form_validation->set_rules('job_title','job_title','required');
		$this->form_validation->set_rules('address','address','required');
		$this->form_validation->set_rules('cat_id','cat_id','required');
		
		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
			return 0;
		} else {
			return 1;
		}
	}
	public function leadsimport_save($value='') {
		$this->load->model('leads_model');
		$_data = $this->input->post();
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$handle = fopen($_FILES['documentfile']['tmp_name'],"r");
		$i=0;$j=0;$k=0;
		$csv = array();
		while(($data = fgetcsv($handle,1000, ',')) !== FALSE) {
			$csv[$k]['org_id']= $org_id;
			$csv[$k]['user_id']= $user_id;
			$csv[$k]['contact_name']= $data[0];
			$csv[$k]['decision_maker_name']= $data[1];
			$csv[$k]['cat_id']= $data[2];
			$csv[$k]['phone_1']= $data[3];
			$csv[$k]['phone_2']= $data[4];
			$csv[$k]['email_1']= $data[5];
			$csv[$k]['email_2']= $data[6];
			$csv[$k]['department']= $data[7];
			$csv[$k]['fax']= $data[8];
			$csv[$k]['job_title']= $data[9];
			$csv[$k]['address']= $data[10];
			$csv[$k]['skype_id']= $data[11];
			$csv[$k]['twitter']= $data[12];
			$csv[$k]['linkedin']= $data[13];
			$csv[$k]['website']= $data[14];
			$k++;
		}
		fclose($handle);
		$header = $csv[0];
		unset($csv[0]);
		if(!empty($csv)){
			foreach ($csv as $kCsv => $VCsv) {
				$VCsv['cat_id']= $this->leads_model->getCatId($VCsv['cat_id']);
				if ($this->validationMethod($VCsv)==0){
					$j++;
				} else {
					$return = $this->leads_model->leadsimport_save($VCsv);
					if($return > 0){
						$i++;
					} else {
						$j++;
					}
				}
			}
		}
		$return = array('status'=>'1','tcount'=>$k-1,'scount'=>$i,'fcount'=>$j);
		echo json_encode($return);

	}
	public function leads_file_save(){
		$this->load->model('leads_model');
		$data = $this->input->post();
		if(!empty($data)){
			if(isset($_FILES['document_upload']) && !empty($_FILES['document_upload'])){
				$config = array(
					'upload_path' => "./assets/leads/doc/",
					'allowed_types' => "docx|jpeg|doc|pdf|jpg|xls|xlsx|csv|ppt|pptx",
					'overwrite' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('document_upload')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$this->load->model('leads_model');
					$ndata['document_upload']=$redata['file_name'];
					$ndata['document_file_name']=$data['document_file_name'];
					if(isset($data['contact_id']) && $data['contact_id']!=''){
						$ndata['contact_id']=$data['contact_id'];
					}
					$_data['status'] = 1;
					$_data['pfileid'] = $this->leads_model->leads_file_save($ndata);
					$_data['message'] = 'Successful';
				}
			} else {
				$_data['status'] = 1;
				$_data['pfileid'] = $this->leads_model->leads_file_save($data);
				$_data['message'] = 'Successful';
			}
		} else {
			$_data['status'] = 0;
			$_data['message'] = 'Failure';
		}
		echo json_encode($_data);
	}


}