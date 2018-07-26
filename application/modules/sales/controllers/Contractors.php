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
			$row[6] = '<a href="'.base_url('sales/contractors/contractors_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/contractors/contractors_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
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
		$this->load->model('contractors_model');
		$ljp_data=$this->contractors_model->get_ljp_constractorsview($id);
        $data['ljp_data']=$ljp_data;
		$this->load->view('common/sales-top');
		$this->load->view('contractors/contractor_edit',$data);
		$this->load->view('common/sales-bottom');
	}

	public function contractors_save() {
		$data = $this->input->post();
		$_data = array('status'=>1,'message'=>'');
		if(!empty($data)){
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
				$_dataR = $this->contractors_model->contractor_save($data);
				if($_dataR==2){
					$_data['status'] = 0;
					$_data['msg'] = ' The data already exits';
				} else if($_dataR==1){
					$_data['status'] = 1;
					$_data['msg'] = 'The data successfully insert';
				} else if($_dataR==3){
					$_data['status'] = 1;
					$_data['msg'] = 'The data update Successfully';
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
			
}