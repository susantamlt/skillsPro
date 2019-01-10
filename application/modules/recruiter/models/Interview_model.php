<?php class Interview_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_interview_list($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$tableName = 'requirement_contractor';
		$tableName1 = 'contractors';
		$columns   = array(
			"$tableName.pc_id",
			"$tableName1.contractor_name",
			"$tableName.pc_status",
			"$tableName.interview_date",
			"$tableName.interview_time",
		);
		$indexId     = "$tableName.pc_id";
		$columnOrder = "$tableName.pc_id";
		$orderby     = "";
		$joinMe      = "inner join $tableName1 on $tableName1.contractor_id=$tableName.contractor_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function get_client_name($data='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('client_id,contact_name');
		$this->db->from('clients');
		$this->db->where('org_id',$org_id);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['client_id']] = $_data['contact_name'];
		endforeach;
		return $dataState;
	}
	 public function get_details($id='') {
		$this->db->select('*');
		$this->db->from('requirement_contractor');
		$this->db->where('requirement_contractor.pc_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
	public function contractors_save($data='') {
		$id=0;
			$this->db->select('pc_id');
			$this->db->from('requirement_contractor');
			$this->db->where('pc_id',$data['pc_id']);
			$this->db->where('contractor_id',$data['contractor_id']);
			$datas = $this->db->get()->result_array();
			//print_r($datas);exit();
			if(($data['pc_id']==$datas[0]['pc_id']) || ($data['contractor_id']==$datas[0]['contractor_id'])){
					$_id = $datas[0]['pc_id'];
					$this->db->where('pc_id',$_id);
					$this->db->update('requirement_contractor',$data);
					$id=1;
				} 
				else {
				   $id = 2;
			   }
		return $id;
	}
}