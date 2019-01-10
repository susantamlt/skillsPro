<?php ob_start();
error_reporting(E_ALL ||E_NOTICE|| E_WARNING);
//error_reporting(E_ALL);
ini_set("MAX_EXECUTION_TIME","0");
define("UPLOAD_SIZE",2097152);
define("UPLOAD_SIZE_TXT","2MB");
define("ROOT","");
//define("WEBDIR","http://www.sansoftindia.com/");
define("WEBDIR","http://www.skillspro.co/");

define("SITE_NAME","Skills Pro");
define("PHY_ROOT",$_SERVER['DOCUMENT_ROOT']."/");
define("USERFILES","userfiles/");
define("CAL_DF","%d-%m-%Y");
global $db_host,$db_login,$db_pswd,$db_name,$connected;
$db_host = 'localhost';
$db_login= 'root';
$db_pswd = 'Anup@m!26';
$db_name = 'skillspro';


$connected = false;

$dayname=array();
$dayname[0]="Sunday";
$dayname[1]="Monday";
$dayname[2]="Tuesday";
$dayname[3]="Wednesday";
$dayname[4]="Thursday";
$dayname[5]="Friday";
$dayname[6]="Saturday";
$lang['days'] = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$lang['months']	= array(1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$lang['abrvmonth']=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$lang['abrvdays']= array("Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat");
$shortmonth=array();
$shortmonth[0]="Jan";
$shortmonth[1]="Feb";
$shortmonth[2]="Mar";
$shortmonth[3]="Apr";
$shortmonth[4]="May";
$shortmonth[5]="Jun";
$shortmonth[6]="Jul";
$shortmonth[7]="Aug";
$shortmonth[8]="Sep";
$shortmonth[9]="Oct";
$shortmonth[10]="Nov";
$shortmonth[11]="Dec";
?>