<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contractors extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->model('contractors_model');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('contractors/list');
		$this->load->view('common/sales-bottom');
	}

	public function contractors_list() {
		$result = $this->contractors_model->get_contractors_list();
		$aaData = array();
		$status = array('0'=>'Shortlisted','1'=>'Scheduling','2'=>'Process','3'=>'Selected','4'=>'Rejected');
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
			if($row[6]!=''){
				$row[6]= ucwords($status[$row[6]]);
			}
			if($row[7]!=''){
				$row[7]= date('jS M Y', strtotime($row[7]));
			}
			$row[8] = '<a href="'.base_url('sales/contractors/contractors_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/contractors/contractors_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	
	public function contractors_view($id="") {
		$data['urlname'] = 'Contractors';
        $data['contractor'] = $this->contractors_model->get_ljp_constractorsview($id);
        $ljp_status = $this->config->item('ljp_status');
		$this->load->view('common/sales-top');
		$this->load->view('contractors/contractors_view',$data);
		$this->load->view('common/sales-bottom');
	}

	public function contractors_add() {
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');
		$this->load->view('common/sales-top');
		$this->load->view('contractors/contractorsadd',$data);
		$this->load->view('common/sales-bottom');
	}
 
	public function contractors_edit($id="") {
		$data['user'] = $this->contractors_model->get_client_name($id);
		$data['pdata']=array(''=>'--Select One--');
		$this->load->model('contractors_model');
		$ljp_data=$this->contractors_model->get_ljp_constractorsview($id);
        $data['ljp_data']=$ljp_data;
		$this->load->view('common/sales-top');
		$this->load->view('contractors/contractor_edit',$data);
		$this->load->view('common/sales-bottom');
		
        }
        public function get_prospect() {
		$data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['prospect'] = $this->contractors_model->get_prospect_title($data);
		} else {
			$_data['status'] = 0;
			$_data['prospect'] = '';
		}
		echo json_encode($_data);
	}

	public function contractors_save() {
        $data = $this->input->post();
		$data['date_time'] = date('y-m-d H:i:s',strtotime($data['date_time']));
		$_data['status']=1;
		$_data['msg']='';
		//multiple image uploded
		if(!empty($data)){
			$_datadocument_uploded = array();
			if(isset($_FILES['uplode_document']) && !empty($_FILES['uplode_document'])){
				$count_doc = count($_FILES['uplode_document']['name'] );				
				for( $i = 0; $i < $count_doc; $i++ ) {
					$_FILES['file']['name']     = $_FILES['uplode_document']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['uplode_document']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['uplode_document']['tmp_name'][$i];
	                $_FILES['file']['error']    = $_FILES['uplode_document']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['uplode_document']['size'][$i];

					$config = array(
						'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'contractor'.DIRECTORY_SEPARATOR.'base'.DIRECTORY_SEPARATOR,
						'allowed_types' => "pdf|doc|docx",
						'overwrite' => TRUE,
						'encrypt_name' => TRUE,
						'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					);


					$fname = $_FILES['file']['name'];
					$_ext = explode('.',$fname);
					$ext = end($_ext);
					$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
					$this->load->library('upload', $config);
                	$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$redata = $this->upload->data();
						$dataDoc['uplode_document']=$redata['file_name'];
						$dataDoc['user_id']=$data['user_id'];
						$dataDoc['org_id']=$data['org_id'];
						$dataDoc['contractor_id']=$data['contractor_id'];
						$this->contractors_model->document_save($dataDoc);
						$_data['status'] = 1;
						$_data['message'][] = "Doc file upload successfully";
					} else {
						$_data['status'] = 0;
						$_data['message'][] = $this->upload->display_errors();
					}
				}		
	        }
			if(isset($_FILES['file_name']) && !empty($_FILES['file_name'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'contractors'.DIRECTORY_SEPARATOR,
					'allowed_types' => "pdf|doc|docx",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);

				$fname = $_FILES['file_name']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_name')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['file_name'] = 'users/contractors/'.$redata['file_name'];
				}
			}
			//I9 image uploded
			if(isset($_FILES['uplode_inine']) && !empty($_FILES['uplode_inine'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'contractor'.DIRECTORY_SEPARATOR.'inine'.DIRECTORY_SEPARATOR,
					'allowed_types' => "pdf|doc|docx",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				
				$fname = $_FILES['uplode_inine']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_name')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['uplode_inine'] = 'contractor/inine/'.$redata['file_name'];
				}
			}
			//uplode social file
			if(isset($_FILES['uplode_social']) && !empty($_FILES['uplode_social'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'contractor'.DIRECTORY_SEPARATOR.'social'.DIRECTORY_SEPARATOR,
					'allowed_types' => "pdf|doc|docx",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				$fname = $_FILES['uplode_social']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_name')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['uplode_social'] = 'contractor/social/'.$redata['file_name'];
				}
			}
			//uplode identy file
			if(isset($_FILES['uplode_identity']) && !empty($_FILES['uplode_identity'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'contractor'.DIRECTORY_SEPARATOR.'identy'.DIRECTORY_SEPARATOR,
					'allowed_types' => "pdf|doc|docx",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				$fname = $_FILES['uplode_identity']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_name')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['uplode_identity'] = 'contractor/identy/'.$redata['file_name'];
				}
			}


              if($_data['status'] > 0){
				$_dataR = $this->contractors_model->contractor_save($data);
				if($_dataR==2){
					$_data['status'] = 0;
					$_data['msg'] = ' Record already exits';
				} else if($_dataR==1){
					$_data['status'] = 1;
					$_data['msg'] = 'Record inserted successfully';
				} else if($_dataR==3){
					$_data['status'] = 1;
					$_data['msg'] = 'Record update Successfully';
				} else {
					$_data['status'] = 0;
					$_data['msg'] = 'Faillure';
				}
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}
	public function resume_download($id='') {
		$data['urlname'] = 'Contractors';
		$this->load->model('contractors_model');
		$files = $this->contractors_model->get_resumefile_name($id);
		if(isset($files[0]['file_name']) && $files[0]['file_name']!=''){
	     	$file = explode('/', $files[0]['file_name']);
	     	$this->load->helper('download');
			$data = file_get_contents(base_url("/assets/users/contractors/".end($file)));
			$name = end($file);
			force_download($name, $data);			
		} else {
			redirect(base_url('sales/contractors/contractors_view/').$id);
		}
	}	

	/*public function shortlist_contractor_save($id="") {
		$this->load->model('contractors_model');
		$ljp_status = $this->config->item('ljp_status');
        $contractor = $this->contractors_model->get_ljp_constractorsview($id);
        $data['contractor_id']=$contractor[0]['contractor_id'];
        $data['user_id']=$contractor[0]['user_id'];
        $data['org_id']=$contractor[0]['org_id'];
        if (!empty($data)) {
        	$this->contractors_model->shortlist_save($data);
        }else{
               $_data['status'] = 0;
			   $_data['msg'] = 'Faillure';
        }
        echo json_encode($_data);	
    }*/
		
		public function contractors_assign($id="") {
		if($id > 0){
			$data['user'] = $this->contractors_model->get_client($id);
			$data['sdata'] = $this->contractors_model->requirements_assaignView($id);
			$data['id'] = $id;
			$this->load->view('common/recruiter-top');
			$this->load->view('contractors/contractors_assign',$data);
			$this->load->view('common/recruiter-bottom');
		} else {
			$this->load->view('common/recruiter-top');
			$this->load->view('common/recruiter-bottom');
		}
	}

	public function shortlist_contractor_save($id="") {
		$data = $this->input->post();
		$this->load->model('contractors_model');
		$ljp_status = $this->config->item('ljp_status');
        $contractor = $this->contractors_model->get_ljp_constractorsview($data['contractor_id']);
        $data['contractor_id']=$contractor[0]['contractor_id'];
        $data['user_id']=$contractor[0]['user_id'];
        $data['org_id']=$contractor[0]['org_id'];
        if(!empty($data)){
			$result = $this->contractors_model->shortlist_save($data);
			if ($result==1) {
				$_data['status'] = 1;
			    $_data['msg'] = 'Successful';
			} else {
               $_data['status'] = 0;
			   $_data['msg'] = 'Failure';			
			}
		} else {
		  	$_data['status'] = 0;
			$_data['msg']='already exits';
		}
		echo json_encode($_data);
	}
	
}