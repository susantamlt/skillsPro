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
	function __construct()
	{
		parent::__construct();
    }
    public function twitterget() {
    	$data = $this->input->post();
    	/** POST fields required by the URL above. See relevant docs as above **/
		$postfields = array(
			'screen_name' => 'ANUPAM_ROY',
			'q'=>'#Java',
			'result_type'=>'recent',
			'skip_status' => '1'
		);
		$settings = array(
			'oauth_access_token' => "112361998-ONiXvDZ3vk6mkwg28HKKlJbyx2zYbAbIjh37rT0h",
			'oauth_access_token_secret' => "xYa8jmmUEFLFlp2rRy74BzkkywlppFWFFyBExqTBc2BxW",
			'consumer_key' => "nL5xCAYq9nEvbAbjKR4RKc72e",
			'consumer_secret' => "mTOeBxk8HtAHc5lZ3mIo7DKVoXlPC5AWDHM3sJhVooaJECVsYw"
		);

		/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
		$url = 'https://api.twitter.com/1.1/blocks/create.json';
		$requestMethod = 'POST';
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q=#Java&result_type=recent';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		echo $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
    }
}
