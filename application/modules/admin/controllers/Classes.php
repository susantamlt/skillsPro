<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Classes extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('classes_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}
	public function addclass() {
		$ndata['topic_id']=0;
		$data['ljp_topic'] = $this->classes_model->get_ljp_topic();
		$data['ljp_course'] = $this->classes_model->get_course_name($ndata);
		$this->load->view('common/admin-top');
		$this->load->view('classes/addclass',$data);
		$this->load->view('common/admin-bottom');
	}
	public function classlist() {
		$this->load->view('common/admin-top');
		$this->load->view('classes/classlist');
		$this->load->view('common/admin-bottom');
	}
	public function class_list() {
		$this->load->model('classes_model');
        $result = $this->classes_model->get_class_list();
        $aaData= array();
        foreach ($result['aaData'] as $row) {
        	    if ($row[1]!='') {
        	    	  $row[1]=ucwords($row[1]);
        	    }
        	    if ($row[2]!='') {
        	    	  $row[2]=ucwords($row[2]);
        	    }
        	    if ($row[3]!='') {
        	    	  $row[3]=date('H:i',strtotime($row[3]));
        	    }
        	    if ($row[4]!='') {
        	    	  $row[4]=date('d-m-Y',strtotime($row[4]));
        	    }
            $row[5] = '<a href="'.base_url('admin/classes/class_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/classes/class_edit/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function class_save( ) {
		$data=$this->input->post();
		$this->load->model('classes_model');
		if (!empty($data)) {
			$data['start_date'] = date('Y-m-d',strtotime($data['start_date']));
			$data['end_date'] = date('Y-m-d',strtotime($data['end_date']));
			$data['start_time'] = date('H:i',strtotime($data['start_time']));
			$data['end_time'] = date('H:i',strtotime($data['end_time']));
			$result =$this->classes_model->class_save($data);
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

	public function get_course() {
		$data = $this->input->post();
		if(!empty($data)){
			$_data['status'] = 1;
			$_data['classes'] = $this->classes_model->get_course_name($data);
		} else {
			$_data['status'] = 0;
			$_data['classes'] = '';
		}
		echo json_encode($_data);
	}
}
