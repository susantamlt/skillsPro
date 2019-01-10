<?php class Projects_model extends CI_Model
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
			"$tableName2.decision_maker_name",
			"$tableName.no_of_prospect",
			"$tableName.prospect_source",
			"$tableName.prospect_address",
			"$tableName4.state",
			"$tableName.date_of_prospect",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.org_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='0' AND $tableName.is_requirment='N' AND $tableName.pro_job='1'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_Jobs_lista($date='') {
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
			"$tableName2.decision_maker_name",
			"$tableName.no_of_prospect",
			"$tableName.prospect_source",
			"$tableName.prospect_address",
			"$tableName4.state",
			"$tableName.date_of_prospect",
		);
		$indexId     = "$tableName.prospect_id";
		$columnOrder = "$tableName.prospect_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.prospect_type_id=$tableName.prospect_type_id left join $tableName2 on $tableName2.client_id=$tableName.org_id left join $tableName3 on $tableName3.org_id=$tableName.org_id left join $tableName4 on $tableName4.state_code=$tableName.state_code";
		$condition   = "WHERE $tableName.org_id='".$org_id."' AND $tableName.mnu_autp='0' AND $tableName.is_requirment='N' AND $tableName.pro_job='1'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function get_ljp_industry() {
		$this->db->select('*');
		$this->db->from('prospect_type');
		$datas = $this->db->get()->result_array();
		$dataIndustry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataIndustry[$_data['prospect_type_id']] = $_data['prospect_type'];
		endforeach;
		return $dataIndustry;
	}

	public function get_ljp_country() {
		$this->db->select('country_code,country_name');
		$this->db->from('country');
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCountry[$_data['country_code']] = $_data['country_name'];
		endforeach;
		return $dataCountry;
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
			$ValArray = explode(',', $_data['cat_id']);
			foreach ($ValArray as $vk => $vAv) {
				$dataState[$vAv] = $leadcat[$vAv];
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

	public function projects_save($date='') {
		if(isset($date['prospect_id']) && $date['prospect_id']!=''){
			$id = $date['prospect_id'];
			unset($date['prospect_id']);
			$this->db->where('prospect_id',$id);
			$this->db->update('prospect', $date);
		} else {
			$this->db->insert('prospect',$date);
			$id = $this->db->insert_id();
		}
	}

	public function projects_comment_save($date='') {
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

	public function projects_file_save($date='') {
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