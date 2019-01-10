<?php  class Course_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}	
	public function get_course_list($data='') {
		$org_id = $this->session->userdata('admin_org_id');
		$user_id = $this->session->userdata('admin_user_id');
		$tableName = 'course';
		$tableName1 = 'topic';
		$columns   = array(
			"$tableName.course_id",
			"$tableName.course_name",
			"$tableName1.topic_name",
			"$tableName.course_chapter",
			"$tableName.start_date",
		);
		$indexId     = "$tableName.course_id";
		$columnOrder = "$tableName.course_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.topic_id=$tableName.topic_id";
		$condition   = "WHERE $tableName.course_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
		
	}
	public function course_save($data='') {
		$id=0;
		$this->db->select('course_id');
		$this->db->from('course');
		$this->db->where('course_name',$data['course_name']);
		//$this->db->where('course_id',$data['course_id']);
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
	public function course_edit($id='') {
		$org_id = $this->session->userdata('admin_org_id');
		$this->db->select('c.*,t.topic_name');
		$this->db->from('course as c');
		$this->db->join('topic as t','t.topic_id=c.topic_id','left');
		$this->db->where('c.course_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}