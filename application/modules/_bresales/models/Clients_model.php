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
		);
		$indexId     = '$tableName.client_id';
		$columnOrder = "$tableName.client_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.user_id=$tableName.user_id left join $tableName2 on $tableName2.org_id=$tableName.org_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.user_id='".$user_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
}