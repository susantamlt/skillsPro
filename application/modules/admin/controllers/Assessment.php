<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Assessment extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		modules::run('login/login/is_admin_logged_in');
 }	
    public function addassessment() {
    	$data['question_type']=0;
	    $this->load->model('assessment_model');
	    $data['ljp_question']= $this->assessment_model->get_question($data);
	 	$this->load->view('common/admin-top');
	 	$this->load->view('assessment/assessmentadd',$data);
	 	$this->load->view('common/admin-bottom');
    }
    public function get_question( )  {
    	 $this->load->model('assessment_model');
    	 $data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['sectionData'] = $this->assessment_model->get_question($data);
		} else {
			$_data['status'] = 0;
			$_data['sectionData'] = '';
		}
		echo json_encode($_data);
	}
  
}