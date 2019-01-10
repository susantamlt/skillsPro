<?php class Prospect extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/Prospectmodel','prospect');
			$this->load->model('admin/Commonmodel','common');
		}

		public function add_prospect(){
			$data['state_list']=$this->common->get_states();
			$data['prospect_type_list']=$this->common->get_prospect_type();
			$data['client_list']=$this->common->get_clients();
			$this->load->view('admin/header');
			$this->load->view('admin/add_prospect',$data);

			$this->load->view('admin/footer');
			$this->load->view('phpjs/admin/prospect_js');
			$this->load->view('phpjs/admin/common_js');

		}

		public function save_prospect(){
			$data['prospect_title']=html_escape($this->input->post('prospect_title'));
			$data['prospect_source']=html_escape($this->input->post('prospect_source'));
			$data['prospect_type_id']=html_escape($this->input->post('prospect_type_id'));
			$data['no_of_prospect']=html_escape($this->input->post('no_of_prospect'));
			$data['prospect_source']=html_escape($this->input->post('prospect_source'));
			$data['prospect_description']=html_escape($this->input->post('prospect_description'));
			$data['prospect_email_1']=html_escape($this->input->post('prospect_email_1'));
			$data['prospect_email_2']=html_escape($this->input->post('prospect_email_2'));
			$data['prospect_phone_1']=html_escape($this->input->post('prospect_phone_1'));
			$data['prospect_phone_2']=html_escape($this->input->post('prospect_phone_2'));
			$data['prospect_address']=html_escape($this->input->post('prospect_address'));
			$client_type=$this->input->post('client_type');
			
			if($client_type==1)
			{
				$data_client['client_name']=$this->input->post('client_name');
				$data_client['decision_maker_name']=$this->input->post('contact_person');
				$data_client['email_1']=html_escape($this->input->post('prospect_email_1'));
				$data_client['email_2']=html_escape($this->input->post('prospect_email_2'));
				$data_client['phone_1']=html_escape($this->input->post('prospect_phone_1'));
				$data_client['phone_2']=html_escape($this->input->post('prospect_phone_2'));

				$client_id=$this->common->save_client($data_client);
				$data['client_id']=$client_id;

			}else{
				$data['client_id']=$this->input->post('client_id');
			}
			$data['prospect_other_info']=html_escape($this->input->post('prospect_other_info'));
			$data['state_code']=html_escape($this->input->post('state_code'));
			$data['city_id']=html_escape($this->input->post('city_id'));
			$data['address']=html_escape($this->input->post('address'));
			$data['date_of_prospect']=date('Y-m-d');
			$result=$this->prospect->save_prospect_db($data);

			$ret_arr=array('result'=>$result);
			echo json_encode($ret_arr);
		}

		public function list_prospect(){
			$data['prospect']=$this->prospect->list_prospect();
			$this->load->view('admin/header');
			$this->load->view('admin/list_prospect',$data);
			$this->load->view('admin/footer');
		}

		public function prospect_details($prospect_id){
			$data['prospect']=$this->prospect->get_prospect_details($prospect_id);
			$this->load->view('admin/header');
			$this->load->view('admin/view_prospect',$data);
			$this->load->view('admin/footer');
			$this->load->view('phpjs/admin/prospect_js');

		}

		public function send_contract(){
			$prospect_id=$this->input->post('prospect_id');
			$send=$this->input->post('send');

			$this->prospect->save_send_contract($prospect_id,$send);
		}

		public function receive_contract(){
			$prospect_id=$this->input->post('prospect_id');
			$received=$this->input->post('received');
			$this->prospect->save_receive_contract($prospect_id,$received);
		}


}