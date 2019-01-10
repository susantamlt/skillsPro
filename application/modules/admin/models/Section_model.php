<?php  class Section_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_section_list($value='') {
		$user_id=$this->session->userdata('admin_user_id');
    	$org_id=$this->session->userdata('admin_org_id');
    	$tableName='dt_course_section';
    	$tableName1='course';
    	$columns=array(
    		"$tableName.section_id",
    		"$tableName1.course_name",
    		"$tableName.section_name",
    	);
    	$indexId     = "$tableName.section_id";
		$columnOrder = "$tableName.section_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.course_id=$tableName.course_id";
		$condition   = "WHERE $tableName.section_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function get_course_name($data='') {
		$org_id = $this->session->userdata('admin_org_id');
        $this->db->select('c.course_id,c.course_name');
        $this->db->from('course as c');
        $this->db->where('c.org_id',$org_id);
        $this->db->where('c.topic_id',$data['topic_id']);
        $datas=$this->db->get()->result_array();
        $dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['course_id']] = $_data['course_name'];
		endforeach;
		return $dataState;  
	}
	 public function section_save($data='') {
		$id=0;
		$this->db->select('section_id');
		$this->db->from('dt_course_section');
		$this->db->where('section_name',$data['section_name']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['section_id']) && $datas[0]['section_id']==$data['section_id'])){
			if (isset($data['section_id']) && $data['section_id']!=''){
				$id=3;
				$_id=$data['section_id'];
				unset($data['section_id']);
				$this->db->where('section_id',$_id);
				$this->db->update('dt_course_section',$data);
			} else{
				$this->db->insert('dt_course_section',$data);
				$id=1;
			}
		}else{
			$id=2;
		}
		return $id;
	}	

	public function get_ljp_topic() {
		$this->db->select('topic_id,topic_name');
		$this->db->from('topic');
		$datas = $this->db->get()->result_array();
		$dataTopic = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataTopic[$_data['topic_id']] = $_data['topic_name'];
		endforeach;
		return $dataTopic;

	}
}