<script type="text/javascript">
	
	$("#center_id").change(function(){
		var center_id=$("#center_id").val();
		var partner_id=$("#partner_id").val();
		//alert(center_id);
		$.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/ajax_centerwise_course.php",
			data:{"center_id":center_id,"partner_id":partner_id},
			success:function(data){
				$("#course_id").html(data);
			}
		});
	});
   $(function() {

    $( "#start_date" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      dateFormat:"dd/mm/yy",
      onClose: function( selectedDate ) {
        $( "#end_date" ).datepicker( "option", "minDate", selectedDate);
      }
    });

    $( "#end_date" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      dateFormat:"dd/mm/yy",
      onClose: function( selectedDate ) {
        $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
      }
    });

  });
  
  $("#select_all").click(function(){
  	if($(this).is(":checked"))
  		$(".chk_student").prop('checked',true);
  	else
  		$(".chk_student").prop('checked',false);
  });

  $("#btn_assign").click(function(){
  	var students='';
  	$(".chk_student").each(function(){
  		if($(this).is(":checked")){
  			if(students=='')
  				students=$(this).val();
  			else
  				students+='~'.$(this).val();
  		}
  	});
  	var course_id=$("#course_id").val();
  	var batch_id=$("#batch_id").val();

  	$.ajax({
  		type:"POST",
  		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_assign_students_to_batch.php",
  		data:{'students':students,'course_id':course_id,'batch_id':batch_id},
  		dataType:"json",
  		success:function(data){
  			if(data.result==1){
  				$("#success").show();
  				$("#success").html("All the students assigned to the batch Successfully");
  			}else{
  				$("#error").show();
  				$("#error").html("Some problem occured");
  			}
  		}
  	});
  });

  

	$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var batch_type=$("#batch_type").val();
		var center_id=$("#center_id").val();
		var course_id=$("#course_id").val();
		var batch_code_prefix=$("#batch_code_prefix").val();
		var class_type='';
		$("input[name='class_type']").each(function(){
			if($(this).is(":checked")){
				class_type=$(this).val();
			}
		});

		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();

		/*var batch_start_time=$("#batch_start_time").val();
		var batch_end_time=$("batch_end_time").val();*/
		var valid=1;
		
		if(center_id=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Center");
			valid=0;
		}
		if(course_id=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Course");
			valid=0;
		}
		if(start_date=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Start Date");
			valid=0;
		}
		if(end_date=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select End Date");
			valid=0;
		}
		/*if(batch_start_time=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Batch Start Time");
			valid=0;
		}
		if(batch_end_time=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select Batch End Time");
			valid=0;
		}*/

		if(valid==1){
			$.ajax({
				type:"POST",
				url:"<?php echo WEBDIR.ROOT;?>partners/ajax_save_batch.php",
				data:{"batch_type":batch_type,"center_id":center_id,"course_id":course_id,"batch_code_prefix":batch_code_prefix,"batch_start_time":batch_start_time,"batch_end_time":batch_end_time,"class_type":class_type,"start_date":start_date,"end_date":end_date,"partner_id":partner_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#success").text("Batch Added Successfully");
						$("#success").show();
						$("#error").hide();
					}else{
						$("#error").show();
						$("#success").hide();
						$("#success").text("Some problem occured");
					}
				}
			});
		}
		e.preventDefault();
	});
    function delete_partner_batch(eleObj,batch_id) {
		var row_id = $(eleObj).data('row_id');
        $.ajax({
			type:"POST",
			url:"common_partners_ajax.php",
			data:{'mode':'ajax','function':'delete_patner_batch','batch_id':batch_id},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#error").hide();
					$("#success").show();
					$("#success").text("Batch deleted successfully");
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
 