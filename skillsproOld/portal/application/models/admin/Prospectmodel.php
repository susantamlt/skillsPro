<?php class Prospectmodel extends CI_Model{

		function save_prospect_db($data){
				$this->db->insert('dt_prospect',$data);
				return 1;
		}

		function list_prospect(){
			$this->db->select('a.*,b.client_name,c.prospect_type,d.state,e.city');
			$this->db->from('dt_prospect a');
			$this->db->join('dt_clients b','b.client_id=a.client_id');
			$this->db->join('dt_prospect_type c','c.prospect_type_id=a.prospect_type_id');
			$this->db->join('states d','d.state_code=a.state_code');
			$this->db->join('cities e','e.city_id=a.city_id');
			$this->db->order_by('prospect_id','DESC');
			$query=$this->db->get();
			return $query->result();

		}	

		function get_prospect_type(){
			$query=$this->db->get('dt_prospect_type');
			return $query->result();
		}

		function get_prospect_details($prospect_id){
			$this->db->select('a.*,b.client_name,b.decision_maker_name,c.prospect_type,d.state,e.city,f.username');
			$this->db->from('dt_prospect a');
			$this->db->join('dt_clients b','b.client_id=a.client_id');
			$this->db->join('dt_prospect_type c','c.prospect_type_id=a.prospect_type_id');
			$this->db->join('states d','d.state_code=a.state_code');
			$this->db->join('cities e','e.city_id=a.city_id');
			$this->db->join('dt_admin f','f.admin_id=a.admin_id');
			$this->db->where('a.prospect_id',$prospect_id);
			$query=$this->db->get();
			return $query->row();

		}

		function save_send_contract($prospect_id,$send){
			$this->db->where('prospect_id',$prospect_id);
			$this->db->update('dt_prospect',array('is_contract_send'=>$send));
			
		}
		function save_receive_contract($prospect_id,$received){
			$this->db->where('prospect_id',$prospect_id);
			$this->db->update('dt_prospect',array('is_contract_recived'=>$received));

			if($this->get_requirements_by_prospect($prospect_id)!=1 && $received=='Y'){
				$data['prospect_id']=$prospect_id;
				$data['no_requirement_fullfilled']=0;
				$data['requirement_status']='VA';
				$this->db->insert('dt_requirement',$data);
			}

			
		}

		function get_requirements_by_prospect($prospect_id){
			$query=$this->db->get_where('dt_requirement',array('prospect_id'=>$prospect_id));
			if($query->num_rows()>0){
				return 1;
			}else{
				return 0;
			}

		}
		
}