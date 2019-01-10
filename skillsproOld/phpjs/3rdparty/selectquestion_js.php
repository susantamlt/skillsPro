<script type="text/javascript">
	$(".q_s").click(function(){
		var q_id=$(this).val();
		if($(this).is(":checked")){


			
			$(".q_cls").each(function(){
				if(q_id==$(this).data('id')){
					alert('Question Already added')
				}
			});
			$.ajax({
				type:"POST",
				url:"<?php echo WEBDIR.ROOT;?>partners/ajax_get_question_by_id.php",
				data:{'question_id':q_id},
				success:function(data){
					$("#sel_q_div").append(data);
				}
			});
		}else{

			$("#sp_"+q_id).remove();
			$(".q_cls").each(function(){
				if(q_id==$(this).data('id')){
					$(this).remove();
				}		
			});	
		}	


	});

	$(document.body).on("click",".q_cls",function(){
		var id=$(this).data('id');
		$(".q_s").each(function(){
			if($(this).val()==id){
				$(this).prop('checked',false);
			}
		});
		$("#sp_"+id).remove();
		$(this).remove();	
		
		
	});

	$("#btn_submit").click(function(e){
		var exam_id=$("#exam_id").val();
	    var qs='';
	    $(".q_cls").each(function(){
	    	if(qs=='')
	    		qs=$(this).data('id');
	    	else
	    		qs+='~'+$(this).data('id');
	    });

	    if(qs!=''){
		    $.ajax({
		    	type:"POST",
		    	url:"<?php echo WEBDIR.ROOT;?>partners/ajax_save_manual_exam.php",
		    	data:{'exam_id':exam_id,'qs':qs},
		    	dataType:"json",
		    	success:function(data){
		    		if(data.result==1){
			    		$("#success").show();
			    		$("#error").hide();
			    		$("#success").text("Exam Saved Successfully");
			    	}else{
			    		$("#error").show();
			    		$("#error").text("Some problem Occured");
			    	}	
		    	}

		    });

		}    

		$("html, body").animate({ scrollTop: 0 }, "slow");		
		e.preventDefault();
	});
</script>