<?php  class Questions_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function get_question_list($value='') {
		$org_id = $this->session->userdata('admin_org_id');
		$user_id = $this->session->userdata('admin_user_id');
		$tableName1 = 'course';
		$tableName = 'dt_question_bank';
		$columns   = array(
			"$tableName.question_id",
			"$tableName1.course_name",
			"$tableName.question",
			"$tableName.question_level",
		);
		$indexId     = "$tableName.question_id";
		$columnOrder = "$tableName.question_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.course_id=$tableName.course_id";
		$condition   = "WHERE $tableName.question!=''";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function gat_course_name() {
		$this->db->select('course_id,course_name');
		$this->db->from('course');
		$datas = $this->db->get()->result_array();
		$dataCourse = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCourse[$_data['course_id']] = $_data['course_name'];
		endforeach;
		return $dataCourse;
	}
	public function questions_save($data='') {
		$id=0;
		$this->db->select('question_id');
		$this->db->from('dt_question_bank');
		$this->db->where('question',$data['question']);
		$datas=$this->db->get()->result_array();
		if (empty($datas) || (isset($data['question_id']) && $datas[0]['question_id']==$data['question_id'])){
			if (isset($data['question_id']) && $data['question_id']!=''){
				$id=3;
				$_id=$data['question_id'];
				unset($data['question_id']);
				$this->db->where('question_id',$_id);
				$this->db->update('dt_question_bank',$data);
			} else{
				$this->db->insert('dt_question_bank',$data);
				$id=1;
			}
		}else{
			$id=2;
		}
		return $id;
	}
	
	public function course_edit($id='') {
		$org_id = $this->session->userdata('admin_org_id');
		$this->db->select('dt.*,c.course_name');
		$this->db->from('dt_question_bank as dt');
		$this->db->join('course as c','c.course_id=dt.course_id','left');
		$this->db->where('dt.question_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}	
