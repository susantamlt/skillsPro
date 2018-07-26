<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/Indeedapi.php');
class Indeed extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$client = new Indeedapi("444214432879792");
		$params = array(
			"q" => "Landscaper",
			"l" => "New York",
			"userip" => "1.2.3.4",
			"useragent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2)",
			'start' => 1,
			'limit' => 100,
			'co'=>'US'
		);

		$results = $client->search($params);
		echo "<pre>";
		print_r($results);
	}

	public function jobDetails() {
		$client = new Indeedapi("444214432879792");
		$params = array(
			"jobkeys" => array("03faa3d023a385db"),
		);

		$results = $client->jobs($params);
		echo "<pre>";
		print_r($results);
	}

	public function resumes() {
		$client = new Indeedapi("444214432879792");
		$params = array(
			'fields'=>'resumeKey',
			'client_id'=>'f079a2c684583c83b36adebf828f0b2b0bcbb2940a3fd2371209b26102fe5277',
			'pretty'=>'1',
			"radius" => '50',
			"q" => "Landscaper",
			"l" => "New York",
			'start' => 1,
			'limit' => 100
		);
		$results = $client->resumes($params);

		echo "<pre>";
		print_r($results);
	}

	public function resume() {
		$client = new Indeedapi("444214432879792");
		$params = array(
			'resumeKey'=>'71e412714849163f',
			'client_id'=>'f079a2c684583c83b36adebf828f0b2b0bcbb2940a3fd2371209b26102fe5277',
			"q" => "Landscaper",
			"l" => "New York",
		);
		$results = $client->resumes($params);

		echo "<pre>";
		print_r($results['data']);
	}
}