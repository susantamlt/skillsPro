<?php class Loginmodel extends CI_Model{

		public function sign_in($uname,$pass){


			$this->db->select("admin_id,username,admin_role");
			$this->db->from('dt_admin');

			$this->db->where('username',$uname);
			$this->db->where('password',md5($pass));
			$query=$this->db->get();
			if($query->num_rows()>0){
				$row=$query->row();
			//print_r($row);
				$admin_id=$row->admin_id;

				if($admin_id!=''){
					$this->session->set_userdata('admin_id',$admin_id);
					$this->session->set_userdata('username',$row->username);
					$this->session->set_userdata('admin_role',$row->admin_role);
					return 1;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
			

			
			


		}
}