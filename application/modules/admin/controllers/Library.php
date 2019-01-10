<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Library extends MX_Controller 
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
	public function addlibrary() {
		$this->load->model('library_model');
		$data['cdata']=$this->library_model->get_ljp_course();
		$data['pdata']=$this->library_model->get_ljp_topic();
		$this->load->view('common/admin-top');
		$this->load->view('library/libraryadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function librarylist() {
	    $this->load->view('common/admin-top');
		$this->load->view('library/librarylist');
		$this->load->view('common/admin-bottom');
	}
	public function library_list() {
		$this->load->model('library_model');
        $result = $this->library_model->get_library_list();
        $aaData= array();
        foreach ($result['aaData'] as $row) {
        	    if ($row[1]!='') {
        	    	  $row[1]=ucwords($row[1]);
        	    }
        	    if ($row[2]!='') {
        	    	  $row[2]=ucwords($row[2]);
        	    }
        	    if ($row[3]!='') {
        	    	  $row[3]=ucwords($row[3]);
        	    }
        	    if ($row[4]!='') {
        	    	  $row[4]=ucwords($row[4]);
        	    }
            $row[5] = '<a href="'.base_url('admin/library/library_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/library/library_edit/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	
	public function library_save() {
       $data=$this->input->post();
       $this->load->model('library_model');
	   $_data = array('status'=>1,'message'=>'');
		//print_r($data);exit();
		if (!empty($data)) {
			if(isset($_FILES['file_name']) && !empty($_FILES['file_name'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR,
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
			if ($_data['status'] > 0 ) {
				$result = $this->library_model->library_save($data);
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
		} else{
			$_data['status']=0;
			$_data['msg']='Failure';
		}
		echo json_encode($_data);
		}
}