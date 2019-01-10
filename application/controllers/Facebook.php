<?php


require_once(APPPATH.'libraries/Facebook.php');
class Facebooks extends CI_Controller
{
	/**
	 * Controller constructor
	 */
	function __construct()
	{
		parent::__construct();
    }
	/**
	 * TwitterOauth class instance.
	 */
	private $connection;
	public function Search(){
		$facebook = new Facebook(array(
		    'appId' => '672796029728409',
		    'secret' => 'faadb6a426411ba2ba7af700f723c5df',
		));

		$q = "job" ;

		$search = $facebook->api('/search?q='.$q.'&type=post&limit=10');

		foreach ($search as $key=>$value) {
		    foreach ($value as $fkey=>$fvalue) {
		        print_r ($fvalue);
		    }
		}
	}
}
?>