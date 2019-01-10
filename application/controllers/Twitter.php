<?php
/**
 * Twitter OAuth library.
 * Sample controller.
 * Requirements: enabled Session library, enabled URL helper
 * Please note that this sample controller is just an example of how you can use the library.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/TwitterAPIExchange.php');
class Twitter extends CI_Controller
{
	/**
	 * TwitterOauth class instance.
	 */
	private $connection;
	
	/**
	 * Controller constructor
	 */
	function __construct() {
		parent::__construct();
    }

    public function twitterget() {
    	$data = $this->input->post();
		$settings = array(
				'oauth_access_token' => "112361998-ONiXvDZ3vk6mkwg28HKKlJbyx2zYbAbIjh37rT0h",
				'oauth_access_token_secret' => "xYa8jmmUEFLFlp2rRy74BzkkywlppFWFFyBExqTBc2BxW",
				'consumer_key' => "nL5xCAYq9nEvbAbjKR4RKc72e",
				'consumer_secret' => "mTOeBxk8HtAHc5lZ3mIo7DKVoXlPC5AWDHM3sJhVooaJECVsYw"
			);
			$url = 'https://api.twitter.com/1.1/users/search.json';
			$getfield = "?q=#carpenter&full_name=birmingham,al&country_code=US&count=1000&page=3";
			$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$newtwitter = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
		echo "<pre>";
		print_r(json_decode($newtwitter));
    }
}
