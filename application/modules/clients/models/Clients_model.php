<?php class Clients_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function clientid($value='') {
		$clients_email = $this->session->userdata('clients_email');
		$this->db->select('c.client_id');
		$this->db->from('clients as c');
	    $this->db->where('c.email_1',$clients_email);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}