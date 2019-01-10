<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/Indeedapi.php');
require_once(APPPATH.'libraries/DomParser.php');
class Requirements extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('requirements_model');
		modules::run('login/login/is_recruiter_logged_in');
	}

	public function index() {
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/list');
		$this->load->view('common/recruiter-bottom');
	}

	public function requirements_list() {
		$this->load->model('requirements_model');
		$result = $this->requirements_model->get_requirements_list();
		$aaData = array();
		$status = array('FU'=>'Full Filled','PF'=>'Partially Filled','VA'=>'Vacant');
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}
			if($row[7]!=''){
				$row[7]= ucwords($status[$row[7]]);
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('recruiter/requirements/requirements_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('recruiter/requirements/requirements_assign/').$row[0].'" title="Assign Sourcing Team" data-toggle="tooltip"><i class="glyphicon glyphicon-plus" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function requirements_edit($id="") {
		$this->load->view('common/recruiter-top');
		$this->load->view('leads/leadsedit');
		$this->load->view('common/recruiter-bottom');
	}

	public function requirements_view($id="") {
		$this->load->model('requirements_model');
		$data['requirement'] = $this->requirements_model->requirements_view($id);
		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/requirements-view',$data);
		$this->load->view('common/recruiter-bottom');
	}

	public function requirements_assign($id="") {
		$this->load->model('requirements_model');
		if($id > 0){
			$data['user'] = $this->requirements_model->requirements_assaign($id);
			$data['sdata'] = $this->requirements_model->requirements_assaignView($id);
			$data['id'] = $id;
			$this->load->view('common/recruiter-top');
			$this->load->view('requirements/requirements_assign',$data);
			$this->load->view('common/recruiter-bottom');
		} else {
			$this->load->view('common/recruiter-top');
			$this->load->view('common/recruiter-bottom');
		}
	}

	public function requirements_assigns($id="") {
		$this->load->model('requirements_model');
	    $result = $this->requirements_model->requirements_assigns();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= date('jS M Y', strtotime($row[6]));
			}
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function requirements_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->requirements_model->requirements_save($data);
			$_data['status']=1;
			$_data['msg']='Successful';
		} else {
			$_data['status']=0;
			$_data['msg']='Failure';
		}
		echo json_encode($_data);
	}

	public function source_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$return = $this->requirements_model->source_save($data);
			if($return==1){
				$_data['status']=0;
				$_data['msg']='Please provied source user id';
			} else if($return==2){
				$_data['status']=0;
				$_data['msg']='Please provied organization id';
			} else if($return==3){
				$_data['status']=0;
				$_data['msg']='Please provied requirement id';
			} else if($return==4){
				$_data['status']=0;
				$_data['msg']='Already assign';
			} else if($return==5){
				$_data['status']=1;
				$_data['msg']='The data update successfully';
			} else {
				$_data['status']=1;
				$_data['msg']='The data insert successfully';
			}
		} else {
			$_data['status']=0;
			$_data['msg']='Please provied source user id, organization id, requirement id';
		}
		echo json_encode($_data);
	}

	public function requirements_contractors() {
		$data = $this->input->post();
		$aaData = array();
		if((isset($data['keywordsc']) && $data['keywordsc']!='') || (isset($data['locationc']) && $data['locationc']!='')){
			$this->load->model('requirements_model');
			$result = $this->requirements_model->get_requirements_craigslist($data);
			foreach ($result['aaData'] as $row) {
				$row[1]= ucwords($row[1]);
				$row[2]= strtoupper($row[2]);
				$row[3]= ucwords($row[3]);
				$row[4] = '<a href="'.base_url('recruiter/requirements/requirements_detailsC/').$row[0].'/'.$data['requirement_id'].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>';
				$row[0] = '<input type="checkbox" id="checkbox-1-' . $row[0]. '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . $row[0] . '"></label>';
				$aaData[] = $row;
			}
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	/*public function requirements_contractors() {
		$data = $this->input->post();
		$sEcho =1;
		if(isset($data['prospect_type']) && $data['prospect_type']!='' && isset($data['country_name']) && $data['country_name']!='' && isset($data['state']) && $data['state']!='' && isset($data['city']) && $data['city']!=''){
			$client = new Indeedapi("7778623931867371");
			$address = $data['city'].','.$data['state'];
			$params = array(
				'fields'=>'resumeKey',
				'pretty'=>'1',
				"radius" => '50',
				"q" => $data['prospect_type'],
				"l" => $address,
				"start"=>$data['iDisplayStart'],
				"limit"=>$data['iDisplayLength'],
				"co"=>"US"
			);
			$results = $client->resumes($params);
			if(isset($results['meta']['paging']['total']) ){
				$TotalRecords = $results['meta']['paging']['total'];
			} else {
				$TotalRecords = 0;
			}
			if(!empty($results['data']['resumes'])){
				$aaData = array();
				$_rk1 = 1;
				$row = array();
				foreach ($results['data']['resumes'] as $rk => $rData) {
					$rData['url'] = str_replace("'", '`', $rData['url']);
					$name =explode('/', $rData['url']);
					$row[1]= ucwords(str_replace('-', ' ', $name[2]));
					$row[2]= strtoupper($rData['resumeKey']);
					$row[3]= $rData['url'];
					$row[4] = '<a href="'.base_url('recruiter/requirements/requirements_details').$rData['url'].'/'.$data['requirement_id'].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>';
					$row[0] = '<input type="checkbox" id="checkbox-1-' . $_rk1. '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $_rk1 . '"/><label for="checkbox-1-' . $_rk1 . '"></label>';
					$aaData[] = $row;
				}
				$_data = array('sEcho'=>(int)$data['sEcho'],'iTotalRecords'=>$TotalRecords,'iTotalDisplayRecords'=>$TotalRecords,'aaData'=>$aaData);
			} else {
				$_data = array('sEcho'=>'1','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
			}
		} else {
			$_data = array('sEcho'=>'1','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
		}
		print_r(json_encode($_data));
	}*/

	public function requirements_contractors_manually() {
		$data = $this->input->post();
		$sEcho =1;
		if(isset($data['keywords']) && $data['keywords']!='' && isset($data['location']) && $data['location']!='' && isset($data['radius']) && $data['radius']!=''){
			$client = new Indeedapi("7778623931867371");
			$months=array('1-'=>'1-11','1'=>'12-24','2'=>'12-24','3'=>'25-60','4'=>'25-60','5'=>'25-60','5'=>'25-60','6'=>'61-120','7'=>'61-120','8'=>'61-120','8'=>'61-120','10'=>'61-120','10+'=>'121');
			$params = array(
				'fields'=>'resumeKey',
				"radius" => $data['radius'],
				"q" => $data['keywords'],
				"l" => $data['location'],
				'cb'=>'skills',
				'rsrdr'=>'1',
				"start"=>$data['iDisplayStart'],
				"limit"=>$data['iDisplayLength'],
				"co"=>"US"
			);
			if(isset($data['experience']) && $data['experience']!=''){
				$params['rb'] = 'yoe '.$months[$data['experience']];
			}
			$results = $client->resumes($params);
			if(isset($results['meta']['paging']['total']) ){
				$TotalRecords = $results['meta']['paging']['total'];
			} else {
				$TotalRecords = 0;
			}
			if(!empty($results['data']['resumes'])){
				$aaData = array();
				$_rk1 = 1;
				$row = array();
				foreach ($results['data']['resumes'] as $rk => $rData) {
					$rData['url'] = str_replace("'", '`', $rData['url']);
					$name =explode('/', $rData['url']);
					$row[1]= ucwords(str_replace('-', ' ', $name[2]));
					$row[2]= strtoupper($rData['resumeKey']);
					$row[3]= $rData['url'];
					$row[4] = '<a href="'.base_url('recruiter/requirements/requirements_details').$rData['url'].'/'.$data['requirement_id'].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>';
					$row[0] = '<input type="checkbox" id="checkbox-1-' . $_rk1. '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $_rk1 . '"/><label for="checkbox-1-' . $_rk1 . '"></label>';
					$aaData[] = $row;
					$_data = array('sEcho'=>(int)$data['sEcho'],'iTotalRecords'=>$TotalRecords,'iTotalDisplayRecords'=>$TotalRecords,'aaData'=>$aaData);
				}
			} else {
				$_data = array('sEcho'=>'1','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
			}
		} else {
			$_data = array('sEcho'=>'1','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
		}
		print_r(json_encode($_data));
	}

	public function requirements_details($r='',$name='',$resumeKey='',$id='') {
		$this->load->model('requirements_model');
		$url = "https://www.indeed.com/$r/$name/$resumeKey?sp=0";
		//$url = "https://resumes.indeed.com/resume/$resumeKey?rsrdr=1";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_REFERER, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$str = curl_exec($curl);
		curl_close($curl);
		// Create a DOM object
		$html_base = new simple_html_dom();
		// Load HTML from a string
		$html_base->load($str);
		$data['data']['name'] = str_replace('-', ' ', str_replace("'", '`',$name));
		$data['data']['requirement_id'] = $id;
		$data['data']['resumeKey'] = strtoupper($resumeKey);
		$type = $html_base->find('h1#resume-contact');
		if(!empty($type)){
			$data['data']['type'] = $type[0]->innertext;
		} else {
			$data['data']['type'] = '';
		}
		$location = $html_base->find('p#headline_location');
		if(!empty($location)){
			$data['data']['location'] = $location[0]->innertext;
		} else {
			$data['data']['location'] = '';
		}
		$descriptionnNew = $html_base->find('div#resume');
		//$data['data']['descriptionnNew']=$descriptionnNew[0]->innerhtml;
		if(!empty($html_base->find('div#resume div#resume_body div.work-experience-section'))){
			$i=0;
			foreach ($html_base->find('div#resume div#resume_body div.work-experience-section') as $work) {
				if(!empty($work->find('div.data_display p.work_title'))){
					$workexp1 = $work->find('div.data_display p.work_title');
					$data['data']['work_experience'][$i]['title'] = $workexp1[0]->innertext;
				} else {
					$data['data']['work_experience'][$i]['title'] = '';
				}
				if(!empty($work->find('div.data_display div.work_company span'))){
					$workexp2 = $work->find('div.data_display div.work_company span');
					$data['data']['work_experience'][$i]['work_company'] = $workexp2[0]->innertext;
				} else {
					$data['data']['work_experience'][$i]['work_company'] = '';
				}
				if(!empty($work->find('div.data_display p.work_dates'))){
					$workexp3 = $work->find('div.data_display p.work_dates');
					$data['data']['work_experience'][$i]['work_dates'] = $workexp3[0]->innertext;
				} else {
					$data['data']['work_experience'][$i]['work_dates'] = '';
				}
				if(!empty($work->find('div.data_display p.work_description'))){
					$workexp4 = $work->find('div.data_display p.work_description');
					$data['data']['work_experience'][$i]['work_description'] = $workexp4[0]->innertext;
				} else {
					$data['data']['work_experience'][$i]['work_description'] = '';
				}
				$i++;
			}
		} else {
			$data['data']['work_experience']=array();
		}

		if(!empty($html_base->find('div#resume div#resume_body div.education-section'))){
			$j=0;
			foreach ($html_base->find('div#resume div#resume_body div.education-section') as $school) {
				if(!empty($school->find('div.data_display div.edu_school span'))){
					$school1 = $school->find('div.data_display div.edu_school span');
					$data['data']['education_section'][$j]['name'] = $school1[0]->innertext;
				} else if(!empty($school->find('div.data_display p'))){
					$school1 = $school->find('div.data_display p');
					$data['data']['education_section'][$j]['name'] = $school1[0]->innertext;
				} else {
					$data['data']['education_section'][$j]['name'] = '';
				}
				if(!empty($school->find('div.data_display div.edu_school div.inline-block span'))){
					$school2 = $school->find('div.data_display div.edu_school div.inline-block span');
					$data['data']['education_section'][$j]['location'] = $school2[0]->innertext;
				} else {
					$data['data']['education_section'][$j]['location'] = '';
				}
				
				$j++;
			}
		} else {
			$data['data']['education_section']=array();
		}

		if(!empty($html_base->find('div#resume div#resume_body div#skills-items div.data_display div.skill-container span.skill-text'))){
			$h=0;
			foreach ($html_base->find('div#resume div#resume_body div#skills-items div.data_display div.skill-container span.skill-text') as $skillContainer) {
				$data['data']['skills'][$h]['textnew'] = $skillContainer->innertext;
				$h++;
			}
		} else {
			$data['data']['skills']=array();
		}
		if(!empty($html_base->find('div#resume div#resume_body div#additionalinfo-section'))){
			$m=0;
			foreach ($html_base->find('div#resume div#resume_body div#additionalinfo-section') as $additionalinfo) {
				if(!empty($additionalinfo->find('div.data_display p'))){
					$additionalinfo1 = $additionalinfo->find('div.data_display p');
					$data['data']['additionalinfo'][$m]['textnew'] = $additionalinfo1[0]->innertext;
				} 
				$m++;
			}
		} else {
			$data['data']['additionalinfo']=array();
		}
		if(!empty($html_base->find('div#resume div#resume_body div.certification-section'))){
			$k=0;
			foreach ($html_base->find('div#resume div#resume_body div.certification-section') as $certification) {
				if(!empty($certification->find('div.data_display p.certification_title'))){
					$certification1 = $certification->find('div.data_display p.certification_title');
					$data['data']['certification'][$k]['title'] = $certification1[0]->innertext;
				} else {
					$data['data']['certification'][$k]['title'] = '';
				}				
				if(!empty($certification->find('div.data_display p.certification_date'))){
					$certification2 = $certification->find('div.data_display p.certification_date');
					$data['data']['certification'][$k]['date'] = $certification2[0]->innertext;
				} else {
					$data['data']['certification'][$k]['date'] = '';
				}
				if(!empty($certification->find('div.data_display p.certification_date'))){
					$certification3 = $certification->find('div.data_display p.certification_date');
					$data['data']['certification'][$k]['description'] = $certification3[0]->innertext;
				} else {
					$data['data']['certification'][$k]['description'] = '';
				}
				$k++;
			}
		} else {
			$data['data']['certification']=array();
		}

		$this->load->view('common/recruiter-top');
		$this->load->view('requirements/contracterDetails',$data);
		$this->load->view('common/recruiter-bottom');
	}

	public function requirements_detailsC($id='',$rid='') {
		$this->load->model('requirements_model');
		$result = $this->requirements_model->get_requirements_craigslist_Details($id,$rid);
		if(!empty($result)){
			$result[0]['requirement_id']=$rid;
			$data['data']=$result[0];
			$this->load->view('common/recruiter-top');
			$this->load->view('requirements/contracterDetailsCraigslist',$data);
			$this->load->view('common/recruiter-bottom');
		} else {
			$this->load->view('common/recruiter-top');
			$this->load->view('common/recruiter-bottom');
		}
	}

	public function contracter_save_data($value='') {
		$this->load->model('requirements_model');
		$data = $this->input->post();
		if(!empty($data)){
			$requirement = $this->requirements_model->requirements_details($data['requirement_id']);
			$newData = array('requirement_id'=>$data['requirement_id'],'org_id'=>$data['org_id'],'user_id'=>$data['user_id'],'contractor_id'=>'','pc_status'=>'0');
			$data['prospect_type_id'] = $requirement[0]['prospect_type_id'];
			$data['address'] = $data['location'];
			$data['cons_date'] = date('Y-m-d H:i:s');
			unset($data['requirement_id']);
			$newData['contractor_id'] = $this->requirements_model->contracter_save_data($data);
			$requirement1 = $this->requirements_model->contracter_save_requirement($newData);
			if($requirement1==1){
				$jarray = array('status'=>1,'msg'=>'Successful');
			} else {
				$jarray = array('status'=>1,'msg'=>'Already Assign');
			}
		} else {
			$jarray = array('status'=>0,'msg'=>'Failure');
		}
		echo json_encode($jarray);
	}
}