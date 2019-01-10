<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Feedack extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('feedack_model','feedack');
	}

	public function unsubscribe($id='') {
		if($id!=''){
			$result = $this->feedack->unsubscribe($id);
			echo "Thank You for unsubscribe";
		} else {
			echo "Thank You for unsubscribe";
		}
	}
}