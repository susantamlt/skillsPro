<?php class Clients_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_clients_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = 'clients';
		$tableName1 = 'users';
		$tableName2 = 'organization';
		$columns   = array(
			"$tableName.client_id",
			"$tableName.contact_name",
			"$tableName.decision_maker_name",
			"$tableName.phone_1",
			"$tableName.email_1",
			"$tableName.phone_2",
			"$tableName.email_2",
			"$tableName.created_at",
		);
		$indexId     = '$tableName.client_id';
		$columnOrder = "$tableName.client_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.user_id=$tableName.user_id left join $tableName2 on $tableName2.org_id=$tableName.org_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_data_clientsview($id='') {
		$this->db->select('c.*');
		$this->db->from('clients as c');
		$this->db->WHERE('c.client_id',$id);
	    $datas=$this->db->get()->result_array();
		return $datas; 
	}
	public function clients_save($data='') {
		$this->load->model('Clients_model');
		$id=0;
    	$this->db->select('client_id');
    	$this->db->from('clients');
    	$this->db->where('phone_1',$data['phone_1']);
    	$this->db->where('email_1',$data['email_1']);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) ||(isset($data['client_id']) && $datas[0]['client_id'] == $data['client_id'])){
			if(isset($data['client_id']) && $data['client_id']!=''){
				$id=3;
				$_id = $data['client_id'];
				unset($data['client_id']);
				$this->db->where('client_id',$_id);
				$this->db->update('clients', $data);
			} else { 
				$this->db->insert('clients',$data);
				$id = 1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}

	
}