<?php class Test_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_test_list($data='') {
		$org_id = $this->session->userdata('admin_org_id');
		$user_id = $this->session->userdata('admin_user_id');
		$tableName = 'dt_online_test';
		$tableName1 = 'course';
		$columns   = array(
			"$tableName.online_test_id",
			"$tableName.online_test_name",
			"$tableName1.course_name",
			"$tableName.time_duration_hours",
			"$tableName.start_date",
		);
		$indexId     = "$tableName.online_test_id";
		$columnOrder = "$tableName.online_test_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.course_id=$tableName.course_id";
		$condition   = "WHERE $tableName.online_test_name!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	public function get_course( ) {
		$this->db->select('course_id,course_name');
		$this->db->from('course');
		$datas = $this->db->get()->result_array();                                                                                  
		$dataCourse=array(''=>'--Select One--');
		foreach ($datas as $_datas):
			$dataCourse[$_datas['course_id']]=$_datas['course_name'];
			endforeach;
			return $dataCourse;
	}
	public function get_data($id='') {
		$org_id = $this->session->userdata('admin_org_id');
		$this->db->select('dt.*,c.course_name');
		$this->db->from('dt_online_test as dt');
		$this->db->join('course as c','c.course_id=c.course_id','left');
		$this->db->where('dt.online_test_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
		
	public function test_save($data='') {
		$id=0;
		$this->db->select('online_test_id');
		$this->db->from('dt_online_test');
		$this->db->where('online_test_name',$data['online_test_name']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['online_test_id']) && $datas[0]['online_test_id']==$data['online_test_id'])){
			if (isset($data['online_test_id']) && $data['online_test_id']!=''){
				$id=3;
				$_id=$data['online_test_id'];
				unset($data['online_test_id']);
				$this->db->where('online_test_id',$_id);
				$this->db->update('dt_online_test',$data);
			} else{
				$this->db->insert('dt_online_test',$data);
				$id=1;
			}
		}else{
			$id=2;
		}
		return $id;
	}
}
	