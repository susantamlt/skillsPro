<?php class Jobs_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_Jobs_listm($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='0' AND $tableName.is_requirment='N' AND $tableName.pro_job='0'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_lista($date='') {
		$dataConcate = $this->get_ljp_industry_group_concate();
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$conditionSql   = "WHERE $tableName.prospect_source='craigslist' AND $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1' AND $tableName.is_requirment='N' AND $tableName.pro_job='0'";
		if(isset($date['state_code']) && $date['state_code']!=''){
			$conditionSql = $conditionSql." AND $tableName.state_code='".$date['state_code']."'";
		} else {
			$stateRole = $this->session->userdata('sales_state_role');
			if($stateRole!=''){
				$_stateRole = str_replace(',', "','", $stateRole);
				$conditionSql = $conditionSql." AND $tableName.state_code IN('".$_stateRole."')";
			}
		}
		if(isset($date['city_id']) && $date['city_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.city_id='".$date['city_id']."'";
		}
		if(isset($date['prospect_type_id']) && $date['prospect_type_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id='".$date['prospect_type_id']."'";
		} else {
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id IN (".$dataConcate[0]['ids'].")";
		}
		if(isset($date['phone']) && $date['phone']!=''){
			if($date['phone']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1=''";
			}
		} 

		if(isset($date['date_of_prospect']) && $date['date_of_prospect']!='' && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date['date_of_prospect']) !== 0){
			$conditionSql = $conditionSql." AND $tableName.date_of_prospect='".date('Y-m-d',strtotime(str_replace('/', '-', $date['date_of_prospect'])))."'";
		}
		if(isset($date['email']) && $date['email']!=''){
			if($date['email']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1=''";
			}
		}
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "$conditionSql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_listns($date='') {
		$dataConcate = $this->get_ljp_industry_group_concate();
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$conditionSql   = "WHERE $tableName.prospect_source='craigslist' AND $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1' AND $tableName.is_requirment='N' AND $tableName.pro_job='0' AND $tableName.is_suspicious='N'";
		if(isset($date['state_code']) && $date['state_code']!=''){
			$conditionSql = $conditionSql." AND $tableName.state_code='".$date['state_code']."'";
		} else {
			$stateRole = $this->session->userdata('sales_state_role');
			if($stateRole!=''){
				$_stateRole = str_replace(',', "','", $stateRole);
				$conditionSql = $conditionSql." AND $tableName.state_code IN('".$_stateRole."')";
			}
		}
		if(isset($date['city_id']) && $date['city_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.city_id='".$date['city_id']."'";
		}
		if(isset($date['prospect_type_id']) && $date['prospect_type_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id='".$date['prospect_type_id']."'";
		} else {
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id IN (".$dataConcate[0]['ids'].")";
		}
		if(isset($date['phone']) && $date['phone']!=''){
			if($date['phone']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1=''";
			}
		} 

		if(isset($date['date_of_prospect']) && $date['date_of_prospect']!='' && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date['date_of_prospect']) !== 0){
			$conditionSql = $conditionSql." AND $tableName.date_of_prospect='".date('Y-m-d',strtotime(str_replace('/', '-', $date['date_of_prospect'])))."'";
		}
		if(isset($date['email']) && $date['email']!=''){
			if($date['email']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1=''";
			}
		}
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "$conditionSql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_listnCL($date='') {
		$dataConcate = $this->get_ljp_industry_group_concate();
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$conditionSql   = "WHERE $tableName.prospect_source='Classi Fiedads' AND $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1' AND $tableName.is_requirment='N' AND $tableName.pro_job='0'";
		if(isset($date['state_code']) && $date['state_code']!=''){
			$conditionSql = $conditionSql." AND $tableName.state_code='".$date['state_code']."'";
		} else {
			$stateRole = $this->session->userdata('sales_state_role');
			if($stateRole!=''){
				$_stateRole = str_replace(',', "','", $stateRole);
				$conditionSql = $conditionSql." AND $tableName.state_code IN('".$_stateRole."')";
			}
		}
		if(isset($date['city_id']) && $date['city_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.city_id='".$date['city_id']."'";
		}
		if(isset($date['prospect_type_id']) && $date['prospect_type_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id='".$date['prospect_type_id']."'";
		} else {
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id IN (".$dataConcate[0]['ids'].")";
		}
		if(isset($date['phone']) && $date['phone']!=''){
			if($date['phone']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1=''";
			}
		} 

		if(isset($date['date_of_prospect']) && $date['date_of_prospect']!='' && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date['date_of_prospect']) !== 0){
			$conditionSql = $conditionSql." AND $tableName.date_of_prospect='".date('Y-m-d',strtotime(str_replace('/', '-', $date['date_of_prospect'])))."'";
		}
		if(isset($date['email']) && $date['email']!=''){
			if($date['email']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1=''";
			}
		}
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "$conditionSql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_lists($date='') {
		$dataConcate = $this->get_ljp_industry_group_concate();
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$conditionSql   = "WHERE $tableName.prospect_source='craigslist' AND $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1' AND $tableName.is_requirment='N' AND $tableName.pro_job='0' AND $tableName.is_suspicious='Y'";
		if(isset($date['state_code']) && $date['state_code']!=''){
			$conditionSql = $conditionSql." AND $tableName.state_code='".$date['state_code']."'";
		} else {
			$stateRole = $this->session->userdata('sales_state_role');
			if($stateRole!=''){
				$_stateRole = str_replace(',', "','", $stateRole);
				$conditionSql = $conditionSql." AND $tableName.state_code IN('".$_stateRole."')";
			}
		}
		if(isset($date['city_id']) && $date['city_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.city_id='".$date['city_id']."'";
		}
		if(isset($date['prospect_type_id']) && $date['prospect_type_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id='".$date['prospect_type_id']."'";
		} else {
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id IN (".$dataConcate[0]['ids'].")";
		}
		if(isset($date['phone']) && $date['phone']!=''){
			if($date['phone']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1=''";
			}
		} 

		if(isset($date['date_of_prospect']) && $date['date_of_prospect']!='' && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date['date_of_prospect']) !== 0){
			$conditionSql = $conditionSql." AND $tableName.date_of_prospect='".date('Y-m-d',strtotime(str_replace('/', '-', $date['date_of_prospect'])))."'";
		}
		if(isset($date['email']) && $date['email']!=''){
			if($date['email']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1=''";
			}
		}
		
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "$conditionSql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_listnIndeed($date='') {
		$dataConcate = $this->get_ljp_industry_group_concate();
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'prospect';
		$tableName1 = 'prospect_type';
		$tableName2 = 'clients';
		$tableName3 = 'organization';
		$tableName4 = 'states';
		$conditionSql   = "WHERE $tableName.prospect_source='indeed' AND $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='1' AND $tableName.is_requirment='N' AND $tableName.pro_job='0'";
		if(isset($date['state_code']) && $date['state_code']!=''){
			$conditionSql = $conditionSql." AND $tableName.state_code='".$date['state_code']."'";
		} else {
			$stateRole = $this->session->userdata('sales_state_role');
			if($stateRole!=''){
				$_stateRole = str_replace(',', "','", $stateRole);
				$conditionSql = $conditionSql." AND $tableName.state_code IN('".$_stateRole."')";
			}
		}
		if(isset($date['city_id']) && $date['city_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.city_id='".$date['city_id']."'";
		}
		if(isset($date['prospect_type_id']) && $date['prospect_type_id']!=''){
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id='".$date['prospect_type_id']."'";
		} else {
			$conditionSql = $conditionSql." AND $tableName.prospect_type_id IN (".$dataConcate[0]['ids'].")";
		}
		if(isset($date['phone']) && $date['phone']!=''){
			if($date['phone']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_phone_1=''";
			}
		} 

		if(isset($date['date_of_prospect']) && $date['date_of_prospect']!='' && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date['date_of_prospect']) !== 0){
			$conditionSql = $conditionSql." AND $tableName.date_of_prospect='".date('Y-m-d',strtotime(str_replace('/', '-', $date['date_of_prospect'])))."'";
		}
		if(isset($date['email']) && $date['email']!=''){
			if($date['email']=='yes'){
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1!=''";
			} else {
				$conditionSql = $conditionSql." AND $tableName.prospect_email_1=''";
			}
		}
		
		$columns   = array(
			"$tableName.prospect_id",
			"$tableName.prospect_title",
			"$tableName1.prospect_type",
			"$tableName.prospect_phone_1",
			"$tableName.prospect_email_1",
			"$tableName.prospect_source",
			"$tableName.city_name",
			"$tableName4.state",
			"$tableName.date_of_prospect",
			"$tableName.is_verified",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.client_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "$conditionSql";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_ljp_industry() {
		$this->db->select('*');
		$this->db->from('prospect_type');
		$this->db->where('status','1');
		$datas = $this->db->get()->result_array();
		$dataIndustry = array(''=>'--Select Type--');
		foreach($datas as $_data):
			$dataIndustry[$_data['prospect_type_id']] = $_data['prospect_type'];
		endforeach;
		return $dataIndustry;
	}

	public function get_ljp_industry_group_concate() {
		$this->db->select("GROUP_CONCAT(prospect_type_id SEPARATOR ', ') as ids");
		$this->db->from('prospect_type');
		$this->db->where('status','1');
		$datas = $this->db->get()->result_array();		
		return $datas;
	}

	public function get_ljp_country() {
		$this->db->select('country_code,country_name');
		$this->db->from('country');
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select Country--');
		foreach($datas as $_data):
			$dataCountry[$_data['country_code']] = $_data['country_name'];
		endforeach;
		return $dataCountry;
	}

	public function get_ljp_state() {
		$stateRole = $this->session->userdata('sales_state_role');
		$this->db->select('state_code,state');
		$this->db->from('states');
		$this->db->where('country_code','US');
		if($stateRole==''){
			$this->db->where('country_code','US');
		} else {
			$this->db->where('country_code','US');
			$this->db->where_in('state_code', explode(',', $stateRole));
		}

		$datas = $this->db->get()->result_array();
		$dataStates = array(''=>'--Select State--');
		foreach($datas as $_data):
			$dataStates[$_data['state_code']] = $_data['state'];
		endforeach;
		return $dataStates;
	}

	public function get_ljp_citys() {
		$stateRole = $this->session->userdata('sales_state_role');
		$this->db->select('city_id,city_name');
		$this->db->from('dt_us_city');
		if($stateRole==''){
			$this->db->where('state_code','AL');
		} else {
			$this->db->where('state_code','AZ');
		}
		
		$datas = $this->db->get()->result_array();
		$dataCities = array(''=>'--Select City--');
		foreach($datas as $_data):
			$dataCities[$_data['city_id']] = $_data['city_name'];
		endforeach;
		return $dataCities;
	}

	public function get_ljp_clients() {
		$org_id = $this->session->userdata('sales_org_id');
		$user_id = $this->session->userdata('sales_user_id');
		$this->db->select('contact_id,contact_name');
		$this->db->from('contacts');
		$this->db->where('org_id',$org_id);
		$this->db->where('user_id',$user_id);
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCountry[$_data['contact_id']] = $_data['contact_name'];
		endforeach;
		return $dataCountry;
	}

	public function jobs_client_save($date='') {
		$this->db->select('client_id');
		$this->db->from('contacts');
		$this->db->where('org_id',$date['org_id']);
		$this->db->where('user_id',$date['user_id']);
		$this->db->where('phone_1',$date['phone_1']);
		$this->db->where('email_1',$date['email_1']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('clients',$date);
			$id = $this->db->insert_id();
		} else {
			$id = $datas[0]['client_id'];
		}
		return $id;
	}

	public function get_ljp_jobs($id='') {
		$this->db->select('*');
		$this->db->from('prospect');
		$this->db->where('prospect_id',$id);		
		$datas = $this->db->get()->result_array();
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

	public function contactdetails($date='') {
		$this->db->select('cat_id');
		$this->db->from('contacts');
		$this->db->where('contact_id',$date['client_id']);
		$datas = $this->db->get()->result_array();
		$leadcat = $this->config->item('ljp_leadcat');
		$dataState = array(''=>'--Select One--');
		foreach ($datas as $key => $_data) {
			if($_data['cat_id']!=''){
				$ValArray = explode(',', $_data['cat_id']);
				foreach ($ValArray as $vk => $vAv) {
					$dataState[$vAv] = $leadcat[$vAv];
				}
			}
		}
		return $dataState;
	}

	public function statelist($date='') {
		$this->db->select('state_code,state');
		$this->db->from('states');
		$this->db->where('country_code',$date['country_code']);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['state_code']] = $_data['state'];
		endforeach;
		return $dataState;
	}

	public function citylist($date='') {
		$this->db->select('city_id,city');
		$this->db->from('cities');
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('city','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['city_id']] = $_data['city'];
		endforeach;
		return $dataCity;
	}

	public function ziplist($date='') {
		$this->db->select('city_id,zip,state_code,county');
		$this->db->from('cities_extended');
		$this->db->where('city',$date['city']);
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('zip','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['zip']] = $_data['zip'];
		endforeach;
		return $dataCity;
	}

	public function jobs_save($date='') {
		if(isset($date['prospect_id']) && $date['prospect_id']!=''){
			$id = $date['prospect_id'];
			unset($date['prospect_id']);
			$this->db->where('prospect_id',$id);
			$this->db->update('prospect', $date);
		} else { 
			$this->db->insert('prospect',$date);
			$id = $this->db->insert_id();
		}
		return $id;
	}

	public function jobs_comment_save($date='') {
		if(isset($date['pcmt_id']) && $date['pcmt_id']!=''){
			$id = explode(',', $date['pcmt_id']);
			unset($date['pcmt_id']);
			$this->db->where_in('pcmt_id',$id);
			$this->db->update('prospect_comment', $date);
		} else { 
			$this->db->insert('prospect_comment',$date);
			$id = $this->db->insert_id();
		}
		return $id;
	}

	public function jobs_file_save($date='') {
		if(isset($date['pfile_id']) && $date['pfile_id']!=''){
			$id = explode(',', $date['pfile_id']);
			unset($date['pfile_id']);
			$this->db->where_in('pfile_id',$id);
			$this->db->update('prospect_file', $date);
		} else { 
			$this->db->insert('prospect_file',$date);
			$id = $this->db->insert_id();
		}
		return $id;
	}

	public function get_ljp_jobsView($id='') {
		$this->db->select('p.*,c.contact_name,cty.country_name,pt.prospect_type,s.state,cit.city');
		$this->db->from('prospect as p');
        $this->db->join('contacts as c','c.contact_id=p.client_id','left');
        $this->db->join('country as cty','cty.country_code=p.country_code','left');
        $this->db->join('prospect_type as pt','pt.prospect_type_id=p.prospect_type_id','left');
        $this->db->join('states as s','s.state_code=p.state_code','left');
        $this->db->join('cities as cit','cit.city_id=p.city_id','left');
		$this->db->where('p.prospect_id',$id);
		$datas = $this->db->get()->result_array();
		foreach ($datas as $dk => $_data) {
			$this->db->select('pc.pcmt_id,pc.stage_of_prospect,pc.comment,pc.pcmt_date');
			$this->db->from('prospect_comment as pc');
			$this->db->where('pc.prospect_id',$id);
			$pcdata = $this->db->get()->result_array();
			if(!empty($pcdata)){
				$datas[$dk]['comments']=$pcdata;
			} else {
				$datas[$dk]['comments']=array();
			}
			$this->db->select('pf.pfile_id,pf.pfile_name,pf.documentfile,pf.pfile_date');
			$this->db->from('prospect_file as pf');
			$this->db->where('pf.prospect_id',$id);
			$pfdata = $this->db->get()->result_array();
			if(!empty($pfdata)){
				$datas[$dk]['documentsfile']=$pfdata;
			} else {
				$datas[$dk]['documentsfile']=array();
			}
		}
		return $datas;
	}

	public function sendcontract($date='') {
		if(!empty($date)){
			$this->db->select('p.prospect_id, p.prospect_title, p.client_id,p.user_id, p.phone_type,p.date_of_prospect, c.contact_id, c.contact_name, c.decision_maker_name, c.phone_1, c.email_1, c.user_id as user_ids,u.user_id as uid, u.email, u.phone');
			$this->db->from('prospect as p');
			$this->db->join('contacts as c','c.contact_id=p.client_id','inner');
			$this->db->join('users as u','u.user_id=p.user_id','left');
			$this->db->where('p.prospect_id',$date['id']);
			$this->db->where('p.org_id',$date['org_id']);
			$datas = $this->db->get()->result_array();
			if(!empty($datas)){
				if($datas[0]['uid']<=0){
					$this->db->select('u.email, u.phone');
					$this->db->from('users as u');
					$this->db->where('u.user_id',$date['user_id']);
					$this->db->where('u.org_id',$date['org_id']);
					$datasN = $this->db->get()->result_array();
					if(!empty($datasN)){
						$datas[0]['email'] = $datasN[0]['email'];
						$datas[0]['phone'] = $datasN[0]['phone'];
					}
				}
				$dataNew=array('user_id'=>$date['user_id']);
				if($datas[0]['user_ids']<=0){
					$this->db->where('contact_id',$datas[0]['contact_id']);
					$this->db->update('contacts', $dataNew);
				}
				if($datas[0]['user_id']<=0){
					$datas[0]['user_id'] = $date['user_id'];
					$this->db->where('prospect_id',$datas[0]['prospect_id']);
					$this->db->update('prospect', $dataNew);
				}
				unset($datas[0]['user_ids']);
				unset($datas[0]['contact_id']);
				unset($datas[0]['uid']);
				$_datas = $datas[0];
			} else {
				$_datas = array();
			}
		} else {
			$_datas = array();
		}
		return $_datas;
	}

	public function receivecontract($date='') {
		$this->db->select('p.*');
		$this->db->from('prospect as p');
		$this->db->where('p.prospect_id',$date['id']);
		$pfdata = $this->db->get()->result_array();
		if(!empty($pfdata)){
			if($pfdata[0]['user_id']<=0){
				$pfdata[0]['user_id'] = $this->session->userdata('sales_user_id');
			} 
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
					$rdate['requirement_title']=$_pfdata['prospect_title'];
					$rdate['expected_date_of_closure']=$_pfdata['expected_date'];
					$rdate['cat_id']=$_pfdata['cat_id'];
					$rdate['city_id']=$_pfdata['city_id'];
					$rdate['state_code']=$_pfdata['state_code'];
					$rdate['country_code']=$_pfdata['country_code'];
					$rdate['lead_type']=$_pfdata['lead_type'];
					$rdate['lead_status']=$_pfdata['lead_status'];
					$rdate['prospect_type_id']=$_pfdata['prospect_type_id'];
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
							$rpdDate['requirement_id_y']=$rdDate['requirement_id'];
						} else {
							$this->db->insert('requirement_details',$rdDate);
							$rpdDate['requirement_id_y']= $this->db->insert_id();
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

	public function get_template_sms(){
		$this->db->select('*');
		$this->db->from('dt_message_template');
		$this->db->where('template_type','SMS');


		$result=$this->db->get();

		return $result->result();
	}
	public function get_template_email(){
		$this->db->select('*');
		$this->db->from('dt_message_template');
		$this->db->where('template_type','EMAIL');


		$result=$this->db->get();

		return $result->result();
	}

	public function get_content($template_id){
		$this->db->select('template_content');
		$this->db->from('dt_message_template');
		$this->db->where('message_temaplte_id',$template_id);

		$result=$this->db->get();
		return $result->row()->template_content;
	}

	public function email_save($data){
		$this->db->insert('dt_email_list',$data);
		$result=$this->db->insert_id();

		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function email_verified($job_id){
		$this->db->select('email_id');
		$this->db->from('dt_email_list');
		$this->db->where('job_id',$job_id);
		$res=$this->db->get();
		if($res->num_rows()>0)
			return 1;
		else
			return 0;
	}

	public function verifiedChecking($date='') {
		/*update pospect table*/
		$ndate['is_verified']='Y';
		$this->db->where('prospect_id',$date['job_id']);
		$this->db->update('prospect', $ndate);
		/*check email id already have or not*/
		$this->db->select('email_id');
		$this->db->from('dt_email_list');
		$this->db->where('job_id',$date['job_id']);
		$res=$this->db->get();
		if($res->num_rows()<=0){
			$date['is_sent']='N';
			$this->db->insert('dt_email_list',$date);
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}

	public function jobgoogleurl_save($data='') {
		$this->db->insert('ip_track_url',$data);
        return 1;
	}

	public function jobs_client_save_data($date='') {
		if((isset($date['emailid']) && $date['emailid']!='') || (isset($date['phonenumber']) && $date['phonenumber']!='')){
			$this->db->select('contact_id,email_1,phone_1');
			$this->db->from('contacts');
			if(isset($date['emailid']) && $date['emailid']!='' && isset($date['phonenumber']) && $date['phonenumber']!=''){
				$this->db->where('email_1',$date['emailid']);
				$this->db->or_where('phone_1',$date['phonenumber']);
			} else if(isset($date['emailid']) && $date['emailid']!='' && isset($date['phonenumber']) && $date['phonenumber']==''){
				$this->db->where('email_1',$date['emailid']);
			} else {			
				$this->db->where('phone_1',$date['phonenumber']);
			}
			
			$requirdata = $this->db->get()->result_array();
			if(empty($requirdata)){
				$date['cat_id']='3';
				$date['contract_type']='2';
				$date['mnu_autp']='1';
				$date['type_id']='0';
				$date['phone_1']=$date['phonenumber'];
				$date['email_1']=$date['emailid'];
				unset($date['prospect_id']);
				unset($date['phonenumber']);
				unset($date['emailid']);
				$this->db->insert('contacts',$date);
				return array('contact_id'=>$this->db->insert_id(),'phone_1'=>$date['phone_1'],'email_1'=>$date['email_1']);
			} else {
				return $requirdata[0];
			}
		} else {
			return array('contact_id'=>'','phone_1'=>'','email_1'=>'');
		}
	}
}