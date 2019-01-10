<?php class Emailmessage_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_emailmessage_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = 'dt_message_template';
		$sql = '';
		if($date['template_type']!=''){
			$sql = $sql." WHERE $tableName.template_type='".$date['template_type']."'";
		} else {
			$sql = $sql." WHERE $tableName.template_type!=''";
		}
		$columns   = array(
			"$tableName.message_temaplte_id",
			"$tableName.template_type",
			"$tableName.template_title",
		);
		$indexId     = "$tableName.message_temaplte_id";
		$columnOrder = "$tableName.message_temaplte_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "$sql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function get_ljp_ParticularDataView($id='') {
		$this->db->select('*');
		$this->db->from('dt_message_template');
		$this->db->where('message_temaplte_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
	public function emailmessage_save($date='') {
		$id = 0;
		if(isset($date['message_temaplte_id']) && $date['message_temaplte_id']!=''){
			$id = 3;
			$_id = $date['message_temaplte_id'];
			unset($date['message_temaplte_id']);
			$this->db->where('message_temaplte_id',$_id);
			$this->db->update('dt_message_template', $date);
		} else { 
			$this->db->insert('dt_message_template',$date);
			$id = 1;
		}
		return $id;
	}
}