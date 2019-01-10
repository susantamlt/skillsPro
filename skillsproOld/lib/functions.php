<?php
global $page_no;
//error_reporting(E_ALL);
//error_reporting(E_ALL && ~E_NOTICE);

function dt_dmy($get_date)
{
	return substr($get_date,8,2)."/". substr($get_date,5,2)."/". substr($get_date,0,4);
}
function dt_dmy_small($get_date)
{
	return substr($get_date,8,2)."/". substr($get_date,5,2)."/". substr($get_date,2,2);
}

function type_IMG($mime)
{
	switch($mime)
	{	
		case "image/jpeg":
			return "jpg";
		case "image/pjpeg":
			return "jpg";
		case "image/png":
			return "png";		
		case "image/gif":
			return "gif";
	}
	return "";
}

function type_HTML($mime)
{
	switch($mime)
	{	
		case "text/html":
			return "html";				
		case "text/plain":
		 	return "txt";
		case "application/msword":
		 	return "doc";
		case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
		 	return "docx";			
 		case "application/vnd.ms-excel":
		 	return "xls";
		case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
			return "xlsx";	
		case "application/vnd.ms-powerpoint":
		 	return "ppt";
		case "application/vnd.openxmlformats-officedocument.presentationml.presentation":
			return "pptx";	
		case "application/pdf":
			return "pdf";
		case "application/zip":
			return "zip";
		case "application/octet-stream":
			return "mpp";
	}
	return "";
}


function upload_file($source=1,$dest,$homeid='',$type='',$is_admin=0)//source as array,destination folder,filename
{
    echo 'AA'.$type;
	if($source["name"]=="")
	{
	   return("1");
	}
	
	if($source["size"]>UPLOAD_SIZE && $is_admin==0)
	{
	   return("1");
	}	
	list($name,$ext)=explode(".",$source["name"]);//extracting name and extension from filename
	 if($type=='')	 
	 {
		$ext=type_IMG($source["type"]);//returns the extension of image file e.g. gif,jpg,bmp
	 }
	
	 if($type=='html')	 
		 $ext=type_HTML($source["type"]);//returns the extension of image file e.g. HTML,txt,doc,xls
	 if($type=='swf')	 
		 $ext="swf";
	 	 	 
	
	
	 if($ext=="")//checking validity
	 {
	    return("2");
	 }
	 	
	 $name=uniqid("KQ",true);
	 $filename="$name"."."."$ext";
	 $counter=1;
		
	$filedest="$dest"."$filename";
	echo 'BB'.$filedest;
	//checks for any duplicate file
	/*while(file_exists("$filedest"))
	{
	  $nametemp=$name."_".$counter;
	  $nametemp="$nametemp"."."."$ext";
	  $filedest="$dest"."$nametemp";
	  $counter++;
	  $filename=$nametemp;
	}*/
		
	$success1=move_uploaded_file("$source[tmp_name]","$filedest");
	chmod("$filedest",0777);
	if($success1)
	{
		return($filename);
	}
	else
	{
		return("3");
	}
	 
}//end of function upload_file_in_folder

function checkEmail($email) 
{
   
   if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
   {
      return FALSE;
   }
//  WHEN UPLOAD TO THE SERVER UNQUOTE THE FOLLOWING LINES
   /*list($Username, $Domain) = split("@",$email);

   if(getmxrr($Domain, $MXHost)) 
   {
      return TRUE;
   }
   else 
   {
      if(fsockopen($Domain, 25, $errno, $errstr, 30)) 
      {
         return TRUE; 
      }
      else 
      {
         return FALSE; 
      }
   }
   */
   else
   {
      return TRUE;
	  }
   
}
//////////////////////////////////////////////////////////////
//validating us phone number
function VALIDATE_USPHONE($phonenumber,$useareacode=true)  
{  
if ( preg_match("/^[ ]*[(]{0,1}[ ]*[0-9]{3,3}[ ]*[)]{0,1}[-]{0,1}[]*[0-9]{3,3}[ ]*[-]{0,1}[ ]*[0-9]{4,4}[ ]*$/",$phonenumber) || 

             (preg_match("/^[ ]*[0-9]{3,3}[ ]*[-]{0,1}[ ]*[0-9]{4,4}[ ]*$/",$phonenumber) && !$useareacode))
return eregi_replace("[^0-9]", "",$phonenumber);  
//return FALSE;  
} 
////////////////////////////////////////////////////////////////////
//CHECKING  FILE TYPE
function man_MIME2Ext($mime)
		{
		  switch($mime)
			{
		    case "image/gif" :
							return "gif";

		    case "image/pjpeg" :
							return "jpg";

		    case "image/jpeg" :
							return "jpg";
			 case "image/png" :
							return "png";
			 case "image/tiff" :
							return "tiff";								
		  }

			return "";
		}


		
