<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('clients/list');
		$this->load->view('common/sales-bottom');
	}

	public function clients_list() {
		$this->load->model('clients_model');
		$result = $this->clients_model->get_clients_list();
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
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}	
			if($row[7]!=''){
				$row[7]= date('d/m/Y', strtotime($row[7]));
			}			
			$row[8] = '<a href="'.base_url('sales/clients/clients_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/clients/clients_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function clients_edit($id="") {
		$this->load->model('Clients_model');
		$ljp_data=$this->Clients_model->get_data_clientsview($id);
        $data['ljp_data']=$ljp_data;
		$this->load->view('common/sales-top');
		$this->load->view('clients/clients_edit',$data);
		$this->load->view('common/sales-bottom');
	}

	public function clients_view($id="") {
		$this->load->model('Clients_model');
		$data['clients']=$this->Clients_model->get_data_clientsview($id);
		$this->load->view('common/sales-top');
		$this->load->view('clients/clients_view',$data);
		$this->load->view('common/sales-bottom');
	}
	public function clients_save($data="") {
		$this->load->model('clients_model');
		$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->clients_model->clients_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = ' The data already exits';
			} else if($_dataR==1){
				$_data['status'] = 1;
				$_data['msg'] = 'The data successfully insert';
			} else if($_dataR==3){
				$_data['status'] = 1;
				$_data['msg'] = 'The data update Successfully';
			} else {
				$_data['status'] = 0;
				$_data['msg'] = 'Faillure';
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}
	public function clients_add() {
		$this->load->model('clients_model');
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');
		$this->load->view('common/sales-top');
		$this->load->view('clients/clients_add',$data);
		$this->load->view('common/sales-bottom');

	}

	public function clients_save_new($data="") {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('clients_model');
			$_data['client_id'] = $this->clients_model->client_save($data);
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}


}