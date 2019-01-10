<?php  class Classes_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
    
    public function get_class_list($data='') {
    	$user_id=$this->session->userdata('clients_user_id');
    	$org_id=$this->session->userdata('clients_org_id');
    	$tableName='class';
    	$columns=array(
    		"$tableName.class_id",
    		"$tableName.class_name",
    		"$tableName.course_name",
    		"$tableName.start_time",
    		"$tableName.start_date",
    	);
    	$indexId     = "$tableName.class_id";
		$columnOrder = "$tableName.class_id";
		$orderby     = "";
		$joinMe      = "";
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
}