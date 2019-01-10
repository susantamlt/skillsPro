<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Questions extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('questions_model');
		modules::run('login/login/is_admin_logged_in');
	}
	public function question_list( ) {
		$this->load->model('questions_model');
		$result = $this->questions_model->get_question_list();
		$q_level=array('E'=>'Easy','M'=>'Medium','H'=>'Hard');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if ($row[3]!=''){
				$row[3]= ucwords($q_level[$row[3]]);
			}
			$row[4] = '<a href="'.base_url('admin/questions/question_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/questions/question_edit/').$row[0].'" title="Topic Edit" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
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
	public function question_edit($id="") {
		$this->load->model('questions_model');
		$ljp_questions = $this->questions_model->gat_course_name();
		$ljp_data=$this->questions_model->course_edit($id);
		$data['ljp_questions']=$ljp_questions;
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('questions/questionedit',$data);
		$this->load->view('common/admin-bottom');
	}
	public function question_view($id="") {
		$this->load->model('questions_model');
		//$ljp_questions = $this->questions_model->gat_course_name();
		$ljp_data=$this->questions_model->course_edit($id);
		//$data['ljp_questions']=$ljp_questions;
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('questions/questionview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function addquestions() {
		$this->load->model('questions_model');
		$data['ljp_questions'] = $this->questions_model->gat_course_name(); 
		$this->load->view('common/admin-top');
		$this->load->view('questions/questionadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function questionslist() {
		$this->load->view('common/admin-top');
		$this->load->view('questions/questionlist');
		$this->load->view('common/admin-bottom');
	}
	public function questions_save( ) {
	   $this->load->model('questions_model');
	   $data=$this->input->post();
	   if (!empty($data)) {
	       $_dataR=$this->questions_model->questions_save($data);
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