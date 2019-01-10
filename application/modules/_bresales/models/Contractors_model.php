<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName2.decision_maker_name",
			"$tableName.no_of_prospect",
			"$tableName.prospect_source",
			"$tableName.prospect_address",
			"$tableName4.state",
			"$tableName.date_of_prospect",
		);
		$indexId     = '$tableName.prospect_id';
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.org_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='0' AND $tableName.is_contract_recived='Y'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
}