<?php class Requirementmodel extends CI_Model{

		function list_requirement(){
			$this->db->select('a.*,b.client_name,c.prospect_type,d.state,e.city,f.no_requirement_fullfilled,f.requirement_id');
			$this->db->from('dt_prospect a');
			$this->db->join('dt_clients b','b.client_id=a.client_id');
			$this->db->join('dt_prospect_type c','c.prospect_type_id=a.prospect_type_id');
			$this->db->join('states d','d.state_code=a.state_code');
			$this->db->join('cities e','e.city_id=a.city_id');
			$this->db->join('dt_requirement f','f.prospect_id=a.prospect_id');
			$this->db->order_by('requirement_id','DESC');
			$query=$this->db->get();
			return $query->result();

		}	
}