<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/TwitterAPIExchange.php');
class Twitter extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('requirements_model','requirements');
		modules::run('login/login/is_recruiter_logged_in');
	}

    public function twitterget() {
    	$data = $this->input->post();
    	if(isset($data['keywordsT']) && $data['keywordsT']!='' && isset($data['locationT']) && $data['locationT']!=''){
	    	/** POST fields required by the URL above. See relevant docs as above **/
	    	$settings = array(
				'oauth_access_token' => "112361998-ONiXvDZ3vk6mkwg28HKKlJbyx2zYbAbIjh37rT0h",
				'oauth_access_token_secret' => "xYa8jmmUEFLFlp2rRy74BzkkywlppFWFFyBExqTBc2BxW",
				'consumer_key' => "nL5xCAYq9nEvbAbjKR4RKc72e",
				'consumer_secret' => "mTOeBxk8HtAHc5lZ3mIo7DKVoXlPC5AWDHM3sJhVooaJECVsYw"
			);
			$url = 'https://api.twitter.com/1.1/users/search.json';

			$totalCountN = array();
			for ($j=1; $j <= 50; $j++) {
				$getfield1 = "?q=#".$data['keywordsT']."&full_name=".$data['locationT']."&country_code=US&count=".$data['iDisplayLength']."&page=$j";
				$requestMethod1 = 'GET';

				$twitterCount = new TwitterAPIExchange($settings);
				$_newtwitterCount = $twitterCount->setGetfield($getfield1)->buildOauth($url, $requestMethod1)->performRequest();
				$newtwitterCount = json_decode($_newtwitterCount);
				if(!empty($newtwitterCount)){
					$totalCountN[]= count($newtwitterCount);
				} else {
					$totalCountN[]= 0;
				}
			}
			$totalCount = array_sum($totalCountN);

			$t=1;
			for ($h=0; $h < $totalCount; $h+=25) { 
				$pageNumber[$h] = $t++;
			}
			$getfield = "?q=#".$data['keywordsT']."&full_name=".$data['locationT']."&country_code=US&count=".$data['iDisplayLength']."&page=".$pageNumber[$data['iDisplayStart']]."";

			$requestMethod = 'GET';

			$twitter = new TwitterAPIExchange($settings);
			$_newtwitter = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
			$newtwitter = json_decode($_newtwitter);
			if(!empty($newtwitter)){
				$aaData = array();
				$_rk1 = 1;
				$row = array();
				$i=0;
				foreach ($newtwitter as $rk => $rData) {
					$row[1]= ucwords(str_replace('-', ' ', $rData->name));
					$row[2]= strtoupper('T'.$rData->id);
					$row[3] = $rData->description;
					$row[4]=$rData->location;
					$row[5] = '<a href="'.base_url('recruiter/requirements/requirements_details/').'T'.$rData->id.'/'.$data['requirement_id'].'" title="View Record" data-toggle="tooltip" onclick="return !window.open(this.href)"><i class="glyphicon glyphicon-eye-open" ></i></a>';
					$row[0] = '<input type="checkbox" id="checkbox-1-' . $_rk1. '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $_rk1 . '"/><label for="checkbox-1-' . $_rk1 . '"></label>';
					$aaData[] = $row;
					$i++;
				}
				$_data = array('sEcho'=>(int)$data['sEcho'],'iTotalRecords'=>$i,'iTotalDisplayRecords'=>$i,'aaData'=>$aaData);
			} else {
				$_data = array('sEcho'=>'1','iTotalRecords'=>$totalCount,'iTotalDisplayRecords'=>$totalCount,'aaData'=>array());
			}
		} else {
			$_data = array('sEcho'=>'1','iTotalRecords'=>'0','iTotalDisplayRecords'=>'0','aaData'=>array());
		}

		print_r(json_encode($_data));
    }
}