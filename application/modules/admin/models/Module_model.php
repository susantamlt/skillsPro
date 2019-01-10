<?php  class Module_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_module_list($value='') {
		$user_id=$this->session->userdata('admin_user_id');
    	$org_id=$this->session->userdata('admin_org_id');
    	$tableName='dt_course_module';
    	$tableName1='dt_course_section';
    	$columns=array(
    		"$tableName.module_id",
       		"$tableName1.section_name",
       		"$tableName.module_name",
       		"$tableName.content_type",
       		"$tableName.is_active",
    	);
    	$indexId     = "$tableName.module_id";
		$columnOrder = "$tableName.module_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.section_id=$tableName.section_id";
		$condition   = "WHERE $tableName.module_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_section_name($data='') {
		$org_id = $this->session->userdata('admin_org_id');
        $this->db->select('cs.section_id,cs.section_name');
        $this->db->from('dt_course_section as cs');
        $this->db->where('cs.course_id',$data['course_id']);
        $datas=$this->db->get()->result_array();
        $dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['section_id']] = $_data['section_name'];
		endforeach;
		return $dataState;  
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
	public function module_save($data='') {
		$id=0;
		$this->db->select('module_id');
		$this->db->from('dt_course_module');
		$this->db->where('module_name',$data['module_name']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['module_id']) && $datas[0]['module_id']==$data['module_id'])){
			if (isset($data['module_id']) && $data['module_id']!=''){
				$id=3;
				$_id=$data['module_id'];
				unset($data['module_id']);
				$this->db->where('module_id',$_id);
				$this->db->update('dt_course_module',$data);
			} else{
				$this->db->insert('dt_course_module',$data);
				$id=1;
			}
		}else{
			$id=2;
		}
		return $id;
	}
	public function module_edit($id='') {
		$org_id = $this->session->userdata('admin_org_id');
		$this->db->select('dt.*,ds.course_id,ds.section_name');
		$this->db->from('dt_course_module as dt');
		$this->db->join('dt_course_section as ds','ds.section_id=dt.section_id','left');
		$this->db->where('dt.module_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}	
}