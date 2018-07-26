<?php class Login_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function login($data='') {
		$result_ary = array();
		if(!empty($data)){
			//$conditions = array('email'=>$data["emailid"],'password'=>md5($data["password"]),'type'=>$data["type"]);
			$conditions = array('email'=>$data["emailid"],'password'=>md5($data["password"]));
			$this->db->select('*');
        	$this->db->where($conditions);
        	$login = $this->db->get('users');
        	$row = $login->row_array();
        	if($login->num_rows()>0 ) {
        		if(!in_array($row['status'], array('0','4'))){
					$result_ary['status'] = 'success';
					$result_ary['msg'] = 'Logged in successfully';
					$result_ary['user_type'] = $row['type'];
					$loggedin_data = $this->get_logged_user_data($row);
					$this->session->set_userdata($loggedin_data);
				} else if($row['status']==0) {
					$result_ary['status'] = 'blocked';
					$result_ary['msg'] = 'Profile is Blocked';
				} else if($row['status']==4) {
					$result_ary['status'] = 'deleted';
					$result_ary['msg'] = 'Profile is Deleted';
				}
        	} else {
				$result_ary['status'] = 'failure';
				$result_ary['msg'] = 'Login failed. Please try again later';
        	}
		} else {
			$result_ary['status'] = 'failure';
			$result_ary['msg'] = 'Login failed. Please try again later';
		}
		return $result_ary;
	}

	public function logout($id='') {
		$logintime = array('last_login' => date('Y-m-d H:i:s'));
		if($id != '') {
			$this->db->where('user_id', $id);
			$this->db->update('users', $logintime);
		}
	}

	function get_logged_user_data($row){
        if($row['type']==2){
            $loggedin_data['is_sales_logged_in'] = TRUE;
            $loggedin_data['sales_user_id'] = $row['user_id'];
            $loggedin_data['sales_org_id'] = $row['org_id'];
            $loggedin_data['sales_user_name'] = $row['user_name'];
            $loggedin_data['sales_email'] = $row['email'];
            $loggedin_data['sales_phone'] = $row['phone'];
            $loggedin_data['sales_image'] = $row['image'];
            $loggedin_data['sales_type'] = $row['type'];
            $loggedin_data['sales_role_id'] = $row['role_id'];
            $loggedin_data['sales_user_code'] = $row['user_code'];
            $loggedin_data['sales_last_login'] = $row['last_login'];
        }elseif($row['type']==3){
            $loggedin_data['is_recruiter_logged_in'] = TRUE;
            $loggedin_data['recruiter_user_id'] = $row['user_id'];
            $loggedin_data['recruiter_org_id'] = $row['org_id'];
            $loggedin_data['recruiter_user_name'] = $row['user_name'];
            $loggedin_data['recruiter_email'] = $row['email'];
            $loggedin_data['recruiter_phone'] = $row['phone'];
            $loggedin_data['recruiter_image'] = $row['image'];
            $loggedin_data['recruiter_type'] = $row['type'];
            $loggedin_data['recruiter_role_id'] = $row['role_id'];
            $loggedin_data['recruiter_user_code'] = $row['user_code'];
            $loggedin_data['recruiter_last_login'] = $row['last_login'];
        }elseif($row['type']==4){
            $loggedin_data['is_performance_logged_in'] = TRUE;
            $loggedin_data['performance_user_id'] = $row['user_id'];
            $loggedin_data['performance_org_id'] = $row['org_id'];
            $loggedin_data['performance_user_name'] = $row['user_name'];
            $loggedin_data['performance_email'] = $row['email'];
            $loggedin_data['performance_phone'] = $row['phone'];
            $loggedin_data['performance_image'] = $row['image'];
            $loggedin_data['performance_type'] = $row['type'];
            $loggedin_data['performance_role_id'] = $row['role_id'];
            $loggedin_data['performance_user_code'] = $row['user_code'];
            $loggedin_data['performance_last_login'] = $row['last_login'];
        }elseif($row['type']==5){
            $loggedin_data['is_operation_logged_in'] = TRUE;
            $loggedin_data['operation_user_id'] = $row['user_id'];
            $loggedin_data['operation_org_id'] = $row['org_id'];
            $loggedin_data['operation_user_name'] = $row['user_name'];
            $loggedin_data['operation_email'] = $row['email'];
            $loggedin_data['operation_phone'] = $row['phone'];
            $loggedin_data['operation_image'] = $row['image'];
            $loggedin_data['operation_type'] = $row['type'];
            $loggedin_data['operation_role_id'] = $row['role_id'];
            $loggedin_data['operation_user_code'] = $row['user_code'];
            $loggedin_data['operation_last_login'] = $row['last_login'];
        }elseif($row['type']==6){
            $loggedin_data['is_contractor_logged_in'] = TRUE;
            $loggedin_data['contractor_user_id'] = $row['user_id'];
            $loggedin_data['contractor_org_id'] = $row['org_id'];
            $loggedin_data['contractor_user_name'] = $row['user_name'];
            $loggedin_data['contractor_email'] = $row['email'];
            $loggedin_data['contractor_phone'] = $row['phone'];
            $loggedin_data['contractor_image'] = $row['image'];
            $loggedin_data['contractor_type'] = $row['type'];
            $loggedin_data['contractor_role_id'] = $row['role_id'];
            $loggedin_data['contractor_user_code'] = $row['user_code'];
            $loggedin_data['contractor_last_login'] = $row['last_login'];
        }elseif($row['type']==7){
            $loggedin_data['is_clients_logged_in'] = TRUE;
            $loggedin_data['clients_user_id'] = $row['user_id'];
            $loggedin_data['clients_org_id'] = $row['org_id'];
            $loggedin_data['clients_user_name'] = $row['user_name'];
            $loggedin_data['clients_email'] = $row['email'];
            $loggedin_data['clients_phone'] = $row['phone'];
            $loggedin_data['clients_image'] = $row['image'];
            $loggedin_data['clients_type'] = $row['type'];
            $loggedin_data['clients_role_id'] = $row['role_id'];
            $loggedin_data['clients_user_code'] = $row['user_code'];
            $loggedin_data['clients_last_login'] = $row['last_login'];
        }elseif($row['type']==1){
            $loggedin_data['is_user_logged_in'] = TRUE;
            $loggedin_data['user_user_id'] = $row['user_id'];
            $loggedin_data['user_org_id'] = $row['org_id'];
            $loggedin_data['user_user_name'] = $row['user_name'];
            $loggedin_data['user_email'] = $row['email'];
            $loggedin_data['user_phone'] = $row['phone'];
            $loggedin_data['user_image'] = $row['image'];
            $loggedin_data['user_type'] = $row['type'];
            $loggedin_data['user_role_id'] = $row['role_id'];
            $loggedin_data['user_user_code'] = $row['user_code'];
            $loggedin_data['user_last_login'] = $row['last_login'];
        }elseif($row['type']==0){
            $loggedin_data['is_admin_logged_in'] = TRUE;
            $loggedin_data['admin_user_id'] = $row['user_id'];
            $loggedin_data['admin_org_id'] = $row['org_id'];
            $loggedin_data['admin_user_name'] = $row['user_name'];
            $loggedin_data['admin_email'] = $row['email'];
            $loggedin_data['admin_phone'] = $row['phone'];
            $loggedin_data['admin_image'] = $row['image'];
            $loggedin_data['admin_type'] = $row['type'];
            $loggedin_data['admin_role_id'] = $row['role_id'];
            $loggedin_data['admin_user_code'] = $row['user_code'];
            $loggedin_data['admin_last_login'] = $row['last_login'];
        }
        return $loggedin_data;
    }
}