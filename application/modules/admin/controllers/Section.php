<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Section extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('section_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}

	public function section_list() {
		$this->load->model('section_model');
        $result = $this->section_model->get_section_list();
        $aaData= array();
        foreach ($result['aaData'] as $row) {
        	    if ($row[1]!='') {
        	    	  $row[1]=ucwords($row[1]);
        	    }
        	    if ($row[2]!='') {
        	    	  $row[2]=ucwords($row[2]);
        	    }
            $row[3] = '<a href="'.base_url('admin/section/section_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/section/section_edit/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function addsection() {
		$ndata['topic_id']=0;
		$data['ljp_topic'] = $this->section_model->get_ljp_topic();
		$data['ljp_course'] = $this->section_model->get_course_name($ndata);
		$this->load->view('common/admin-top');
		$this->load->view('section/sectionadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function sectionlist() {
		$this->load->view('common/admin-top');
		$this->load->view('section/sectionlist');
		$this->load->view('common/admin-bottom');
	}
	public function get_course() {
		$data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['section'] = $this->section_model->get_course_name($data);
		} else {
			$_data['status'] = 0;
			$_data['section'] = '';
		}
		echo json_encode($_data);
	}
	public function section_save( ) {
		$data=$this->input->post();
		$this->load->model('section_model');
		if (!empty($data)) {
			$result =$this->section_model->section_save($data);
			  if ($result==1) {
				$_data['status'] = 1;
			    $_data['msg'] = 'Successful';
			}else {
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