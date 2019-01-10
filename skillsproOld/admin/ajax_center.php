<?php include 'top.php';
      $city_id=$_POST['city_id'];
      $partner_id=$_POST['partner_id'];
      $sql_center="SELECT * FROM dt_centers WHERE center_city='$city_id' AND partner_id='$partner_id'";
      $rs_center=q($sql_center);
 ?>
 <option value="">Select Center</option>
 <?php while($f_center=f($rs_center)){?>
 <option value="<?php echo $f_center['center_id'];?>"><?php echo $f_center['center_name'];?></option>

 <?php  } ?>