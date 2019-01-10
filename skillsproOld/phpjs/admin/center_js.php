<script type="text/javascript">
	$("#center_state").change(function(){
		var state_id=$(this).val();
		$.ajax({
			type:"POST",
			url:"ajax_city.php",
			data:{"state_id":state_id},
			success:function(data){
				$("#center_city").html(data);
			}
		});
	});

	$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var center_name=$("#center_name").val();
		var center_city=$("#center_city").val();
		var center_state=$("#center_state").val();
		var center_address=$("#center_address").val();
		var center_in_charge=$("#center_in_charge").val();
		var center_in_charge_contact_no=$("#center_in_charge_contact_no").val();
		var center_contact_no=$("#center_contact_no").val();
		var center_email=$("#center_email").val();
		var valid=1;
		var center_id=$("#center_id").val();

		if(partner_id=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select partner");
			valid=0;
		}

		if(center_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Center Name");
			valid=0;
		}
		if(center_city=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select center city");
			valid=0;
		}
		if(center_state=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Center State");
			valid=0;
		}
		if(center_address=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center address");
			valid=0;
		}
		if(center_in_charge=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center In Charge Name");
			valid=0;
		}
		if(center_in_charge_contact_no=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center In Charge Contact Phone");
			valid=0;
		}

		if(center_in_charge_contact_no=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center In Charge Contact Phone");
			valid=0;
		}

		if(center_contact_no=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center Contact Phone");
			valid=0;
		}

		if(center_email=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter center email");
			valid=0;
		}
        
        if(valid==1){

        $.ajax({
        		type:"POST",
        		url:"ajax_add_center.php",
        		data:{'partner_id':partner_id,'center_name':center_name,'center_email':center_email,'center_city':center_city,'center_state':center_state,'center_address':center_address,'center_contact_no':center_contact_no,'center_in_charge':center_in_charge,'center_in_charge_contact_no':center_in_charge_contact_no,'center_id':center_id},
        		dataType:"json",
        		success:function(data){
        			if(data.result==1){
        				$("#error").hide();
        				$("#success").show();
        				$("#success").text("Center successfully added");
        			}else{
        				$("#error").show();
        				$("#error").text("Some problem occured");
        			}
        		}
        		

        	});
        }

        e.preventDefault();


	});
</script>