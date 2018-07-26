<?php class Country_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function statelist($date='') {
		$this->db->select('state_code,state');
		$this->db->from('states');
		$this->db->where('country_code',$date['country_code']);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['state_code']] = $_data['state'];
		endforeach;
		return $dataState;
	}

	public function citylist($date='') {
		$this->db->select('city_id,city');
		$this->db->from('cities');
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('city','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['city_id']] = $_data['city'];
		endforeach;
		return $dataCity;
	}

	public function ziplist($date='') {
		$this->db->select('city_id,zip,state_code,county');
		$this->db->from('cities_extended');
		$this->db->where('city',$date['city']);
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('zip','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['zip']] = $_data['zip'];
		endforeach;
		return $dataCity;
	}

	public function gatstatecity($date='') {
		$text = str_replace("https://", '', $date['url']);
		$chity = explode('.', $text);
		$this->db->select('s.state_code,s.country_code,c.city_id');
		$this->db->from('states as s');
		$this->db->join('cities as c','c.state_code=s.state_code');
		if($date['state']!='' && $date['city']!=''){
			$this->db->where('s.state_code',$date['state']);
			$this->db->where('c.city',ucfirst($chity[0]));
		} else {
			$this->db->where('c.city',$chity[0]);
			$this->db->or_where('s.state_code',$date['state']);
		}
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			return $datas[0];
		} else {
			if($date['state']!='' && $date['city']!=''){
				$sahc = array('city'=>ucfirst($chity[0]),'state_code'=>$date['state']);
				$this->db->insert('cities', $sahc);

				$this->db->select('s.state_code,s.country_code,c.city_id');
				$this->db->from('states as s');
				$this->db->join('cities as c','c.state_code=s.state_code');
				$this->db->where('s.state_code',$date['state']);
				$this->db->where('c.city',ucfirst($chity[0]));
				$_datas = $this->db->get()->result_array();
				if(!empty($_datas)){
					return $_datas[0];
				} else {
					return array('state_code'=>'','country_code'=>'US','city_id'=>'');
				}
			} else {
				return array('state_code'=>'','country_code'=>'US','city_id'=>'');
			}
		}
	}

	public function saveStateCity($date='') {
		//print_r($date);exit();
		$this->db->select('sc.state_city_id');
		$this->db->from('dt_state_city as sc');
		$this->db->where('sc.state_code',$date['state_code']);
		$this->db->where('sc.city',$date['city']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('dt_state_city', $date);
		}
		return 1;
	}
}