//*******************************************



function check_is_zip($mime)
		{
		
		  switch($mime)
			{
		    case "application/x-zip-compressed" :
							return "zip";

		    							
		  }

			return "";
		}


		
//*******************************************


 function sysGetThumbImage($url, $alt = "",$max_width=120,$max_height=120,$url_only=0)
    {
    //global $width, $height,$max_image_width,$max_image_height;    
    if (!($d = @fopen ($url, 'r'))) return;
        else {
            	fclose($d);
           		 $size = getimagesize ($url);
				 
            if ($size[2] == "") return "<img src=$url width=96  height=96 border=0 alt=\"Format is not supported!\">\n";
            else
			 {
              	 $height = $size[1];
      				$width = $size[0];
   			 if ($height > $max_height)
         		{
             		 $height = $max_height;
             		 $percent = ($size[1] / $height);
             		 $width = ($size[0] / $percent);
         		}
    	 if ($width > $max_width)
        	 {
            	  $width = $max_width;
             	 $percent = ($size[0] / $width);
              	 $height = ($size[1] / $percent);
        	 }
    
				if($url_only==0)
					return "<img src=\"$url\" width=\"$width\"  height=\"$height\"  border=0".(($alt=="")?(""):(" alt=\"$alt\"")).">\n\n";
				else
					return "src=\"$url\" ".(($alt=="")?(""):(" alt=\"$alt\""))." width=\"$width\"  height=\"$height\"";
         	}
		}        
    }
	



function sysScrapImage($url, $alt = "",$max_width=80,$max_height=80)
{
    
	  
    if (!($d = @fopen ($url, 'r'))) return;
        else {
            	fclose($d);
           		 $size = getimagesize ($url);
				 
            if ($size[2] == "") return "<img src=$url width=80  height=80 border=0 alt=\"Format is not supported!\">\n";
            else
			 {
              	 $height = $size[1];
      				$width = $size[0];
   			 if ($height > $max_height)
         		{
             		 $height = $max_height;
             		 $percent = ($size[1] / $height);
             		 $width = ($size[0] / $percent);
         		}
    	 if ($width > $max_width)
        	 {
            	  $width = $max_width;
             	 $percent = ($size[0] / $width);
              	 $height = ($size[1] / $percent);
        	 }
    
                    return "<img src=\"$url\" width=\"$width\"  height=\"$height\"  border=0".(($alt=="")?(""):(" alt=\"$alt\""))." style=\"border:0px #183c4a solid;\">\n\n";
					
         }
		}        
    }	
//*********************************************************************************************************


function trim_desc ($s,$length) {
// limit the length of the given string to $MAX_LENGTH char
// If it is more, it keeps the first $MAX_LENGTH-3 characters 
// and adds "..."
// It counts HTML char such as &aacute; as 1 char.
//
// $MAX_LENGTH = 22;
 $str_to_count = html_entity_decode($s);
 if (strlen($str_to_count) <= $length) {
   return $s;
 }
 $s2 = substr($str_to_count, 0, $length - 3);
 $s2 .= "...";
 return htmlentities($s2);
}
		



//////////////////////////////////////////////////////////

