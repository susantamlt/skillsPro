<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('clients_org_id');
		$clients_id = $this->session->userdata('clients_user_id');
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
		$indexId     = '$tableName.contractor_id';
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "inner join $tableName1 on $tableName1.contractor_id=$tableName.contractor_id inner join $tableName2 on $tableName2.requirement_id=$tableName.requirement_id inner join $tableName3 on $tableName3.prospect_id=$tableName2.prospect_id";
		$condition   = "WHERE $tableName2.client_id='".$clients_id."' AND $tableName2.org_id='".$org_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function contractors_view($id='') {
		$org_id = $this->session->userdata('clients_org_id');
		$clients_id = $this->session->userdata('clients_user_id');
		$this->db->select('c.*,p.prospect_title,p.prospect_source,p.prospect_email_1,p.prospect_email_2,p.prospect_phone_1,p.prospect_phone_2,r.expected_date_of_closure,r.no_requirement_fullfilled,rc.interview_date,rc.interview_time,p.prospect_phone_3');
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
}