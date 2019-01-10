<?php  class Topic_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

public function get_topic_list($date='') {
		$org_id = $this->session->userdata('admin_org_id');
		$user_id = $this->session->userdata('admin_user_id');
		$tableName = 'topic';
		$columns   = array(
			"$tableName.topic_id",
			"$tableName.topic_name",
		);
		$indexId     = '$tableName.topic_id';
		$columnOrder = "$tableName.topic_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "WHERE $tableName.topic_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
/*public function topic_save($data='') {
		$id=0;
		$this->db->select('topic_id');
		$this->db->from('topic');
		$this->db->where('topic_name',$data['topic_name']);
	    $datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('topic',$data);
			$id = 1;
		} else {
			$id = 2;
		}
		return $id;
    }*/
    public function topic_save($data='') {
    	$id=0;
    	$this->db->select('topic_id');
    	$this->db->from('topic');
    	$this->db->where('topic_name',$data['topic_name']);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) ||(isset($data['topic_id']) && $datas[0]['topic_id'] == $data['topic_id'])){
				$id=3;
				$_id = $data['topic_id'];
				unset($data['topic_id']);
				$this->db->where('topic_id',$_id);
				$this->db->update('topic', $data);
			} else { 
				$this->db->insert('topic',$data);
				$id=1;
			}
		
		return $id;
	}

	public function topic_View($id='') {
		$org_id = $this->session->userdata('admin_org_id');
		$this->db->select('*');
		$this->db->from('topic');
		$this->db->where('topic_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}