function sysGetMediumImage($url, $alt = "")
    {
    global $width, $height;
    $max_width = 300;
    $max_height = 175;

    if (!($d = @fopen ($url, 'r'))) return;
        else {
            fclose($d);
            $size = getimagesize($url);
            if ($size[2] == "") return "<img src=$url width=$width height=$height border=0 alt=\"Format is not supported!\">\n";
            else {
                if ($size[0] > $max_width){
                    $ratio = $size[0] / $max_width;
                    $width = $max_width;
                    $height = ceil ($size[1] / $ratio);
                    
                    if($height > $max_height)
                    {
                        $ratio = $height / $max_height;
                        $height = $max_height;
						
                        $width = ceil($width / $ratio);
						//$width=80;
                    }
                    
                    return "<img src=$url width=$width height=$height border=0".(($alt=="")?(""):(" alt=\"$alt\"")).">\n";
                } else {
                    $width = $size[0];
                    $height = $size[1];
                    return "<img src=$url width=$width height=$height border=0".(($alt=="")?(""):(" alt=\"$alt\"")).">\n";
                }
            }
        }
    }

/////////////////////

function sysGetBannerImage($url, $alt = "")
    {
    global $width, $height;
    $max_width = 468;
    $max_height = 60;

    if (!($d = @fopen ($url, 'r'))) return;
        else {
            fclose($d);
            $size = getimagesize($url);
            if ($size[2] == "") return "<img src=$url width=$width height=$height border=0 alt=\"Format is not supported!\">\n";
            else {
                if ($size[0] > $max_width){
                    $ratio = $size[0] / $max_width;
                    $width = $max_width;
                    $height = ceil ($size[1] / $ratio);
                    
                    if($height > $max_height)
                    {
                        $ratio = $height / $max_height;
                        $height = $max_height;
						
                        $width = ceil($width / $ratio);
						//$width=80;
                    }
                    
                    return "<img src=$url width=$width height=$height border=0".(($alt=="")?(""):(" alt=\"$alt\"")).">\n";
                } else {
                    $width = $size[0];
                    $height = $size[1];
                    return "<img src=$url width=$width height=$height border=0".(($alt=="")?(""):(" alt=\"$alt\"")).">\n";
                }
            }
        }
    }

/////////////////////


function getdatefromtimestamp($tm)
{
	$s=$tm;
	return date("m-d-Y",$s);
}

//////////////////////////////////////////

function getbizcatnamefromid($bcatid)
{
	$strb="select * from biz_category where category_id=$bcatid";
	$sqlbz=@mysql_query($strb);
	$numbz=mysql_num_rows($sqlbz);
	
	if($numbz)
	{
		$rsbiz=@mysql_fetch_row($sqlbz);
		
		return $rsbiz[1];
	}
	else
	{
		return 0;
	}
	
}

//////////////////////////////////////////

function get_file_size($size)
{
$filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
return round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i];
}

function get_time_HMS($size)
{
if($size==0)
	return "";
if($size<60)
{
	return $size."Min";
}
if($size>=60 && $size<3600)
{
	$min=floor($size/60);
	$sec=$size%60;
	if($sec<>0)
		return $min." Hr ".$sec." Min";
	else
		return $min." Hr";
		
	//return $min;
}


}


function auto_code($tab_name, $fld_name, $prefix)
{
	$f_sql=f(q("select ifnull(MAX($fld_name),0) AS MAXMCODE  FROM $tab_name"));
	
    if($f_sql['MAXMCODE'] =="0")
	    return 1;
	else
		return intval($f_sql['MAXMCODE'])+1;
}
		
function pickname($Table,$scerchBy,$scerchItem,$key)
{
	$quary=q("select ".$scerchItem." from ".$Table." where ".$scerchBy."='".$key."'");
	$tot_rec=(int)nr($quary);
	$returnName='';
	if($tot_rec<>0)
	{
		$fatch_quary=f($quary);
		$returnName=$fatch_quary[0];
	}
	return $returnName;
}

