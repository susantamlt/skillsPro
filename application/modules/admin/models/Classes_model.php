<?php  class Classes_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
    
    public function get_class_list($data='') {
    	$user_id=$this->session->userdata('admin_user_id');
    	$org_id=$this->session->userdata('admin_org_id');
    	$tableName='class';
    	$tableName1='course';
    	$columns=array(
    		"$tableName.class_id",
    		"$tableName.class_name",
    		"$tableName1.course_name",
    		"$tableName.start_time",
    		"$tableName.start_date",
    	);
    	$indexId     = "$tableName.class_id";
		$columnOrder = "$tableName.class_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.course_id=$tableName.course_id";
		$condition   = "WHERE $tableName.class_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
    }
    public function class_save($data='') {
		$id=0;
		$this->db->select('class_id');
		$this->db->from('class');
		$this->db->where('class_name',$data['class_name']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['class_id']) && $datas[0]['class_id']==$data['class_id'])){
			if (isset($data['class_id']) && $data['class_id']!=''){
				$id=3;
				$_id=$data['class_id'];
				unset($data['class_id']);
				$this->db->where('class_id',$_id);
				$this->db->update('class',$data);
			} else{
				$this->db->insert('class',$data);
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
}