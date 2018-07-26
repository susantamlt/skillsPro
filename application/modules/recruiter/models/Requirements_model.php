<?php class Requirements_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_requirements_list($date='') {
		$org_id = $this->session->userdata('requirter_org_id');
		$user_id = $this->session->userdata('requirter_user_id');
		$tableName = 'requirement';
		$tableName1 = 'requirement_details';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'users';
		$tableName5 = 'prospect';
		$columns   = array(
			"$tableName.requirement_id",
			"$tableName.requirement_status",
			"$tableName1.requirement",
			"$tableName1.no_of_requirement",
			"$tableName1.proposed_hourly_rate",
			"$tableName1.final_hourly_rate",
			"$tableName1.final_comments_on_requirement"
		);
		$indexId     = '$tableName.requirement_id';
		$columnOrder = "$tableName.requirement_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.requirement_id=$tableName.requirement_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function requirements_view($id) {
		$org_id = $this->session->userdata('requirter_org_id');
		$user_id = $this->session->userdata('requirter_user_id');
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

	public function requirements_assigns($date='') {
		$org_id = $this->session->userdata('requirter_org_id');
		$user_id = $this->session->userdata('requirter_user_id');
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
		$indexId     = '$tableName.contractor_id';
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "left join $tableName2 on $tableName2.contractor_id=$tableName.contractor_id left join $tableName1 on $tableName1.	requirement_id=$tableName2.requirement_id left join $tableName6 on $tableName6.	requirement_id=$tableName1.requirement_id";
		$condition   = "WHERE $tableName1.org_id='".$org_id."' AND $tableName1.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
}