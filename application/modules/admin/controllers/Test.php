<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->library('session');
		$this->load->library('upload');
		modules::run('login/login/is_admin_logged_in');
	}
	public function index() {
		$this->load->view('common/admin-top');
		$this->load->view('common/admin-bottom');
	}
	public function test_list( ) {
        $this->load->model('test_model');
		$result = $this->test_model->get_test_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= date('H:i',strtotime($row[3]));
			}
			if($row[4]!=''){
				$row[4]= date('jS M Y', strtotime($row[4]));
			}
			$row[5] = '<a href="'.base_url('admin/test/test_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/test/test_edit/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function addtest() {
		$this->load->model('test_model');
		$data['ljp_course']=$this->test_model->get_course();
		$this->load->view('common/admin-top');
		$this->load->view('onlinetest/testadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function test_edit($id="") {
		$this->load->model('test_model');
		$ljp_data=$this->test_model->get_data($id);
		$ljp_course=$this->test_model->get_course();
		$data['ljp_data']=$ljp_data;
		$data['ljp_course']=$ljp_course;
		$this->load->view('common/admin-top');
		$this->load->view('onlinetest/testedit',$data);
		$this->load->view('common/admin-bottom');
	}
	public function test_view($id="") {
		$this->load->model('test_model');
		$ljp_data=$this->test_model->get_data($id);
		$data['ljp_data']=$ljp_data;
		$this->load->view('common/admin-top');
		$this->load->view('onlinetest/testview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function testlist() {
		$this->load->view('common/admin-top');
		$this->load->view('onlinetest/testlist');
		$this->load->view('common/admin-bottom');
	}
	public function test_save( ) {
	   $this->load->model('test_model');
	   $data=$this->input->post();
	   if (!empty($data)) {
	   	$data['start_date'] = date('Y-m-d',strtotime($data['start_date']));
		$data['end_date'] = date('Y-m-d',strtotime($data['end_date']));
		$data['time_duration_hours'] = date('h:s',strtotime($data['time_duration_hours']));
	    $_dataR=$this->test_model->test_save($data);
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