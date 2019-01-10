<?php class Common extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/Commonmodel','common');
			//$this->load->library('output');
		}

		public function get_cities(){
			$state_code=$this->input->post('state_code');
			$data['city_list']=$this->common->get_city_list($state_code);
			$datalist=$this->load->view('admin/common/city_list',$data, TRUE);
			echo $datalist;
		}
}