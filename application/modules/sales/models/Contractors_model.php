<?php class Contractors_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_contractors_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$tableName = 'contractors';
		$tableName1 = 'organization';
		$tableName2 = 'requirement_contractor';
		$columns   = array(
			"$tableName.contractor_id",
			"$tableName.contractor_name",
			"$tableName.designation",
			"$tableName.mobile",
			"$tableName1.org_name",
			"$tableName2.interview_date",
			"$tableName2.pc_status",
			"$tableName.cons_date",
			
		);
		$indexId     = "$tableName.contractor_id";
		$columnOrder = "$tableName.contractor_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.org_id=$tableName.org_id left join $tableName2 on $tableName2.contractor_id=$tableName.contractor_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function  get_ljp_constractorsview($id='') {
		$this->db->select('c.*,o.org_name');
		$this->db->from('contractors as c');
		$this->db->join('organization as o','o.org_id=c.org_id','left');
		$this->db->where('c.contractor_id',$id);
		$datas=$this->db->get()->result_array();
		return $datas;               
    }

    public function contractor_save($date='') {
    	$id=0;
    	$this->db->select('contractor_id');
    	$this->db->from('contractors');
    	$this->db->where('email_id',$date['email_id']);
    	$this->db->where('mobile',$date['mobile']);
    	$datas = $this->db->get()->result_array();
    	if(empty($datas) ||(isset($date['contractor_id']) && $datas[0]['contractor_id'] == $date['contractor_id'])){
			if(isset($date['contractor_id']) && $date['contractor_id']!=''){
				$id=3;
				$_id = $date['contractor_id'];
				unset($date['contractor_id']);
				$this->db->where('contractor_id',$_id);
				$this->db->update('contractors', $date);
			} else { 
				$this->db->insert('contractors',$date);
				$id=1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}
		public function document_save($date='') {
		$this->db->insert('uplode_document',$date);
		return $this->db->insert_id();
		}
		
	public function get_client_name($data='') {
		$org_id = $this->session->userdata('sales_org_id');
		$this->db->select('client_id,contact_name');
		$this->db->from('clients');
		$this->db->where('org_id',$org_id);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['client_id']] = $_data['contact_name'];
		endforeach;
		return $dataState;
		print_r($dataState);
		exit();
	}
	public function get_prospect_title($data='') {
		$org_id = $this->session->userdata('sales_org_id');
        $this->db->select('p.prospect_title,r.requirement_id');
        $this->db->from('requirement as r');
        $this->db->join('prospect as p','p.prospect_id=r.prospect_id','left');
        $this->db->where('r.org_id',$org_id);
        $this->db->where('r.client_id',$data['client_id']);
        $datas=$this->db->get()->result_array();
        $dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['requirement_id']] = $_data['prospect_title'];
		endforeach;
		return $dataState;  
	}
	 public function get_resumefile_name($id='') {
    	$this->db->select('c.file_name');
		$this->db->from('contractors as c');
		$this->db->where('c.contractor_id',$id);
		$datas=$this->db->get()->result_array();
		return $datas;    
	}
	 public function shortlist_save($data='') {
   	    $id=0;
		$this->db->select('pc_id');
		$this->db->from('requirement_contractor');
		$this->db->where('contractor_id',$data['contractor_id']);
	    $datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('requirement_contractor',$data);
			$id = 1;
		} else {
			$id = 2;
		}
		return $id;
	}

  }


