<?php defined("BASEPATH") OR exit("No direct script access allowed");
class Country extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load("data");
	}
	
	public function statelist() {
		$this->load->model("country_model");
		$data = $this->input->post();
		$result = $this->country_model->statelist($data);
		if(!empty($result) && count($result)>1){
			$_data["status"] = 1;
			$_data["state"] = $result;
		} else {
			$_data["status"] = 0;
			$_data["state"] = "";
		}
		echo json_encode($_data);
	}
	
	public function citylist() {
		$this->load->model("country_model");
		$data = $this->input->post();
		$result = $this->country_model->citylist($data);
		if(!empty($result) && count($result)>1){
			$_data["status"] = 1;
			$_data["city"] = $result;
		} else {
			$_data["status"] = 0;
			$_data["city"] = "";
		}
		echo json_encode($_data);
	}
	
	public function ziplist() {
		$this->load->model("country_model");
		$data = $this->input->post();
		$result = $this->country_model->ziplist($data);
		if(!empty($result) && count($result)>1){
			$_data["status"] = 1;
			$_data["zip"] = $result;
		} else {
			$_data["status"] = 0;
			$_data["zip"] = "";
		}
		echo json_encode($_data);
	}

	public function statecity() {
		$cdk='[{"url": "https://logan.craigslist.org", "state": "UT", "city": "logan"}, {"url": "https://longisland.craigslist.org", "state": "NY", "city": "long island"}, {"url": "https://losangeles.craigslist.org", "state": "", "city": "los angeles"},{"url": "https://louisville.craigslist.org", "state": "KY", "city": "louisville"}, {"url": "https://lubbock.craigslist.org", "state": "TX", "city": "lubbock"}, {"url": "https://lynchburg.craigslist.org", "state": "VA", "city": "lynchburg"}, {"url": "https://macon.craigslist.org", "state": "", "city": "macon / warner robins"}, {"url": "https://madison.craigslist.org", "state": "WI", "city": "madison"}, {"url": "https://maine.craigslist.org", "state": "", "city": "maine"}, {"url": "https://ksu.craigslist.org", "state": "KS", "city": "manhattan"}, {"url": "https://mankato.craigslist.org", "state": "MN", "city": "mankato"}, {"url": "https://mansfield.craigslist.org", "state": "OH", "city": "mansfield"}, {"url": "https://masoncity.craigslist.org", "state": "IA", "city": "mason city"}, {"url": "https://mattoon.craigslist.org", "state": "", "city": "mattoon-charleston"}, {"url": "https://mcallen.craigslist.org", "state": "", "city": "mcallen / edinburg"}, {"url": "https://meadville.craigslist.org", "state": "PA", "city": "meadville"}, {"url": "https://medford.craigslist.org", "state": "", "city": "medford-ashland"}, {"url": "https://memphis.craigslist.org", "state": "TN", "city": "memphis"}, {"url": "https://mendocino.craigslist.org", "state": "", "city": "mendocino county"}, {"url": "https://merced.craigslist.org", "state": "CA", "city": "merced"}, {"url": "https://meridian.craigslist.org", "state": "MS", "city": "meridian"}, {"url": "https://milwaukee.craigslist.org", "state": "WI", "city": "milwaukee"}, {"url": "https://minneapolis.craigslist.org", "state": "", "city": "minneapolis / st paul"}, {"url": "https://missoula.craigslist.org", "state": "MT", "city": "missoula"}, {"url": "https://mobile.craigslist.org", "state": "AL", "city": "mobile"}, {"url": "https://modesto.craigslist.org", "state": "CA", "city": "modesto"}, {"url": "https://mohave.craigslist.org", "state": "", "city": "mohave county"}, {"url": "https://monroe.craigslist.org", "state": "LA", "city": "monroe"}, {"url": "https://monroemi.craigslist.org", "state": "MI", "city": "monroe"}, {"url": "https://monterey.craigslist.org", "state": "", "city": "monterey bay"}, {"url": "https://montgomery.craigslist.org", "state": "AL", "city": "montgomery"}, {"url": "https://morgantown.craigslist.org", "state": "WV", "city": "morgantown"}, {"url": "https://moseslake.craigslist.org", "state": "WA", "city": "moses lake"}, {"url": "https://muncie.craigslist.org", "state": "", "city": "muncie / anderson"}, {"url": "https://muskegon.craigslist.org", "state": "MI", "city": "muskegon"}, {"url": "https://myrtlebeach.craigslist.org", "state": "SC", "city": "myrtle beach"}, {"url": "https://nashville.craigslist.org", "state": "TN", "city": "nashville"}, {"url": "https://nh.craigslist.org", "state": "", "city": "new hampshire"}, {"url": "https://newhaven.craigslist.org", "state": "CT", "city": "new haven"}, {"url": "https://neworleans.craigslist.org", "state": "", "city": "new orleans"}, {"url": "https://blacksburg.craigslist.org", "state": "", "city": "new river valley"}, {"url": "https://newyork.craigslist.org", "state": "", "city": "new york city"}, {"url": "https://norfolk.craigslist.org", "state": "", "city": "norfolk / hampton roads"}]';
		$_jsons = json_decode($cdk, true);
		foreach ($_jsons as $key => $value) {
			$this->load->model("country_model");
			$result = $this->country_model->gatstatecity($value);
			$result['city'] = $value['city'];
			$result['url'] = $value['url'];
			$_result = $this->country_model->saveStateCity($result);			
		}
	}
}
