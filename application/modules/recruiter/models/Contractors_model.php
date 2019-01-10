<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$tableName = 'contractors';
		$tableName1 = 'organization';
		$columns   = array(
			"$tableName.contractor_id",
			"$tableName.contractor_name",
			"$tableName.designation",
			"$tableName.mobile",
			"$tableName1.org_name",
			"$tableName.current_status",
			"$tableName.cons_date",
		);
		$indexId     = "$tableName.contractor_id";
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
    public function contractors_intreviewView($id='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->where('org_id',$org_id);
		$this->db->where('user_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
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
	public function get_prospect_title($data='') {
		$org_id = $this->session->userdata('recruiter_org_id');
        $this->db->select('p.prospect_title,r.requirement_id');
        $this->db->from('requirement as r');
        $this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
        $this->db->where('r.org_id',$org_id);
        $this->db->where('r.client_id',$data['client_id']);
        $datas=$this->db->get()->result_array();
        $dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['requirement_id']] = $_data['prospect_title'];
		endforeach;
		return $dataState;  
	}

	public function contractors_save($date='') {
		$id = 0;
		if(!isset($date['requirement_id']) || $date['requirement_id'] < 1){
			$id = 1;
		}
		if(!isset($date['org_id']) || $date['org_id'] < 1){
			$id = 2;
		}
		if(!isset($date['contractor_id']) || $date['contractor_id'] < 1){
			$id = 3;
		}
		if($id==0){
			$this->db->select('pc_id,contractor_id');
			$this->db->from('requirement_contractor');
			$this->db->where('requirement_id',$date['requirement_id']);
			$this->db->where('org_id',$date['org_id']);
			$this->db->where('contractor_id',$date['contractor_id']);
			$datas = $this->db->get()->result_array();
			if(empty($datas) || ($date['contractor_id']==$datas[0]['contractor_id'])){
				if(isset($date['contractor_id']) && $date['contractor_id']!='' && isset($datas[0]['contractor_id'])){
					$_id = $datas[0]['pc_id'];
					unset($date['user_id']);
					$this->db->where('pc_id',$_id);
					$this->db->update('requirement_contractor',$date);
					$id=5;
				} else {
					$this->db->insert('requirement_contractor',$date);
					$id=0;
				}
			} else {
				$id = 4;
			}
		}
		return $id;
	}
	public function contractor_save($date='') {
    	$id=0;
    	$this->db->select('contractor_id');
    	$this->db->from('contractors');
    	$this->db->where('email_id',$date['email_id']);
    	$this->db->where('mobile',$date['mobile']);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) ||(isset($date['contractor_id']) && $datas[0]['contractor_id'] == $date['contractor_id'])){
			if(isset($date['contractor_id']) && $date['contractor_id']!=''){
				$id=3;
				$_id = $date['contractor_id'];
				unset($date['contractor_id']);
				$this->db->where('contractor_id',$_id);
				$this->db->update('contractors', $date);
			} else { 
				$this->db->insert('contractors',$date);
				$id=1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}
	public function get_client($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('client_id,contact_name,email_1');
		$this->db->from('clients');
		$this->db->where('org_id',$org_id);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['client_id']] = $_data['contact_name'].' --- '.$_data['email_1'];
		endforeach;
		return $dataState;
	}
	public function requirements_assaignView($id='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('*');
		$this->db->from('requirement_source');
		$this->db->where('org_id',$org_id);
		$this->db->where('requirement_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function get_ljp_historyView($id='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$tableName = 'requirement_contractor';
		$tableName1 = 'requirement';
		$tableName2 = 'prospect';
		$columns   = array(
			"$tableName.pc_id",
			"$tableName2.prospect_title",
			"$tableName.interview_date",
			"$tableName.interview_time",
			"$tableName.pc_status",
		);
		$indexId     = "$tableName.pc_id";
		$columnOrder = "$tableName.pc_id";
		$orderby     = "";
		$joinMe      = "inner join $tableName1 on $tableName1.requirement_id=$tableName.requirement_id inner join $tableName2 on $tableName2.prospect_id=$tableName1.prospect_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.contractor_id='".$id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	 public function shortlist_save($data='') {
   	    $id=0;
		$this->db->select('pc_id');
		$this->db->from('requirement_contractor');
		$this->db->where('contractor_id',$data['contractor_id']);
	    $datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('requirement_contractor',$data);
			$id = 1;
		} else {
			$id = 2;
		}
		return $id;
	}
}