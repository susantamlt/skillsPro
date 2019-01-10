<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google extends CI_Controller
{
	private $connection;
	
	/**
	 * Controller constructor
	 */
	function __construct() {
		parent::__construct();
    }
    public function googleget() {
	    $query = 'Nikita%20Platonenko';
	    $url= "https://www.googleapis.com/customsearch/v1?key=AIzaSyBAMziFlml2YhzC6-ezdO9P2u7VoPAlcHU&cx=001900497981181419609:6zgjd3ktuba&q=Joydeep";
		//$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query;

		$body = file_get_contents($url);
		$json = json_decode($body);
		echo "<pre>";
		print_r($json);
		exit();
		for($x=0;$x<count($json->responseData->results);$x++){
			echo "<b>Result ".($x+1)."</b>";
			echo "<br>URL: ";
			echo $json->responseData->results[$x]->url;
			echo "<br>VisibleURL: ";
			echo $json->responseData->results[$x]->visibleUrl;
			echo "<br>Title: ";
			echo $json->responseData->results[$x]->title;
			echo "<br>Content: ";
			echo $json->responseData->results[$x]->content;
			echo "<br><br>";
		}
	}
}