function find_root($chapter)
{
	$quary=q("select subjectID,parentID from chapter where chapterID=$chapter");
	$fatch_arr=f($quary);
	$subName=pickname("subject","subjectID","subjectName",$fatch_arr['subjectID']);
	$chpName=pickname("chapter","chapterID","chapterName",$chapter);
	
	$j=0;
	$select_topic_arr[0]=$chpName;
	$j++;
	if($fatch_arr['parentID']!=0)
	{
		$i=1;
		
		while($i==1)
		{
			$prID=$fatch_arr['parentID'];
			$quary=q("select chapterID,parentID from chapter where chapterID=$prID");
			$fatch_arr=f($quary);
			if($fatch_arr['parentID']!=0)
			{			
				$chpName=pickname("chapter","chapterID","chapterName",$fatch_arr['chapterID']);
				$select_topic_arr[$j]=$chpName;
				$j++;
			}
			else
			{
				$chpName=pickname("chapter","chapterID","chapterName",$fatch_arr['chapterID']);
				$select_topic_arr[$j]=$chpName;
				$j++;
				$i=0;
			}
		}
	}
	$select_topic_arr[$j]=$subName;
	array_reverse($select_topic_arr);
	$rtxt='';
	for($i=count($select_topic_arr)-1;$i>=0;$i--)
	{
		if($i==count($select_topic_arr)-1)		
			$rtxt.= "[ ".$select_topic_arr[$i]." ] - [ ";
		elseif($i==0)		
			$rtxt.= "<font color=\"#990000\">".$select_topic_arr[$i]."</font> ]";
		else
			$rtxt.= $select_topic_arr[$i]." ] - [ ";
	}
	return $rtxt;	
}



function Vertical($chapterName)
{
	$vtxt='';
	for($i=0;$i<strlen($chapterName);$i++)
	{
		$vtxt.= substr($chapterName,$i,1)."<br>";
	}
	return $vtxt;
}

function changeDate_YMD($date,$fromtype='')
{
		if($fromtype=='')
		{
			if(CAL_DF=='%d-%m-%Y')
			{
				$y=explode('-',$date);
				$a=$y[0];
				$b=$y[1];
				$c=$y[2];
				
				$z=array($c,$b,$a);
				$k=implode("-",$z);
	
				return $k; 
			}
		}elseif($fromtype=='FROM-MDY'){
				$y=explode('/',$date);
				$a=$y[0];
				$b=$y[1];
				$c=$y[2];
				
				$z=array($c,$a,$b);
				$k=implode("-",$z);
				return $k; 
		}
}

function changeDate_DMY($date)
{
			$date = substr($date, 0, 10);
			$y=explode('-',$date);
			$a=$y[0];
			$b=$y[1];
			$c=$y[2];
			
			$z=array($c,$b,$a);
			$k=implode("-",$z);

			return $k; 

}

function changeDate_MDY($date)
{
			$date = substr($date, 0, 10);
			$y=explode('-',$date);
			$a=$y[0];
			$b=$y[1];
			$c=$y[2];
			
			$z=array($b,$c,$a);
			$k=implode("-",$z);

			return $k; 

}

function changeDate_ADV($date)
{
	
	$month=array("January","February","March","Aprial","May","June","July","August","September","October","November","December");
	$date = substr($date, 0, 10);
	$date=explode('-',$date);
	
	$y=$date[0];
	$m=$month[$date[1]-1];
	$d=$date[2];	
	
	/*if($d==1 || $d==21 || $d==31)
	{
		$d=$d." <sup>st</sup>";
	}
	
	if($d==2 || $d==22)
	{
		$d=$d." <sup>nd</sup>";
	}
	
	if($d==3 || $d==23)
	{
		$d=$d." <sup>rd</sup>";
	}
	
	if(($d>=4 && $d<=20) || ($d>=24 && $d<=30))
	{
		$d=abs($d)." <sup>th</sup>";
	}*/
	return $d." ".$m.", ".$y; 
}

function changeDate_ADVTXT($date)
{
	
	$month=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$date = substr($date, 0, 10);
	$date=explode('-',$date);
	
	$y=$date[0];
	$m=$month[$date[1]-1];
	$d=$date[2];	
	
	
	return $m." ".$d.", ".$y; 
}



  

function generatePassword($length = 8)
{
	$chars = 'abdefhiknrstyzmnqy~%&!-$#@ABDEFGHKNQRSTYZ23456789';
	$numChars = strlen($chars);

	$string = '';
	for ($i = 0; $i < $length; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	}
	return $string;
}







