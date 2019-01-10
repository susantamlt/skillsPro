<option value="">Please select city</option>
<?php foreach($city_list as $city){ ?>
<option value="<?php echo $city->city_id;?>"><?php echo $city->city;?></option>
<?php } ?>