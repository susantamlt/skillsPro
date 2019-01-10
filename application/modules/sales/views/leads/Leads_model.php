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
		$indexId     = '$tableName.contact_id';
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
			"$tableName.created_at",
		);
		$indexId     = '$tableName.contact_id';
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
		$this->db->select('p.*');
		$this->db->from('prospect as p');
		$this->db->where('p.prospect_id',$date['id']);
		$pfdata = $this->db->get()->result_array();
		if(!empty($pfdata)){
			$_pfdata = $pfdata[0];
			$this->db->select('con.*');
			$this->db->from('contacts as con');
			$this->db->where('con.contact_id',$_pfdata['client_id']);
			$cdata = $this->db->get()->result_array();
			$rdate['client_id']=0;
			if(!empty($cdata)){
				$this->db->select('cl.client_id');
				$this->db->from('clients as cl');
				$this->db->where('cl.old_id',$cdata[0]['contact_id']);
				$this->db->where('cl.email_1',$cdata[0]['email_1']);
				$cldata = $this->db->get()->result_array();
				if(!empty($cldata)){
					$cdata[0]['old_id']=$cdata[0]['contact_id'];
					unset($cdata[0]['contact_id']);
					unset($cdata[0]['mnu_autp']);
					$this->db->where('client_id',$cldata[0]['client_id']);
					$this->db->update('clients', $cdata[0]);
					$rdate['client_id'] = $cldata[0]['client_id'];
				} else {
					$cdata[0]['old_id']=$cdata[0]['contact_id'];
					unset($cdata[0]['contact_id']);
					unset($cdata[0]['mnu_autp']);
					$this->db->insert('clients',$cdata[0]);
					$rdate['client_id'] = $this->db->insert_id();
				}
				if($rdate['client_id'] > 0){
					$rdate['prospect_id']=$_pfdata['prospect_id'];
					$rdate['org_id']=$_pfdata['org_id'];
					$rdate['user_id']=$_pfdata['user_id'];
					$rdate['expected_date_of_closure']=$_pfdata['expected_date'];
					$rdDate['requirement_id']=0;
					$this->db->select('r.requirement_id');
					$this->db->from('requirement as r');
					$this->db->where('r.prospect_id',$_pfdata['prospect_id']);
					$requirdata = $this->db->get()->result_array();
					if(!empty($requirdata)){
						$this->db->where('requirement_id',$requirdata[0]['requirement_id']);
						$this->db->update('requirement', $rdate);
						$rdDate['requirement_id'] = $requirdata[0]['requirement_id'];
					} else {
						$this->db->insert('requirement',$rdate);
						$rdDate['requirement_id'] = $this->db->insert_id();
					}
					if($rdDate['requirement_id'] > 0){
						$rdDate['requirement']=$_pfdata['requirements_details'];
						$rdDate['no_of_requirement']=$_pfdata['no_of_prospect'];
						$rdDate['proposed_hourly_rate']=$_pfdata['expected_revenue'];
						$rdDate['final_hourly_rate']=$_pfdata['actual_revenue'];
						$rpdDate['requirement_id_y']=0;
						$this->db->select('rd.requirement_details_id');
						$this->db->from('requirement_details as rd');
						$this->db->where('rd.requirement_id',$rdDate['requirement_id']);
						$requirDetailsData = $this->db->get()->result_array();
						if(!empty($requirDetailsData)){
							$this->db->where('requirement_details_id',$requirDetailsData[0]['requirement_details_id']);
							$this->db->update('requirement_details', $rdDate);
							$rpdDate['requirement_id_y'] = $requirdata[0]['requirement_id'];
						} else {
							$this->db->insert('requirement_details',$rdDate);
							$rpdDate['requirement_id_y'] = $this->db->insert_id();
						}
						if($rpdDate['requirement_id_y'] > 0){
							$pdata['is_contract_recived'] = 'Y';
							$pdata['is_requirment'] = 'Y';
							$this->db->where('prospect_id',$_pfdata['prospect_id']);
							$this->db->update('prospect', $pdata);
							return 1;
						} else {
							return 0;
						}
					} else {
						return 0;
					}
				} else {
					return 0;
				}
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
 
}

