<?php class Requirements_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_requirements_list($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$tableName = 'requirement_source';
		$tableName1 = 'requirement';
		$tableName2 = 'requirement_details';
		$tableName5 = 'users';
		$tableName6 = 'prospect';
		$columns   = array(
			"$tableName1.requirement_id",
			"$tableName1.requirement_title",
			"$tableName2.no_of_requirement",
			"$tableName1.no_requirement_fullfilled",
			"$tableName2.proposed_hourly_rate",
			"$tableName2.final_hourly_rate",
			"$tableName5.user_name",
			"$tableName1.requirement_status",			
			"$tableName1.expected_date_of_closure",
		);
		$indexId     = "$tableName1.requirement_id";
		$columnOrder = "$tableName1.requirement_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.requirement_id=$tableName.requirement_id left join $tableName2 on $tableName2.requirement_id=$tableName.requirement_id left join $tableName5 on $tableName5.user_id=$tableName1.user_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.source_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_requirements_craigslist($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$tableName = 'dt_job_detailsResume';
		$sql = "WHERE $tableName.jobname!=''";
		if(isset($date['keywordsc']) && isset($date['keywordsc'])!=''){
			$sql = "WHERE $tableName.jobname LIKE '%".$date['keywordsc']."%'";
		} else {
			$sql = "WHERE $tableName.jobname!=''";
		}		
		if(isset($date['locationc']) && isset($date['locationc'])!=''){
			$scity = explode(',', $date['locationc']);
			$sql = $sql." AND $tableName.city LIKE '%".$scity[0]."%'";
			if(isset($scity[1]) && $scity[1]!=''){
				$sql = $sql." AND $tableName.state_code ='".$scity[1]."'";
			}
		} 
		$columns   = array(
			"$tableName.jd_id",
			"$tableName.name",
			"$tableName.post_id",
			"$tableName.jobname",
		);
		$indexId     = "$tableName.jd_id";
		$columnOrder = "$tableName.jd_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "$sql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function requirements_view($id) {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$this->db->select('rs.*,r.no_requirement_fullfilled,r.expected_date_of_closure,r.requirement_status,rd.no_of_requirement,rd.proposed_hourly_rate,rd.requirement,rd.final_hourly_rate,rd.final_comments_on_requirement,u.user_name,pt.prospect_type,st.state,st.state_code,st.country_code,cn.country_name,r.requirement_title,r.prospect_id,ct.city_name');
		$this->db->from('requirement_source as rs');
		$this->db->join('requirement as r','r.requirement_id=rs.requirement_id','left');
		$this->db->join('requirement_details as rd','rd.requirement_id=rs.requirement_id','left');
		$this->db->join('users as u','u.user_id=r.user_id','left');
		$this->db->join('prospect_type as pt','pt.prospect_type_id=r.prospect_type_id','left');
		$this->db->join('country as cn','cn.country_code=r.country_code','left');
		$this->db->join('states as st','st.state_code=r.state_code','left');
		$this->db->join('dt_us_city as ct','ct.city_id=r.city_id','left');
		$this->db->where('rs.requirement_id',$id);
		$this->db->where('rs.org_id',$org_id);
		$this->db->where('rs.source_id',$user_id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function requirements_assigns($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$user_id = $this->session->userdata('recruiter_user_id');
		$tableName = 'contractors';
		$tableName1 = 'requirement';
		$tableName2 = 'requirement_contractor';
		$tableName3 = 'organization';
		$tableName4 = 'users';
		$tableName5 = 'prospect';
		$tableName6 = 'requirement_details';
		$columns   = array(
			"$tableName1.requirement_id",
			"$tableName1.requirement_status",
			"$tableName6.requirement",
			"$tableName.contractor_name",
			"$tableName.cons_date"
		);
		$indexId     = "$tableName.contractor_id";
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "left join $tableName2 on $tableName2.contractor_id=$tableName.contractor_id left join $tableName1 on $tableName1.	requirement_id=$tableName2.requirement_id left join $tableName6 on $tableName6.	requirement_id=$tableName1.requirement_id";
		$condition   = "WHERE $tableName1.org_id='".$org_id."' AND $tableName1.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
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
	public function requirements_save($date='') {
		$rdate = array('org_id'=>$date['org_id'],'user_id'=>$date['user_id'],'no_requirement_fullfilled'=>$date['no_requirement_fullfilled'],'expected_date_of_closure'=>$date['expected_date_of_closure'],'requirement_status'=>$date['requirement_status']);
		$rddate = array('requirement'=>$date['requirement'],'no_of_requirement'=>$date['no_of_requirement'],'proposed_hourly_rate'=>$date['proposed_hourly_rate'],'final_hourly_rate'=>$date['final_hourly_rate'],'final_comments_on_requirement'=>$date['final_comments_on_requirement']);
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->update('requirement',$rdate);
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->update('requirement_details',$rddate);
		return 1;
	}
	/*public function requirements_assaign($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('user_id,user_name,email');
		$this->db->from('users');
		$this->db->where('org_id',$org_id);
		$this->db->where('type',2);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['user_id']] = $_data['user_name'].' - '.$_data['email'];
		endforeach;
		return $dataState;
	}*/
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
	public function requirements_assaign($date='') {
		$org_id = $this->session->userdata('recruiter_org_id');
		$this->db->select('user_id,user_name,email');
		$this->db->from('users');
		$this->db->where('org_id',$org_id);
		$this->db->where('type','2');
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['user_id']] = $_data['user_name'].' - '.$_data['email'];
		endforeach;
		return $dataState;
	}
	public function requirements_details($id) {
		$this->db->select('r.*');
		$this->db->from('requirement as r');
		$this->db->where('r.requirement_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function contracter_save_data($date='') {
		$this->db->select('contractor_id');
		$this->db->from('contractors');
		$this->db->where('resumekey',$date['resumekey']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('contractors',$date);
			return $this->db->insert_id();
		} else {
			$this->db->where('contractor_id',$datas[0]['contractor_id']);
			$this->db->update('contractors', $date);
			return $datas[0]['contractor_id'];
		}
	}

	public function contracter_save_requirement($date='') {
		$this->db->select('pc_id');
		$this->db->from('requirement_contractor');
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('contractor_id',$date['contractor_id']);
		$this->db->where('requirement_id',$date['requirement_id']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('requirement_contractor',$date);
			return 1;
		} else {
			return 2;
		}
	}

	public function get_requirements_craigslist_Details($id=''){
		$this->db->select('*');
		$this->db->from('dt_job_detailsResume');
		$this->db->where('jd_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}