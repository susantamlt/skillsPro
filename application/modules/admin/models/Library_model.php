<?php  class Library_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

    public function get_library_list($data='') {
     	$org_id = $this->session->userdata('admin_org_id');
		$user_id = $this->session->userdata('admin_user_id');
		$tableName = 'library';
		$tableName1 = 'course';
		$tableName2 = 'topic';
		$columns   = array(
			"$tableName.library_id",
			"$tableName2.topic_name",
			"$tableName1.course_name",
			"$tableName.chapter_name",
			"$tableName.object_name",
		);
		$indexId     = '$tableName.library_id';
		$columnOrder = "$tableName.library_id";
		$orderby     = "";
		$joinMe      = "left join $tableName2 on $tableName2.topic_id=$tableName.topic_id left join $tableName1 on $tableName1.course_id=$tableName.course_id";
		$condition   = "WHERE $tableName.chapter_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
     }

    public function library_save($data='') {
    	$id=0;
    	$this->db->select('library_id');
    	$this->db->from('library');
    	$this->db->where('object_name',$data['object_name']);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) ||(isset($data['library_id']) && $datas[0]['library_id'] == $data['library_id'])){
			if(isset($data['library_id']) && $data['library_id']!=''){
				$id=3;
				$_id = $data['library_id'];
				unset($data['library_id']);
				$this->db->where('library_id',$_id);
				$this->db->update('library', $data);
			} else { 
				$this->db->insert('library',$data);
				$id=1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}

	public function get_ljp_course() {
		$this->db->select('course_id,course_name');
		$this->db->from('course');
		$datas = $this->db->get()->result_array();
		$dataCourse = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCourse[$_data['course_id']] = $_data['course_name'];
		endforeach;
		return $dataCourse;

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