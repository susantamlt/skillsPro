<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = 'contractors';
		$tableName1 = 'organization';
		$columns   = array(
			"$tableName.contractor_id",
			"$tableName.contractor_name",
			"$tableName.designation",
			"$tableName.address",
			"$tableName1.org_name",
			"$tableName.cons_date",
		);
		$indexId     = '$tableName.contractor_id';
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.org_id=$tableName.org_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function  get_ljp_constractorsview($id='') {
		$this->db->select('c.*,o.org_name');
		$this->db->from('contractors as c');
		$this->db->join('organization as o','o.org_id=c.org_id','left');
		$this->db->where('c.contractor_id',$id);
		$datas=$this->db->get()->result_array();
		return $datas;               
    }

    public function contractor_save($date='') {
    	$user_id = $this->session->userdata('sales_user_id');
    	$this->db->select('contractor_id');
    	$this->db->from('contractors');
    	$this->db->where('contractor_name',$date['contractor_name']);
    	$this->db->where('contractor_id',$date['contractor_id']);
    	$this->db->where('user_id',$user_id);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) || $datas[0]['contractor_id'] == $date['contractor_id']){
			if(isset($date['contractor_id']) && $date['contractor_id']!=''){
				$id = $date['contractor_id'];
				unset($date['contractor_id']);
				$this->db->where('contractor_id',$id);
				$this->db->update('contractors', $date);
			} else { 
				$this->db->insert('contractors',$date);
				$id = $this->db->insert_id();
			}
		} else {
			$id = $datas[0]['contractor_id'];
		}
		return $id;
	}

	public function contractors_save($date='') {
		$user_id = $this->session->userdata('sales_user_id');
		$this->db->select('contractor_id');
		$this->db->from('contractors');
		$this->db->where('org_id',$date['org_id']);
		//$this->db->where('user_id',$date['user_id']);
		$this->db->where('contractor_name',$date['contractor_name']);
		$this->db->where('user_id',$user_id);
		//$this->db->where('cons_date',$date['cons_date']);
		$datas = $this->db->get()->result_array();

		if(empty($datas)){
			$this->db->insert('contractors',$date);
			$id = $this->db->insert_id();
		} else {
			$id = $datas[0]['contractor_id'];
		}
		return $id;
	}




    }


