<?php class Email_model extends CI_Model{

		function __construct() {
		parent::__construct();
	}
	public function get_email_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = ' dt_email_list';
		$columns   = array(
			"$tableName.email_id",
			"$tableName.email",
			"$tableName.sent_date",
			"$tableName.is_sent",
			"$tableName.is_opened",
		);
		$indexId     = "$tableName.email_id";
		$columnOrder = "$tableName.email_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "WHERE $tableName.is_opened!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	function save_email($data){
		$this->db->insert('dt_email_messages',$data);
		$result=$this->db->insert_id();

		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	function get_email_sent($start_date='',$end_date){
		$this->db->select('*');
		$this->db->from('dt_email_list');
		$this->db->where('is_sent','Y');
		if($start_date!=''){
			$this->db->where('sent_date >=',$start_date);
		}
		if($end_date!=''){
			$this->db->where('sent_date <=',$end_date);
		}
		$result=$this->db->get();

		return $result->num_rows();	
	}

	function get_custom_email_sent($start_date='',$end_date=''){
		$this->db->select('*');
		$this->db->from('dt_email_messages');
		// $this->db->where('is_sent','Y');
		if($start_date!=''){
			$this->db->where('date(send_at)>=',$start_date);
		}
		if($end_date!=''){
			$this->db->where('date(send_at)<=',$end_date);
		}


		$result=$this->db->get();

		return $result->num_rows();	
	}

	function date_wise_custom_email_sent($start_date='',$end_date=''){

		$sql="SELECT COUNT(*) AS cnt,DATE(send_at) as date_sent FROM dt_email_messages WHERE DATE(send_at)>= ".$start_date." AND DATE(send_at)<=" .$end_date;
		$result=$this->db->query($sql);

		return $result->result();
	}

	function date_wise_email_sent($start_date='',$end_date=''){

		$sql="SELECT COUNT(*) as cnt,DATE(sent_date) AS date_sent FROM dt_email_list WHERE DATE(sent_date)>='".$start_date."' AND DATE(sent_date)<='" .$end_date."' GROUP BY DATE(sent_date)";
		$result=$this->db->query($sql);

		return $result->result();
	}
}