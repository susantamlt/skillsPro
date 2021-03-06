<?php class Leads_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_Leads_listm($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'contacts';
		$tableName1 = 'prospect_type';
		$columns   = array(
			"$tableName.contact_id",
			"$tableName.contact_name",
			"$tableName.decision_maker_name",
			"$tableName.cat_id",
			"$tableName.email_1",
			"$tableName.phone_1",
			"$tableName.address",
			"$tableName.contract_type",
			"$tableName.created_at",
		);
		$indexId     = "$tableName.contact_id";
		$columnOrder = "$tableName.contact_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.type_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='0'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Leads_lista($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'contacts';
		$tableName1 = 'prospect_type';
		$columns   = array(
			"$tableName.contact_id",
			"$tableName.contact_name",
			"$tableName.decision_maker_name",
			"$tableName.cat_id",
			"$tableName.email_1",
			"$tableName.phone_1",
			"$tableName.address",
			"$tableName.contract_type",
			"$tableName.created_at",
		);
		$indexId     = "$tableName.contact_id";
		$columnOrder = "$tableName.contact_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.type_id";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function Leads_client_save($date='') {
		$this->db->select('contact_id');
		$this->db->from('contacts');
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('user_id',$date['user_id']);
		$this->db->where('phone_1',$date['phone_1']);
		$this->db->where('email_1',$date['email_1']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('contacts',$date);
			$id = $this->db->insert_id();
		} else {
			$id = $datas[0]['contact_id'];
		}
		return $id;
	}

	public function leads_save($date='') {
		$this->db->select('contact_id');
		$this->db->from('contacts');
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('user_id',$date['user_id']);
		$this->db->where('phone_1',$date['phone_1']);
		$this->db->where('email_1',$date['email_1']);
		$datas = $this->db->get()->result_array();
		if(empty($datas) || $datas[0]['contact_id'] == $date['contact_id']){
			if(isset($date['contact_id']) && $date['contact_id']!=''){
				$id = $date['contact_id'];
				unset($date['contact_id']);
				$this->db->where('contact_id',$id);
				$this->db->update('contacts', $date);
			} else { 
				$this->db->insert('contacts',$date);
				$id = $this->db->insert_id();
			}
		} else {
			$id = $datas[0]['contact_id'];
		}
		return $id;
	}

	public function get_ljp_ParticularData($id='') {
		$this->db->select('*');
		$this->db->from('contacts');
		$this->db->where('contact_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function get_ljp_ParticularDataView($id='') {
		$leadcat = $this->config->item('ljp_leadcats');
		$this->db->select('cs.*,pt.prospect_type');
		$this->db->from('contacts as cs');
		$this->db->join('prospect_type as pt', 'pt.prospect_type_id = cs.type_id','left');
		$this->db->where('cs.contact_id',$id);
		$datas = $this->db->get()->result_array();
		foreach ($datas as $dk => $_data) {
			$ValArray = explode(',', $_data['cat_id']);
			$catVal = '';
			foreach ($ValArray as $vk => $vAv) {
				if($catVal!=''){
					$catVal = $catVal.', '.$leadcat[$vAv];
				} else {
					$catVal = $leadcat[$vAv];
				}
			}
			$datas[$dk]['cat_id'] = $catVal;
		}
		return $datas;
	}

	public function indtype($date='') {
		$this->db->select('prospect_type_id,prospect_type');
		$this->db->from('prospect_type');
		$this->db->where('cat_id',$date['cat_id']);
		$this->db->where('status','1');
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['prospect_type_id']] = $_data['prospect_type'];
		endforeach;
		return $dataState;
	}

	public function get_ljp_industry($date='') {
		$this->db->select('prospect_type_id,prospect_type');
		$this->db->from('prospect_type');
		$this->db->where('cat_id',$date);
		$this->db->where('status','1');
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['prospect_type_id']] = $_data['prospect_type'];
		endforeach;
		return $dataState;
	}
	
	public function leadsimport_save($date='') {
		$this->db->select('contact_id');
		$this->db->from('contacts');
		$this->db->where('phone_1',$date['phone_1']);
		$this->db->where('email_1',$date['email_1']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('contacts',$date);
			$rut = 1;
		} else {
			$rut = 0;
		}
		return $rut;
	}

	public function getCatId($date='') {
		$data = array();
		$this->db->select('cat_id');
		$this->db->from('category');
		$this->db->where_in('cat_name',explode(',',$date));
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			foreach ($datas as $key => $value) {
				$data[] = $value['cat_id'];
			}
		} else {
			$data = array('NULL');
		}
		return implode(',',$data);
	}
	public function sendcontract($date='') {
		# code...
	}

	public function receivecontract($date='') {
		$this->db->select('c.*');
		$this->db->from('contacts as c');
		$this->db->where('c.contact_id',$date['id']);
		$pfdata = $this->db->get()->result_array();
		if(!empty($pfdata)){
			$_pfdata = $pfdata[0];
			$this->db->select('client_id');
			$this->db->from('clients');
			$this->db->where('phone_1',$_pfdata['phone_1']);
			$this->db->where('email_1',$_pfdata['email_1']);
			$cldata = $this->db->get()->result_array();
			if(!empty($cldata)){
				$_pfdata1 = $pfdata[0];
				$_pfdata1['old_id']=$_pfdata1['contact_id'];
				unset($_pfdata1['contact_id']);
				unset($_pfdata1['mnu_autp']);
				unset($_pfdata1['contract_type']);
				$this->db->where('client_id',$cldata[0]['client_id']);
				$this->db->update('clients', $_pfdata1);
				$rdate['client_id'] = $cldata[0]['client_id'];
			} else {
				$_pfdata2 = $pfdata[0];
				$_pfdata2['old_id']=$_pfdata2['contact_id'];
				unset($_pfdata2['contact_id']);
				unset($_pfdata2['mnu_autp']);
				unset($_pfdata2['contract_type']);
				$this->db->insert('clients',$_pfdata2);
				$rdate['client_id'] = $this->db->insert_id();
				return 1;
			}
		} else {
			return 0;
		}
	}
	public function leads_file_save($date='') {
		if(isset($date['contact_id']) && $date['contact_id']!=''){
			$id = $date['contact_id'];
			unset($date['contact_id']);
			$this->db->where_in('contact_id',$id);
			$this->db->update('contacts', $date);
		} else { 
			$this->db->insert('contacts',$date);
			$id = $this->db->insert_id();
		}
		return $id;
	}
	public function get_ljp_leadsource() {
		$this->db->select('lead_source');
		$this->db->from('lead_source');
		$datas = $this->db->get()->result_array();
		$dataSource = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataSource[$_data['lead_source']] = $_data['lead_source'];
		endforeach;
		return $dataSource;
	}
	public function get_ljp_leadstatus() {
		$this->db->select('status');
		$this->db->from('lead_status');
		$datas = $this->db->get()->result_array();
		$dataStatus = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataStatus[$_data['status']] = $_data['status'];
		endforeach;
		return $dataStatus;
	}
 
}

