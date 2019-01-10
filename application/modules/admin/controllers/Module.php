<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Module extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('module_model');
		modules::run('login/login/is_admin_logged_in');
	}
	public function module_list() {
	$this->load->model('module_model');
        $result = $this->module_model->get_module_list();
        $active_status=array('Y'=>'Active','N'=>'In Active');
        $content_type=array('V'=>'Video','A'=>'Audio File','T'=>'Document File','S'=>'Social','W'=>'Website Link');
        $aaData= array();
        foreach ($result['aaData'] as $row) {
        	    if ($row[1]!='') {
        	    	  $row[1]=ucwords($row[1]);
        	    }
        	    if ($row[2]!='') {
        	    	  $row[2]=ucwords($row[2]);
        	    }
        	    if ($row[3]!='') {
        	    	  $row[3]=ucwords($content_type[$row[3]]);
        	    }
        	    if ($row[4]!='') {
        	    	  $row[4]=ucwords($active_status[$row[4]]);
        	    }
            $row[5] = '<a href="'.base_url('admin/module/module_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/module/module_edit/').$row[0].'" title="Module Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}
	public function addmodule() {
		$ndata['course_id']=0;
		$data['ljp_course'] = $this->module_model->get_ljp_course();
		$data['ljp_section'] = $this->module_model->get_section_name($ndata);
		$this->load->view('common/admin-top');
		$this->load->view('module/moduleadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function module_edit($id="") {
		$ljp_module = $this->module_model->module_edit($id);
		$data['ljp_course'] = $this->module_model->get_ljp_course();
		$data['ljp_section'] = $this->module_model->get_section_name($ljp_module[0]);		
		$data['ljp_module'] = $ljp_module;
		$this->load->view('common/admin-top');
		$this->load->view('module/moduleedit',$data);
		$this->load->view('common/admin-bottom');
	}
	public function module_view($id="") {
		$ljp_data = $this->module_model->module_edit($id);
		$data['ljp_data'] = $ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('module/moduleview',$data);
		$this->load->view('common/admin-bottom');
	}
	public function modulelist() {
		$this->load->view('common/admin-top');
		$this->load->view('module/modulelist');
		$this->load->view('common/admin-bottom');
	}
	public function get_section() {
		$data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['sectionData'] = $this->module_model->get_section_name($data);
		} else {
			$_data['status'] = 0;
			$_data['sectionData'] = '';
		}
		echo json_encode($_data);
	}
	public function module_save( ) {
		$data=$this->input->post();
		//print_r($data);exit();
		$this->load->model('module_model');
		if (!empty($data)) {
			if(isset($_FILES['content']) && !empty($_FILES['content'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR,
					'allowed_types' => "mp4|mp3|wav|avi|flv|wmv|pdf",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "204800000", // Can be set to particular file size , here it is 200 MB(2048 Kb)
				);
				$fname = $_FILES['content']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['content'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('content')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['content'] = 'users/'.'module/'.$redata['file_name'];
				}
			}
			if (isset($data['content']) && $data['content']=='undefined') {
				unset($data['content']);
			}
			$_dataR =$this->module_model->module_save($data);
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