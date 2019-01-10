<script type="text/javascript">
	$("#btn_submit").click(function(e){
		
		var topic_name=$("#topic_name").val();
		var partner_id=$("#partner_id").val();
		var mode=$("#mode").val();
		var topic_id=$("#topic_id").val(); 
		var valid=1;

		if(valid==1 && topic_name==''){
			$("#error").show();
			$("#error").text("Please enter topic name");
			valid=0;
		}

		if(valid==1){
			$.ajax({
				type:"POST",
				url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_topic.php",
				data:{"topic_name":topic_name,"partner_id":partner_id,'mode':mode,'topic_id':topic_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#success").show();
						$("#error").hide();
						$("#success").text("Successfully added topic");
						setTimeout(function(){ window.location.href="list_topics.php"; }, 1500);
					}else{
						$("#error").show();
						$("#error").text("Some problem occured");
					}
				}
			});
		}
		e.preventDefault();
	});
	
	//Ghouse For Deleting the Center from the list of Centers
	function delete_patner_topic(eleObj,topic_id) {
		var row_id = $(eleObj).data('row_id');
        $.ajax({
			type:"POST",
			url:"common_partners_ajax.php",
			data:{'mode':'ajax','function':'delete_patner_topic','topic_id':topic_id},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#error").hide();
					$("#success").show();
					$("#success").text("Topic deleted successfully");
					setTimeout(function(){ location.reload();
						$('row_id_'+row_id).remove();
						$("#success").hide();
					}, 2000);
				}else{
					$("#error").show();
					$("#error").text("Some problem occured");
				}
			}
		});
		$('html, body').animate({ scrollTop: 0 }, 'slow');
    }
</script>