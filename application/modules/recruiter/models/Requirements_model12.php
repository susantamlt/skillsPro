<?php class Requirements_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_requirements_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = 'requirement';
		$tableName1 = 'requirement_details';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'prospect';
		$columns   = array(
			"$tableName.requirement_id",
			"$tableName4.prospect_title",
			"$tableName2.contact_name",
			"$tableName1.no_of_requirement",
			"$tableName.no_requirement_fullfilled",
			"$tableName1.proposed_hourly_rate",
			"$tableName1.final_hourly_rate",
			"$tableName1.final_comments_on_requirement",
			"$tableName.requirement_status",
			"$tableName.expected_date_of_closure",
		);
		$indexId     = '$tableName.requirement_id';
		$columnOrder = "$tableName.requirement_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.requirement_id=$tableName.requirement_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.prospect_id=$tableName.prospect_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function requirements_view($id) {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$this->db->select('r.*,p.prospect_title,c.contact_name,rd.*');
		$this->db->from('requirement as r');
		$this->db->join('requirement_details as rd','rd.requirement_id=r.requirement_id','left');
		$this->db->join('clients as c','c.client_id=r.client_id','left');
		$this->db->join('organization as o','o.org_id=r.org_id','left');
		$this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
		$this->db->where('r.requirement_id',$id);
		$this->db->where('r.org_id',$org_id);
		$this->db->where('r.user_id',$user_id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
	public function requirements_save($date='') {
		$rdate = array('org_id'=>$date['org_id'],'user_id'=>$date['user_id'],'no_requirement_fullfilled'=>$date['no_requirement_fullfilled'],'expected_date_of_closure'=>$date['expected_date_of_closure'],'requirement_status'=>$date['requirement_status']);
		$rddate = array('requirement'=>$date['requirement'],'no_of_requirement'=>$date['no_of_requirement'],'proposed_hourly_rate'=>$date['proposed_hourly_rate'],'final_hourly_rate'=>$date['final_hourly_rate'],'final_comments_on_requirement'=>$date['final_comments_on_requirement']);
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->update('requirement',$rdate);
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->update('requirement_details',$rddate);
		return 1;
	}

	public function requirements_assaign($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$this->db->select('user_id,user_name,email');
		$this->db->from('users');
		$this->db->where('org_id',$org_id);
		$this->db->where('type',3);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['user_id']] = $_data['user_name'].' - '.$_data['email'];
		endforeach;
		return $dataState;
	}

	public function source_save($date='') {
		$id = 0;
		if(!isset($date['source_id']) || $date['source_id'] < 1){
			$id = 1;
		}
		if(!isset($date['org_id']) || $date['org_id'] < 1){
			$id = 2;
		}
		if(!isset($date['requirement_id']) || $date['requirement_id'] < 1){
			$id = 3;
		}
		if($id==0){
			$this->db->select('requirement_id');
			$this->db->from('requirement_source');
			$this->db->where('requirement_id',$date['requirement_id']);
			$this->db->where('org_id',$date['org_id']);
			$this->db->where('source_id',$date['source_id']);
			$datas = $this->db->get()->result_array();
			if(empty($datas)){
				$this->db->insert('requirement_source',$date);
				$id=0;
			} else {
				$id = 4;
			}
		}
		return $id;
	}
}