<?php class Commonmodel extends CI_Model{

	
	//Get All the states
	public function get_states($country_id=''){
		if($country_id==''){
				$query=$this->db->get('states');

			}
		return $query->result();
	}

	public function get_city_list($state_code){
		$this->db->select('city_id,city');
		$this->db->from('cities');
		$this->db->where('state_code',$state_code);

		$query=$this->db->get();

		return $query->result();
	}

	public function get_prospect_type(){
		$query=$this->db->get('dt_prospect_type');
		return $query->result();
	}

	public function get_clients(){
		$query=$this->db->get('dt_clients');
		return $query->result();
	}

	public function save_client($data){
				$this->db->insert('dt_clients',$data);
				return $this->db->insert_id();
	}


}