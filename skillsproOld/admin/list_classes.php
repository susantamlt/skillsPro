<?php include 'header.php';
function _isCurl(){
    return function_exists('curl_version');
 }

 function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
	$rs_class=q("SELECT a.*,c.course_name FROM dt_class a  INNER JOIN dt_courses c ON a.course_id=c.course_id WHERE a.partner_id='".$_SESSION['partner_id']."' ");

if($mode=='delete'){
	$class_id=$_REQUEST['class_id'];
	$f_class_det=f(q("SELECT * FROM dt_class WHERE class_id='$class_id' "));
	$liveurl="https://api.braincert.com/v2/removeclass?apikey=VxqciVajoryc9jvaowFO";   
           $data=array(
            'cid'=>$f_class_det['class_code'],
            
          );
          // print_r($data);
          $str_del=CallAPI('POST', $liveurl, $data);
          $class_del=json_decode($str_del); 

          if($class_del->status=='ok'){

            q("DELETE FROM dt_class WHERE class_id='$class_id'");
          }
}

?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Classes</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
					     
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Class Name</th>
								<th>Course Name</th>
								<th>Class Date</th>
								<th>Class Timing</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_class=f($rs_class)){?>
							  <tr>
								<th scope="row"><?php echo $i;?></th>
								<td><?php echo $f_class['class_name'];?></td>
								<td><?php echo $f_class['course_name'];?></td>
								<td><?php echo changedate_YMD($f_class['class_start_date']);?></td>
								<td><?php echo $f_class['class_start_time'].'-'.$f_class['class_end_time'];?></td>
								<td><a href="add_class.php?mode=edit&class_id=<?php echo $f_class['class_id'];?>">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete this item?');"  href="list_classes.php?mode=delete&class_id=<?php echo $f_class['class_id'];?> "  >Delete</a></td>
							  </tr>
							  <?php 
							  $i++;
							  } ?>
							</tbody>
						  </table>
						</div>
			</div>	
		</div>
	  </div>
<?php include 'footer.php';?>
<?php include '../phpjs/admin/center_js.php';?>	  

