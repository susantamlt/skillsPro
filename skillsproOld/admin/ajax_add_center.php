<?php  include 'top.php';
        $partner_id=$_POST['partner_id'];
		$center_name=$_POST['center_name'];
		$center_city=$_POST['center_city'];
		$center_state=$_POST['center_state'];
		$center_address=$_POST['center_address'];
		$center_email=$_POST['center_email'];
		$center_in_charge=$_POST['center_in_charge'];
		$center_contact_no=$_POST['center_contact_no'];
		$center_in_charge_contact_no=$_POST['center_in_charge_contact_no'];
		$center_id=$_POST['center_id'];
		
		if($center_id=='')
			$sql_add_center="INSERT INTO dt_centers SET partner_id='$partner_id',center_name='".addslashes($center_name)."',center_email='$center_email',center_address='".addslashes($center_address)."',center_city='$center_city',center_state='$center_state',center_contact_no='$center_contact_no',center_in_charge='$center_in_charge',center_in_charge_contact_no='$center_in_charge_contact_no'";
		else
			$sql_add_center="UPDATE dt_centers SET partner_id='$partner_id',center_name='".addslashes($center_name)."',center_email='$center_email',center_address='".addslashes($center_address)."',center_city='$center_city',center_state='$center_state',center_contact_no='$center_contact_no',center_in_charge='$center_in_charge',center_in_charge_contact_no='$center_in_charge_contact_no' WHERE center_id='$center_id'";
		q($sql_add_center);
		if(!mysql_error()){
			$result=1;
		}else{
			$result=0;
		}

		$ret_arr=array('result'=>$result);
		echo json_encode($ret_arr);

