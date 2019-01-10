<?php class Sales_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function reports($days='') {
		$TotalResult = array();
		$i=0;
		$prospectType = $this->db->query("SELECT prospect_type_id,prospect_type FROM prospect_type WHERE status='1'");
		$phone0=0;$phone1=0;$phone2=0;
		$email0=0;$email1=0;$email2=0;
		$wpe0=0;$wpe1=0;$wpe2=0;
		$total0=0;$total1=0;$total2=0;
		$pper0=0;$pper1=0;$pper2=0;
		$eper0=0;$eper1=0;$eper2=0;
		foreach ($prospectType->result_array() as $_prospectType) {
			$j = 0;
			$TotalResult[$i][$j] = $_prospectType['prospect_type'];
			foreach ($days as $dk => $_day) {
				$j++;
				$_WithPhone1 = $this->db->query("SELECT count(prospect_id) as id FROM prospect WHERE prospect_phone_1!='' AND Date(date_of_prospect)='".$_day."' AND prospect_type_id='".$_prospectType['prospect_type_id']."'");
				$WithPhone1 = $_WithPhone1->result();
				$TotalResult[$i][$j] = $WithPhone1[0]->id;
				$j++;
				$_WithEmail1 = $this->db->query("SELECT count(prospect_id) as id FROM prospect WHERE prospect_email_1!='' AND Date(date_of_prospect)='".$_day."' AND prospect_type_id='".$_prospectType['prospect_type_id']."'");
				$WithEmail1 = $_WithEmail1->result();
				$TotalResult[$i][$j] = $WithEmail1[0]->id;
				$j++;
				$_WithPhoneEmail1 = $this->db->query("SELECT count(prospect_id) as id FROM prospect WHERE prospect_phone_1='' AND prospect_email_1='' AND Date(date_of_prospect)='".$_day."' AND prospect_type_id='".$_prospectType['prospect_type_id']."'");
				$WithPhoneEmail1 = $_WithPhoneEmail1->result();
				$TotalResult[$i][$j] = $WithPhoneEmail1[0]->id;
				$j++;
				$_WithTotal1 = $this->db->query("SELECT count(prospect_id) as id FROM prospect WHERE Date(date_of_prospect)='".$_day."' AND prospect_type_id='".$_prospectType['prospect_type_id']."'");
				$WithTotal1 = $_WithTotal1->result();
				$TotalResult[$i][$j] = $WithTotal1[0]->id;
				$j++;
				if($WithTotal1[0]->id >0){
					$TotalResult[$i][$j] = number_format( ($WithPhone1[0]->id / $WithTotal1[0]->id) * 100) . '%';
				} else {
					$TotalResult[$i][$j] = '0%';
				}
				$j++;
				if($WithEmail1[0]->id >0){
					$TotalResult[$i][$j] = number_format(($WithEmail1[0]->id / $WithTotal1[0]->id) * 100) . '%';
				} else {
					$TotalResult[$i][$j] = '0%';
				}

				if($dk==2){
					$phone2= $phone2 + $WithPhone1[0]->id;
					$email2= $email2 + $WithEmail1[0]->id;
					$wpe2= $wpe2 + $WithPhoneEmail1[0]->id;
					$total2= $total2 + $WithTotal1[0]->id;
					if($WithTotal1[0]->id >0){
						$pper2= $pper2 + number_format(($WithPhone1[0]->id / $WithTotal1[0]->id) * 100);
						$eper2= $eper2 + number_format(($WithEmail1[0]->id / $WithTotal1[0]->id) * 100);
					} else {
						$pper2= $pper2 +0;
						$eper2= $eper2 +0;
					}
				} else if($dk==1){
					$phone1= $phone1 + $WithPhone1[0]->id;
					$email1= $email1 + $WithEmail1[0]->id;
					$wpe1= $wpe1 + $WithPhoneEmail1[0]->id;
					$total1= $total1 + $WithTotal1[0]->id;
					if($WithTotal1[0]->id >0){
						$pper1= $pper1 + number_format(($WithPhone1[0]->id / $WithTotal1[0]->id) * 100);
						$eper1= $eper1 + number_format(($WithEmail1[0]->id / $WithTotal1[0]->id) * 100);
					} else {
						$pper1= $pper1 + 0;
						$eper1= $eper1 + 0;
					}
				} else {
					$phone0= $phone0 + $WithPhone1[0]->id;
					$email0= $email0 + $WithEmail1[0]->id;
					$wpe0= $wpe0 + $WithPhoneEmail1[0]->id;
					$total0= $total0 + $WithTotal1[0]->id;
					if($WithTotal1[0]->id >0){
						$pper0= $pper0 + number_format(($WithPhone1[0]->id / $WithTotal1[0]->id) * 100);
						$eper0= $eper0 + number_format(($WithEmail1[0]->id / $WithTotal1[0]->id) * 100);
					} else {
						$pper0= $pper0 + 0;
						$eper0= $eper0 + 0;
					}
				}
			}
			$i++;
		}
		$TotalResult[$i][0]='';
		$TotalResult[$i][1] = $phone0;
		$TotalResult[$i][2] = $email0;
		$TotalResult[$i][3] = $wpe0;
		$TotalResult[$i][4] = $total0;
		if($total0 > 0){
			$TotalResult[$i][5] =  number_format( ($phone0 / $total0) * 100) . '%';
			$TotalResult[$i][6] =  number_format( ($email0 / $total0) * 100) . '%';
		} else {
			$TotalResult[$i][5] = '0%';
			$TotalResult[$i][6] = '0%';
		}
		$TotalResult[$i][7] = $phone1;
		$TotalResult[$i][8] = $email1;
		$TotalResult[$i][9] = $wpe1;
		$TotalResult[$i][10] = $total1;
		if($total1 > 0){
			$TotalResult[$i][11] =  number_format( ($phone1 / $total1) * 100) . '%';
			$TotalResult[$i][12] =  number_format( ($email1 / $total1) * 100) . '%';
		} else {
			$TotalResult[$i][11] = '0%';
			$TotalResult[$i][12] = '0%';
		}		
		$TotalResult[$i][13] = $phone2;
		$TotalResult[$i][14] = $email2;
		$TotalResult[$i][15] = $wpe2;
		$TotalResult[$i][16] = $total2;
		if($total2 > 0){
			$TotalResult[$i][17] =  number_format( ($phone2 / $total2) * 100) . '%';
			$TotalResult[$i][18] =  number_format( ($email2 / $total2) * 100) . '%';
		} else {
			$TotalResult[$i][17] = '0%';
			$TotalResult[$i][18] = '0%';
		}		
		return $TotalResult;
	}
}