function setrate($value)
{

if ($value == 5)
{
	$star = "images/rate/5star.gif" ;
}
if ($value>=1)
{
	$star = "images/rate/1star.gif" ;
}
if ($value>=1.5)
{
	$star = "images/rate/15star.gif" ;
}
if ($value>=2)
{
	$star = "images/rate/2star.gif" ;
}
if ($value>=2.5)
{
	$star = "images/rate/25star.gif" ;
}
if ($value>=3)
{
	$star = "images/rate/3star.gif" ;
}	
if ($value>=3.5)
{
	$star = "images/rate/35star.gif" ;
}	
if ($value >= 4)
{
	$star = "images/rate/4star.gif" ;
}	
if ($value >= 4.5)
{
	$star = "images/rate/45star.gif" ;
}	
if ($value >= 5)
{
	$star = "images/rate/5star.gif" ;
}	
if ($value<=0)
{
	$star = "images/rate/00star.gif" ;
}

return $star;
}	


function scrollArrowsleft($m, $y)
{
	// set variables for month scrolling
	//$nextyear = ($m != 12) ? $y : $y + 1;
	//$nextmonth = ($m == 12) ? 1 : $m + 1;
	$prevmonth = ($m == 1) ? 12 : $m - 1;
	$prevyear = ($m != 1) ? $y : $y - 1;
	
	

	$s .= "<img src=\"images/img_l.jpg\" border=\"0\" onClick=\"ajax_loadContent('main_div','ajx_ecalendar.php?calview=month&day=1".$day."&month=" . $prevmonth . "&year=" . $prevyear ."')\";>";
	//$s .= "<a href=\" index.php?calview=month&day=1".$day."&month=". $nextmonth . "&year=" . $nextyear . "\">";
	//$s .= "<img src=\"images/rightArrow.gif\" border=\"0\"></a>";
	
	return $s;
}

function scrollArrowsright($m, $y)
{
	// set variables for month scrolling
	$nextyear = ($m != 12) ? $y : $y + 1;
	$nextmonth = ($m == 12) ? 1 : $m + 1;
	//$prevmonth = ($m == 1) ? 12 : $m - 1;
	//$prevyear = ($m != 1) ? $y : $y - 1;
	
	

	//$s = "<a href=\" index.php?calview=month&day=1".$day."&month=" . $prevmonth . "&year=" . $prevyear . "\">\n";
	//$s .= "<img src=\"images/leftArrow.gif\" border=\"0\"></a> ";
	$s .= "<img align=\"right\" src=\"images/img_r.jpg\" border=\"0\"  onClick=\"ajax_loadContent('main_div','ajx_ecalendar.php?calview=month&day=1".$day."&month=". $nextmonth . "&year=" . $nextyear ."')\";>";
	
	return $s;
}

