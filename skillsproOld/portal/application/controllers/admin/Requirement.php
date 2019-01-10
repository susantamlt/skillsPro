<?php class Requirement extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/Requirementmodel','requirement');
		}

		public function index(){
			$data['requirement']=$this->requirement->list_requirement();
			$this->load->view('admin/header');
			$this->load->view('admin/list_requirement',$data);
			$this->load->view('admin/footer');
		}

		public function upload_resume_for_interview($requirement_id){

			$data['requirement']=$this->requirement->list_requirement();
			$this->load->view('admin/header');
			$this->load->view('admin/upload_resume',$data);
			$this->load->view('admin/footer');
			$this->load->view('phpjs/admin/requirement_js');
		}
}