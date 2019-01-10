<?php  class Course_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}	
	public function get_course_list($data='') {
		$org_id = $this->session->userdata('clients_org_id');
		$user_id = $this->session->userdata('clients_user_id');
		$tableName = 'course';
		$columns   = array(
			"$tableName.course_id",
			"$tableName.course_name",
			"$tableName.course_topic",
			"$tableName.course_chapter",
			"$tableName.start_date",
		);
		$indexId     = "$tableName.course_id";
		$columnOrder = "$tableName.course_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "WHERE $tableName.course_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
		
	}
	public function course_save($data='') {
		$id=0;
		$this->db->select('course_id');
		$this->db->from('course');
		$this->db->where('course_name',$data['course_name']);
		$this->db->where('course_topic',$data['course_topic']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['course_id']) && $datas[0]['course_id']==$data['course_id'])){
			if (isset($data['course_id']) && $data['course_id']!=''){
				$id=3;
				$_id=$data['course_id'];
				unset($data['course_id']);
				$this->db->where('course_id',$_id);
				$this->db->update('course',$data);
			} else{
				$this->db->insert('course',$data);
				$id=1;
			}
		}else{
			$id=2;
		}
		return $id;
	}

}