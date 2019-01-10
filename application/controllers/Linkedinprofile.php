<?php defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH.'libraries/Linkedin.php');
class Linkedinprofile extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
        $this->load->library('Linkedin');
        $this->load->library('session');
        $this->session->userdata('linkedin');
		$this->lang->load('data');
	}

	public function index() {
		# code...
	}

	public function resume() {
		// OAuth 2 Control Flow
        if (isset($_GET['error'])) {
            // LinkedIn returned an error
            // load any error view here
            exit;
        } elseif (isset($_GET['code'])) {
            // User authorized your application
            if ($_SESSION['state'] == $_GET['state']) {
                // Get token so you can make API calls
                $this->linkedin->getAccessToken();
                /*$linkedin = new Linkedin();
                $linkedin->getAccessToken();*/
            } else {

                // CSRF attack? Or did you mix up your states?
                exit;
            }
        } else {
            if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
                // Token has expired, clear the state
                $_SESSION = array();
            }
            if (empty($_SESSION['access_token'])) {
                // Start authorization process
                $this->linkedin->getAuthorizationCode();
                /*$linkedin = new Linkedin();
                $linkedin->getAuthorizationCode();*/
            }
        }
        // define the array of profile fields
        $profile_fileds = array(
            'id',
            'firstName',
            'maiden-name',
            'lastName',
            'picture-url',
            'email-address',
            'location:(country:(code))',
            'industry',
            'summary',
            'specialties',
            'interests',
            'public-profile-url',
            'last-modified-timestamp',
            'num-recommenders',
            'date-of-birth',
        );
        $profileData = $this->linkedin->fetch('GET', '/v1/people/~:(' . implode(',', $profile_fileds) . ')');
        if ($profileData) {
        	echo "<pre>";
        	print_r($profileData);exit();
          $this->session->set_userdata("profile_session",$profileData);
        } else {
           // linked return an empty array of profile data
        }
	}
}