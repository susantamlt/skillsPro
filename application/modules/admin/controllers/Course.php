<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('course_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}
	public function course_list( ) {
		$this->load->model('course_model');
		$result = $this->course_model->get_course_list();
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
				$row[4]= date('jS M Y', strtotime($row[4]));
			}
			$row[5] = '<a href="'.base_url('admin/course/course_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/course/course_edit/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function addcourse() {
		$data['ljp_topic'] = $this->course_model->get_ljp_topic();
		$this->load->view('common/admin-top');
		$this->load->view('course/courseadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function courselist() {
		$this->load->view('common/admin-top');
		$this->load->view('course/courselist');
		$this->load->view('common/admin-bottom');
	}
	public function course_view($id="") {
		$this->load->model('course_model');
		$ljp_data=$this->course_model->course_edit($id);
		$ljp_topic=$this->course_model->get_ljp_topic();
		$data['ljp_data']=$ljp_data;
		$data['ljp_topic']=$ljp_topic;
		$this->load->view('common/admin-top');
		$this->load->view('course/courseview',$data);
		$this->load->view('common/admin-bottom');
	}
	public function course_edit($id="") {
		$this->load->model('course_model');
		$ljp_data=$this->course_model->course_edit($id);
		$ljp_topic=$this->course_model->get_ljp_topic();
		$data['ljp_data']=$ljp_data;
		$data['ljp_topic']=$ljp_topic;
		$this->load->view('common/admin-top');
		$this->load->view('course/courseedit',$data);
		$this->load->view('common/admin-bottom');
	}
	public function course_save() {
		$data=$this->input->post();
		$this->load->model('course_model');
		if (!empty($data)) {
			$data['start_date'] = date('Y-m-d',strtotime($data['start_date']));
			$data['end_date'] = date('Y-m-d',strtotime($data['end_date']));
			$_dataR =$this->course_model->course_save($data);
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