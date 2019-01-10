<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Emaildetails extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model('jobs_model');
		modules::run('login/login/is_sales_logged_in');
	}
	public function email_list() {
		$this->load->model('email_model');
		$result = $this->email_model->get_email_list();
		$yesno = array('Y'=>'Yes','N'=>'No');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= date('jS M Y', strtotime($row[2]));
			}
			if($row[3]!=''){
				$row[3]= ucwords($yesno[$row[3]]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($yesno[$row[4]]);
			}
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="'. $row[0] .'"/><label for="checkbox-1-'.intval($row[0]).'"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

     public function email_lists() {
		$this->load->model('email_model');
		$this->load->view('common/sales-top');
		$this->load->view('email/email_list');
		$this->load->view('common/sales-bottom');
	}
	public function email_new(){
		$data['urlname'] = 'Email';
		$data['templates']=$this->jobs_model->get_template_email();
		$this->load->view('common/sales-top');
		$this->load->view('email/email_new',$data);
		$this->load->view('common/sales-bottom');
	}

	public function get_email_content(){
		$template_id=$this->input->post('template_id');

		$result=$this->jobs_model->get_content($template_id);
		$ret_arr=array('result'=>$result);
		echo json_encode($ret_arr);
	}

	function email_save(){
		$data['email_to']=$this->input->post('email_to');
		$data['email_subject']=$this->input->post('email_subject');
		$data['email_content']=$this->input->post('email_content');
		$data['send_by']=$this->input->post('send_by');
		$data['send_at']=date('Y-m-d H:i:s');

		$result=$this->email_model->save_email($data);

		if($result==1){

			

			require FCPATH.'vendor/autoload.php'; // If you're using Composer (recommended)
			
			$email = new \SendGrid\Mail\Mail(); 
			$email->setFrom("aaron.myers@newtonmast.com", "Aaron");
			$email->setSubject($data['email_subject']);
			$email->addTo($data['email_to'], "User");
			$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
			$email->addContent(
			    "text/html", $data['email_content']
			);
			$sendgrid = new \SendGrid('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');
			try {
			    $response = $sendgrid->send($email);
			    // print $response->statusCode() . "\n";
			    // print_r($response->headers());
			    // print $response->body() . "\n";

			    if($response->statusCode()=='202'){
			    	$this->session->set_flashdata('success_message',"Mail Sent successfully");
			    	
			    	redirect("/sales/emaildetails/email_new");
			    }else{
			    	$this->session->set_flashdata('error_message',"Some problem happend");
			    }
			} catch (Exception $e) {
				$this->session->set_flashdata('error_message',"Some problem happend");
			    //echo 'Caught exception: '. $e->getMessage() ."\n";
			}

		}

	}

	public function statistics(){

		$start_date='2018-09-02';
		$end_date='2018-09-06';
		require FCPATH.'vendor/autoload.php'; // If you're using Composer (recommended)
			// comment out the above line if not using Composer
			// require("./sendgrid-php.php"); 
			// If not using Composer, uncomment the above line
			$apiKey = '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';
			$sg = new \SendGrid($apiKey);
			////////////////////////////////////////////////////
			// Retrieve global email statistics #
			// GET /stats #
			$query_params = json_decode('{"aggregated_by": "day", "limit": 1, "start_date": "'.$start_date.'", "end_date": "'.$end_date.'", "offset": 1}');
			try {
			    $response = $sg->client->stats()->get(null, $query_params);
			    // print $response->statusCode() . "\n";
			    // print_r($response->headers());
			    // print $response->body() . "\n";
			   // echo '<pre>';
			   $email_stat=json_decode($response->body());
			   //$email_sent=
			   // echo '<pre>';
			    	//print_r($email_stat);
			   	$data=array();$i=0;
			   	$total_bounce=0;
			   	$total_unique_opens=0;
			   	foreach($email_stat as $stat){
			   		$data['email_stat'][$i]['date']=$stat->date;
			   		$data_date[$i]=$stat->date;
			   		$data['email_stat'][$i]['bounce']=$stat->stats[0]->metrics->bounces;
			   		$total_bounce+=$stat->stats[0]->metrics->bounces;
			   		$data['email_stat'][$i]['unique_opens']=$stat->stats[0]->metrics->unique_opens;
			   		$total_unique_opens+=$stat->stats[0]->metrics->unique_opens;
			   		$data['email_stat'][$i]['opens']=$stat->stats[0]->metrics->opens;

			   		$open_data[$i]=$stat->stats[0]->metrics->unique_opens;//No of opens count for graphs
			   		$i++;
			   	}

			   	$data['email_sent']=$this->email_model->get_email_sent($start_date,$end_date);
			   	$data['custom_email_sent']=$this->email_model->get_custom_email_sent($start_date,$end_date);
			 	$custom_email_sent_datewise=$this->email_model->date_wise_custom_email_sent($start_date,$end_date);
			 	$email_sent_date_wise=$this->email_model->date_wise_email_sent($start_date,$end_date);

			   	$k=0;

			   //	print_r($custom_email_sent_datewise);

			    foreach($custom_email_sent_datewise as $cd){
			    	$data_sent[$k]['date_sent']=$cd->date_sent;
			    	$data_sent[$k]['cnt']=$cd->cnt;
			    	$k++;
			    }
			   // print_r($data_sent);

			    $k=0;

			    foreach($email_sent_date_wise as $cd){
			    	$data_sent_bulk[$k]['date_sent']=$cd->date_sent;
			    	$date_bulk[$k]=$cd->date_sent;
			    	$data_sent_bulk[$k]['cnt']=$cd->cnt;
			    	$k++;
			    }

			     // print_r($data_sent_bulk);
			     // print_r($data_date);
			   // exit();
			    $total_sent=0;

			    /** No of count for sent for graphs*/

			    for($j=0;$j<sizeof($data_date);$j++){
			    	  	echo 'GG'.$k=array_search($data_date[$j],$date_bulk);
			    	  	if($k!=FALSE){
			    	  		$sent_data[$j]=$data_sent_bulk[$k]['cnt'];
			    	  	}else{
			    	  		$sent_data[$j]=0;
			    	  	}		    	    	
			    }
			   // print_r($sent_data);
			   // exit();
			   	//print_r($open_data);
			  $data['sent_data']=$sent_data;
			  $data['open_data']=$open_data;
			  $data['data_date']=$data_date;
			  $data['total_sent']=$total_sent;
			  $data['total_unique_opens']=$total_unique_opens;
			  $data['total_bounce']=$total_bounce;

			} catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		$this->load->view('common/sales-top');
		$this->load->view('email/email_stat',$data);
		$this->load->view('common/sales-bottom');
		$this->load->view('email/chart_js',$data);
	}
}