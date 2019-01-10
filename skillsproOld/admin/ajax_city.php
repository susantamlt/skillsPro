<?php include 'top.php';
	  $state_id=$_POST['state_id'];
      $rs_city=q("select city_id,city_name from dt_city where state_id='$state_id'");
?>

<?php      
      while($f_city=f($rs_city)){
?>
<option value="<?php echo $f_city['city_id'];?>"><?php echo $f_city['city_name'];?></option>      

<?php } ?>