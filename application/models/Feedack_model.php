<?php class Feedack_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function unsubscribe($id='') {
		$date['is_unsubscribed']='Y';
		$this->db->where('job_id',$id);
		$this->db->update('dt_email_list', $date);
		return 1;
	}
}