function writeCalendar($month, $year)
{
	$str = getDayNameHeader();
	$eventdata = getEventDataArray($month, $year);
	// get week position of first day of month.
	$weekpos = getFirstDayOfMonthPosition($month, $year);
	// get user permission level
	//$auth = auth();
	// get number of days in month
	$days = 31-((($month-(($month<8)?1:0))%2)+(($month==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
	
	// initialize day variable to zero, unless $weekpos is zero
	if ($weekpos == 0) $day = 1; else $day = 0;
	
	// initialize today's date variables for color change
	$timestamp = mktime() + CURR_TIME_OFFSET * 3600;
	$d = date(j, $timestamp); $m = date(n, $timestamp); $y = date(Y, $timestamp);
	
	// loop writes empty cells until it reaches position of 1st day of month ($wPos)
	// it writes the days, then fills the last row with empty cells after last day
	while($day <= $days) {
		
		$str .="<tr>\n";

		for($i=0;$i < 7; $i++) {
			
			if($day > 0 && $day <= $days) {
				
				// enforce title limit
				$eventcount = count($eventdata[$day]["event"]);
				
				$str .= "	<td class=\"";
				if($eventcount<>0)
				{
					if($eventdata[$day]["status"][$j]<>0)
					{
						if (($day == $d) && ($month == $m) && ($year == $y))
							$str .= "aevent_today";
						else
							$str .= "aevent_day";
					}
					else
					{
						if (($day == $d) && ($month == $m) && ($year == $y))
							$str .= "devent_today";
						else
							$str .= "devent_day";
							
					}
				}
				else
				{
					if (($day == $d) && ($month == $m) && ($year == $y))
						$str .= "today";
					else
						$str .= "day";
				}				
				$str .= "_cell\" style=\"height: 55px\" valign=\"center\">";
				
				if (($day == $d) && ($month == $m) && ($year == $y))
					$str .="<span class=\"day_number_today\">";
				else
					$str .="<span class=\"day_number\">";
				
				if ($auth)
					$str .= "<a href=\"javascript: postMessage($day, $month, $year)\">$day</a>";
				else
					$str .= "$day";
				
				$str .= "</span><br>";
				
				
				if (MAX_TITLES_DISPLAYED < $eventcount) $eventcount = MAX_TITLES_DISPLAYED;
				
				// write title link if posting exists for day
				$count=0;
				for($j=0;$j < $eventcount;$j++) {
					//$count++;
					
					$str .= "<span class=\"title_txt\">";
					//$str .= "<a href=\"javascript:openPosting(" . $eventdata[$day]["id"][$j] . ")\">";
					$str .= "<a href=\"event.php?action=viewevent&event_date=". $eventdata[$day]["event_date"][$j] . "\">";
					if($count==0)
					{
					$str .= "<br style=\"line-height:5px\"><img src=\"images/events.jpg\" border=\"0\" align=\"center\"></a></span>";
					$count++;
					}
				
				}

				$str .= "</td>\n";
				$day++;
			} elseif($day == 0)  {
     			$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				$weekpos--;
				if ($weekpos == 0) $day++;
     		} else {
				$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
			}
     	}
		$str .= "</tr>\n\n";
	}
	
	$str .= "</table>\n\n";
	return $str;
}
///********************************************************
function getDayNameHeader()
{
	global $lang;
	
	// adjust day name order if weekstart not Sunday
	if (WEEK_START != 0) {
		for($i=0; $i < WEEK_START; $i++) {
			$tempday = array_shift($lang['abrvdays']);
			array_push($lang['abrvdays'], $tempday);
		}
	}
	
	$s = "<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\" width=\"100%\">\n<tr>\n";
	
	foreach($lang['abrvdays'] as $day) {
		$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
	}

	$s .= "</tr>\n\n";
	return $s;
}
//*****************************************************************

function getEventDataArray($month, $year)
{
	//mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	//mysql_select_db(DB_NAME) or die(mysql_error());
	//require "lib/conn.php";
	$user_id=$_SESSION['u_id'];
	$sql = "SELECT event_id,event_date, d, headline,status ";
	$sql .= "FROM  dt_event WHERE m = $month AND y = $year ";
	$sql .= "ORDER BY event_id";
	
	$result = mysql_query($sql) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result)) {
		$eventdata[$row["d"]]["event_date"][] = $row["event_date"];

		if (strlen($row["title"]) > TITLE_CHAR_LIMIT)
			$eventdata[$row["d"]]["event"][] = substr(stripslashes($row["event"]), 0, TITLE_CHAR_LIMIT) . "...";
		else
			$eventdata[$row["d"]]["event"][] = stripslashes($row["event"]);
		if($user_id=='')	
		{
			$eventdata[$row["d"]]["status"][] = $row["status"];
		}
		else
		{
			$q_arr=q("select row_id from dt_classmember where user_id=$user_id and class_id=".$row["class_id"]."  and is_cancel=0");
			$tot_rec=(int)nr($q_arr);
			if($tot_rec<>0)
				$eventdata[$row["d"]]["status"][] = 0;
			else
				$eventdata[$row["d"]]["status"][] = $row["status"];
		}
	}
	
	return $eventdata;
}


//***************************************************
function getFirstDayOfMonthPosition($month, $year)
{
	$weekpos = date("w",mktime(0,0,0,$month,1,$year));
	
	// adjust position if weekstart not Sunday
	if (WEEK_START != 0)
		if ($weekpos < WEEK_START)
			$weekpos = $weekpos + 7 - WEEK_START;
		else
			$weekpos = $weekpos - WEEK_START;
	
	return $weekpos;
}

function cur_convert($amt,$type)
{
	$f_cur=f(q("select * from dt_currency where is_active=1"));
	if( strtoupper($type)=='USD')
	{
		return $amt*$f_cur['usd'];
	}
	if( strtoupper($type)=='INR')
	{
		return $amt*$f_cur['inr'];
	}
}

function msgbox($msgno,$str1="",$str2="",$str3="")
{
$php_msgarr[0]="Data has been saved successfully !";
$php_msgarr[1]="Data has been updated successfully !";
$php_msgarr[2]="Data has been deleted successfully !";
$php_msgarr[3]="Invalid user name or password !";
$php_msgarr[4]="User already exist !";
$php_msgarr[5]="$str1 must be greater than $str2";
$php_msgarr[6]="$str1 must be less than $str2";
$php_msgarr[7]="$str1 must be equal with $str2";
$php_msgarr[8]="$str1 must be greater than or equal to $str2";
$php_msgarr[9]="Sorry !<br> This record already tagged with ohter records!";
$php_msgarr[10]="Please enter your $str1";
$php_msgarr[11]="Please specify your $str1";
$php_msgarr[12]="We are sorry!There are some technical error occured! ";
$php_msgarr[13]="We are sorry! but there are some technical error! The error has been sent to the".SITE_NAME." !";
$php_msgarr[14]="$str1 has been updated successfully!We will check it soon.";
$php_msgarr[15]="Please enter $str1";
$php_msgarr[16]="$str1 cant be left blank.";
$php_msgarr[17]="Invalid email address.";
$php_msgarr[18]="Email address not found.";
$php_msgarr[19]="Duplicate email address.";
$php_msgarr[20]="Duplicate user name.";
$php_msgarr[21]="Password must be greater than or equal to 8 characters.";
$php_msgarr[22]="Password didn't matched.";
$php_msgarr[23]="You have successfully logged in.";
$php_msgarr[24]="Your registration not been activated .<br>Please check your mail at ".$str1." and follow the instraction.";
$php_msgarr[25]="Your registration has been deactivated by site administrator.";
$php_msgarr[26]="Invalid user name or password!";
$php_msgarr[27]="No file to upload or file size greater than maximum permited size (500 KB) ! <br>";
$php_msgarr[28]="Invalid format of file [ ".$str1." ] !<br>";
$php_msgarr[29]="Some problem with copying file !<br>";
$php_msgarr[30]="Image has been uploaded successfully.<br>";
$php_msgarr[31]="$str1 Password didn't matched.";
$php_msgarr[32]="Please verify $str1!";
$php_msgarr[33]="The recipe has been added to your favourite list !";
$php_msgarr[34]="Your invitation has been send successfully to ".$str1.".";
$php_msgarr[35]="You are already joined to this community,please login and check your friend list.";
$php_msgarr[36]="Your registration has completed successfully, please login and download the documents which you require.";
$php_msgarr[37]="This $str1 already exist in our database,please make a change";
$php_msgarr[38]="This $str1 already published in our site, user can't change this";
$php_msgarr[39]="Your registration has been activated.<br> Feel free and login now.";
$php_msgarr[40]="Your are already an active user.";
$php_msgarr[41]="Only the user of Japan can register in this class.";
$php_msgarr[42]="Your message is on its way!";
$php_msgarr[43]="The item has been added to your shopping list !";
$php_msgarr[44]="No Friend Selected!";
$php_msgarr[45]="Newsletter has been sent successfully to $str1 !";
$php_msgarr[46]="Your password has been retrived successfully.<br>Please check your mail !";
$php_msgarr[47]="Your password has been changed successfully.<br>Please sign in with the new password!";
$php_msgarr[48]="Your recipe has been saved successfully.";
$php_msgarr[49]="Your recipe has been updated successfully.";
$php_msgarr[50]="Please select $str1.";
$php_msgarr[51]="Please locate your map.";
$php_msgarr[52]="Sorry this record not been deleted!<br> This $str1 already tagged with other $str2!";
$php_msgarr[53]="Please enter your email address properly.";
$php_msgarr[54]="Email-id already exist! Please enter another Email-id!";
$php_msgarr[55]="Hotel Type name already exist!";
$php_msgarr[56]="Room Type name already exist!";
$php_msgarr[57]="Hotel Type name cant be left blank!";
$php_msgarr[58]="$str1 already exist!";
$php_msgarr[59]="Banner name cant be left blank!";
$php_msgarr[60]="Banner Link cant be left blank!";
$php_msgarr[61]="Your inquiry has been sent to administrator.";
$php_msgarr[62]="Data cannot be deleted.Applicant has already posted for this job.";
$php_msgarr[63]="Your subscribtion has been completed succussfully.<br>You will get our newsletter soon.";
$php_msgarr[64]="Sorry, you have provided an invalid security code";
$php_msgarr[65]="You must select Prefectures of Japan";
return $php_msgarr[$msgno];

}

function cl($id)
{
	if($_SESSION['language']=='EN')
	{
		$f_sql=f(q("select EN from sys_words where id='$id'"));
	}
	else
	{
		$f_sql=f(q("select ".$_SESSION['language'].",EN from sys_words where id='$id'"));
	}
	if($f_sql[0]=='' || !isset($f_sql[0]))
		return nl2br($f_sql[1]);	
	else
		return nl2br($f_sql[0]);	
}

function corrency_convert($tocur,$fromcur,$amt)
{
	if($tocur==$fromcur)
	{
		$amt=round($amt);
		return $amt;
	}
	else
	{
		$f_ar=f(q("select * from dt_currency where is_active=1"));
		$tocur=strtolower($tocur);
		$amt=round($amt*$f_ar["$tocur"]);
		return $amt;
	}
}

function left_tree($pmenu_id)
{

	 $q_arr_1=q("select * from dt_emenu where pmenu_id=$pmenu_id order by menu_id");						 
	 while($f_submenu=f($q_arr_1)){
		$menu_id=$f_submenu['menu_id'];
		if($f_submenu['page_id']<>0)
			$link="cmspage.php?page_id=".$f_submenu['page_id']."&menu_id=".$f_submenu['menu_id'];
		else
			$link=$f_submenu['pagelink'];
		
		$subpic="";
		$q_cchecksub=q("select menu_id from dt_emenu where pmenu_id=$menu_id");
		$tot_sub=(int)nr($q_cchecksub);
		if($tot_sub<>0)
			$link="#";
		echo "<div style=\"padding-left:1px;\"><li><a href=\"".$link."\">".$f_submenu['mname']."$subpic</a>";
		if($tot_sub<>0)
		{
			left_tree($menu_id);
		}
		echo "</li></div>";
	 }
}

function menu_tree($pmenu_id,$top_pos=0,$left_pos=2)
{

echo "<div class=\"imsc\"><div class=\"imsubc\" style=\"width:200px;top:".$top_pos."px;left:".$left_pos."px;\"><ul style=\"\">";
						 $q_arr_1=q("select * from dt_emenu where pmenu_id=$pmenu_id order by menu_id");						 
						 while($f_submenu=f($q_arr_1)){
						 	$menu_id=$f_submenu['menu_id'];
							if($f_submenu['page_id']<>0)
								$link="cmspage.php?page_id=".$f_submenu['page_id']."&menu_id=".$f_submenu['menu_id'];
							else
								$link=$f_submenu['pagelink'];
							
							$subpic="";
							$q_cchecksub=q("select menu_id from dt_emenu where pmenu_id=$menu_id");
							$tot_sub=(int)nr($q_cchecksub);
							if($tot_sub<>0)
							{
								$link="#";
								//$subpic="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;";
							}	
						 	echo "<li style=\"list-style:none; list-style-image:url(../images/bullet.jpg);\"><a href=\"".$link."\" class=\"menu_r\">".$f_submenu['mname']."$subpic</a>";
							if($tot_sub<>0)
							{
								menu_tree($menu_id,-15,150);
							}
							echo "</li>";
						 }
						echo "</ul></div></div>";
}
?>