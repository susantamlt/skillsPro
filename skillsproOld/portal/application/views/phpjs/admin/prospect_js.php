<script type="text/javascript">
	$("input[type=radio]").click(function(){
    
    if($(this).val()==1){
        $("#client_id_div").hide();
        $("#client_name_div").show();
    }else{
        $("#client_id_div").show();
        $("#client_name_div").hide();
    }
});
	$("#btn_submit").click(function(data){
		var prospect_title=$("#prospect_title").val();
		var client_type=$("input[type=radio]:checked").val();
		alert(client_type);
		var client_name='';
		var contact_person='';
		var client_id='';
		if(client_type==1)
		{
			client_name=$("#client_name").val();
			contact_person=$("#contact_person").val();

		}else{
			client_id=$("#client_id").val();
		}
		var prospect_type_id=$("#prospect_type_id").val();
		var no_of_prospect=$("#no_of_prospect").val();
		var prospect_description=$("#prospect_description").val();
		var prospect_source=$("#prospect_source").val();
		var prospect_email_1=$("#prospect_email_1").val();
		var prospect_email_2=$("#prospect_email_2").val();
		var prospect_phone_1=$("#prospect_phone_1").val();
		var prospect_phone_2=$("#prospect_phone_2").val();
		var prospect_address=$("#address").val();
		var state_code=$("#state").val();
		var city_id=$("#cities").val();
		var prospect_other_info=$("#prospect_other_info").val();

		var valid =1;
		alert(prospect_title);
		if(prospect_title=='' && valid ==1 ){
			$("#error").show();
			$("#error").text(' <strong>Whoops!</strong> Please enter title');
			valid=0;
		}

		if(valid==1){
			alert('aa');
			$.ajax({
				type:"POST",
				url:"<?php echo config_item('base_url');?><?php echo config_item('index_page');?>/admin/prospect/save_prospect",
				data:{"prospect_title":prospect_title,"prospect_source":prospect_source,"prospect_email_1":prospect_email_1,"prospect_email_2":prospect_email_2,"prospect_phone_1":prospect_phone_1,"prospect_phone_2":prospect_phone_2,"prospect_address":prospect_address,"prospect_other_info":prospect_other_info,'prospect_type_id':prospect_type_id,'no_of_prospect':no_of_prospect,'state_code':state_code,'city_id':city_id,'prospect_description':prospect_description,'client_type':client_type,'client_name':client_name,'contact_person':contact_person,'client_id':client_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#success").show();
						setTimeout(function(){
						window.location = "<?php echo config_item('base_url');?><?php echo config_item('index_page');?>/admin/prospect/list_prospect"; 
						}, 2000);
						
					}else{
						$("#error").show();
						$("#error").text('Whoops! Please enter title');
						$('html, body').animate({scrollTop:$('#error').position().top}, 'slow');
						valid=0;
					}
				}
			});
		}


	});

	$("#contract_send").click(function(){
		var prospect_id=$("#prospect_id").val();
		var received='';
		if($(this).is(":checked")==true)
			send='Y';
		else
			send='N';	
			
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/prospect/send_contract",
				data:{"prospect_id":prospect_id,'send':send},
				
			});
		
	});
	$("#contract_received").click(function(){
		var prospect_id=$("#prospect_id").val();
		
		var received='';
		if($(this).is(":checked")==true)
			received='Y';
		else
			received='N';	

		
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/prospect/receive_contract",
				data:{"prospect_id":prospect_id,'received':received},
				
			});
		
	});
</script>