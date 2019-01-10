<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Topic extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('topic_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}
	public function topic_list() {
		$this->load->model('topic_model');
		$result = $this->topic_model->get_topic_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			$row[2] = '<a href="'.base_url('admin/topic/topic_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/topic/topic_edit/').$row[0].'" title="Topic Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function addtopic() {
		$this->load->view('common/admin-top');
		$this->load->view('topic/topicadd');
		$this->load->view('common/admin-bottom');
	}
	public function topiclist() {
		$this->load->view('common/admin-top');
		$this->load->view('topic/topiclist');
		$this->load->view('common/admin-bottom');
	}
	public function topic_edit($id="") {
		$ljp_data=$this->topic_model->topic_View($id);
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('topic/topicedit',$data);
		$this->load->view('common/admin-bottom');
	}
	public function topic_View($id="") {
		$ljp_data=$this->topic_model->topic_View($id);
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('topic/topicview',$data);
		$this->load->view('common/admin-bottom');
	}
	public function topic_save($data=" ") {
		$data=$this->input->post();
		$this->load->model('topic_model');
		$_data = array('status'=>1,'message'=>'');
		if (!empty($data)) {
			if(isset($_FILES['file_name']) && !empty($_FILES['file_name'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'topic'.DIRECTORY_SEPARATOR,
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
			if(!empty($data)){
			$_dataR = $this->topic_model->topic_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = 'Record already exits';
			} else if($_dataR==1){
				$_data['status'] = 1;
				$_data['msg'] = 'Record inserted  successfully';
			} else if($_dataR==3){
				$_data['status'] = 1;
				$_data['msg'] = 'Record updated successfully';
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
}