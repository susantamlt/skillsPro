<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('clients_org_id');
		$clients_id = $this->session->userdata('client_c_id');
		$tableName = 'requirement_contractor';
		$tableName1 = 'contractors';
		$tableName2 = 'requirement';
		$tableName3 = 'prospect';
		$columns   = array(
			"$tableName.contractor_id",
			"$tableName1.contractor_name",
			"$tableName3.prospect_title",
			"$tableName1.cons_date",
		);
		$indexId     = "$tableName.contractor_id";
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "inner join $tableName1 on $tableName1.contractor_id=$tableName.contractor_id inner join $tableName2 on $tableName2.requirement_id=$tableName.requirement_id inner join $tableName3 on $tableName3.prospect_id=$tableName2.prospect_id";
		$condition   = "WHERE $tableName2.client_id='".$clients_id."' AND $tableName2.org_id='".$org_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_contractors_timesheet_list($date='') {
		$org_id = $this->session->userdata('clients_org_id');
		$requirement_id = $this->session->userdata('requirement_id');
		$contractor_id = $this->session->userdata('contractor_id');
		$tableName = 'contractors_timesheet';
		$columns   = array(
			"$tableName.cts_id",
			"$tableName.requirement_id",
			"$tableName.date",
			"$tableName.hours",
		);
		$indexId     = '$tableName.cts_id';
		$columnOrder = "$tableName.cts_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "WHERE $tableName.contractor_id='".$contractor_id."' AND $tableName.org_id='".$org_id."' AND $tableName.requirement_id='".$requirement_id."' AND $tableName.date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function contractors_timesheet_save($date='') {
		$this->db->select('cts_id');
		$this->db->from('contractors_timesheet');
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->where('contractor_id',$date['contractor_id']);
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('date',$date['date']);
		$datas = $this->db->get()->result_array();
		if(empty($datas) || $datas[0]['cts_id']==$date['cts_id']){
			if(isset($date['cts_id']) && $date['cts_id']!=''){
				$id = $date['cts_id'];
				unset($date['cts_id']);
				$this->db->where('cts_id',$id);
				$this->db->update('contractors_timesheet', $date);
			} else { 
				$this->db->insert('contractors_timesheet',$date);
				$id = 1;
			}
		} else {
			$id = 0;
		}
		return $id;
	}
	public function contractors_view($id='') {
		$org_id = $this->session->userdata('clients_org_id');
		$clients_id = $this->session->userdata('client_c_id');
		$this->db->select('c.*,p.prospect_title,p.prospect_source,p.prospect_email_1,p.prospect_email_2,p.prospect_phone_1,p.prospect_phone_2,r.expected_date_of_closure,r.no_requirement_fullfilled,rc.interview_date,rc.interview_time,p.prospect_phone_3,rc.requirement_id');
		$this->db->from('contractors as c');
		$this->db->join('requirement_contractor as rc','rc.contractor_id=c.contractor_id','left');
		$this->db->join('requirement as r','r.org_id=c.org_id','left');
		$this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
		$this->db->where('c.contractor_id',$id);
		$this->db->where('c.org_id',$org_id);
	    $this->db->where('r.client_id',$clients_id);
		$datas = $this->db->get()->result_array();
		return $datas;		
    }

    public function contractors_alllist($date=''){
		$orgId = $this->session->userdata('clients_org_id');
		$clientsId = $this->session->userdata('client_c_id');

    	if(!empty($date)){
			$this->db->select('r.requirement_id,p.prospect_title,rc.contractor_id,c.contractor_name,r.org_id');
			$this->db->from('requirement as r');
			$this->db->join('requirement_contractor as rc','rc.requirement_id=r.requirement_id','left');
			$this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
			$this->db->join('contractors as c','c.contractor_id=rc.contractor_id','left');
			$this->db->where('r.org_id',$orgId);
			$this->db->where('r.client_id',$clientsId);
			$datas = $this->db->get()->result_array();
			if(!empty($datas)){
				foreach ($datas as $dk => $dv) {
					$this->db->select('ct.*');
					$this->db->from('contractors_timesheet as ct');
					$this->db->where('ct.org_id',$orgId);
					$this->db->where('ct.requirement_id',$dv['requirement_id']);
					$this->db->where('ct.contractor_id',$dv['contractor_id']);
					$this->db->where('ct.date >=',$date['from']);
					$this->db->where('ct.date <=',$date['to']);
					$datas[$dk]['timesheet'] = $this->db->get()->result_array();
				}
			}
    	} else {
    		$this->db->select('r.requirement_id,p.prospect_title,rc.contractor_id,c.contractor_name,r.org_id');
			$this->db->from('requirement as r');
			$this->db->join('requirement_contractor as rc','rc.requirement_id=r.requirement_id','left');
			$this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
			$this->db->join('contractors as c','c.contractor_id=rc.contractor_id','left');
			$this->db->where('r.org_id',$orgId);
			$this->db->where('r.client_id',$clientsId);
			$datas = $this->db->get()->result_array();
			if(!empty($datas)){
				if(date('D', strtotime(date('Y-m-d')))=='Sun'){
					$to = date('Y-m-d', strtotime("This Sunday"));
				} else {
					$to = date('Y-m-d', strtotime("Next Sunday"));
				}
				if(date('D', strtotime(date('Y-m-d')))=='Mon'){
					$from = date('Y-m-d', strtotime("This Monday"));
				} else {
					$from = date('Y-m-d', strtotime("Last Monday"));
				}
				foreach ($datas as $dk => $dv) {
					$this->db->select('ct.*');
					$this->db->from('contractors_timesheet as ct');
					$this->db->where('ct.org_id',$orgId);
					$this->db->where('ct.requirement_id',$dv['requirement_id']);
					$this->db->where('ct.contractor_id',$dv['contractor_id']);
					$this->db->where('ct.date >=',$from);
					$this->db->where('ct.date <=',$to);
					$datas[$dk]['timesheet'] = $this->db->get()->result_array();
				}
			}
    	}
    	return $datas;
    }

    public function contractors_timesheets_save($date='') {
		$this->db->select('cts_id');
		$this->db->from('contractors_timesheet');
		$this->db->where('requirement_id',$date['requirement_id']);
		$this->db->where('contractor_id',$date['contractor_id']);
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('date',$date['date']);
		$datas = $this->db->get()->result_array();
		if(empty($datas) || $datas[0]['cts_id']==$date['cts_id']){
			if(isset($date['cts_id']) && $date['cts_id']!=''){
				$_id = $date['cts_id'];
				$id = array('status'=>'2','id'=>$_id);
				unset($date['cts_id']);
				$this->db->where('cts_id',$_id);
				$this->db->update('contractors_timesheet', $date);
			} else { 
				$this->db->insert('contractors_timesheet',$date);
				$id = array('status'=>'1','id'=>$this->db->insert_id());
			}
		} else {
			$id = array('status'=>'0','id'=>'0');
		}
		return $id;
	}
}
