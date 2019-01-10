<?php class Assessment_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_question($data='') {
		$org_id = $this->session->userdata('admin_org_id');
        $this->db->select('dt.question_id,dt.question');
        $this->db->from('dt_question_bank as dt');
        $this->db->where('dt.question_type',$data['question_type']);
        $datas=$this->db->get()->result_array();
        $dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['question_id']] = $_data['question'];
		endforeach;
		return $dataState;  
	}

}
