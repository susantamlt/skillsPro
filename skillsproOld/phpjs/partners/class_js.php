<script type="text/javascript">
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

$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var class_name=$("#class_name").val();
		var course_id=$("#course_id").val();
		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();
		var start_time=$("#start_time").val();
		var end_time=$("#end_time").val();
		var is_repeated=$("#is_repeated").val();
		var repeated_class='';
    var mode=$("#mode").val();
    var class_id=$("#class_id").val();
		var valid=1;
    var class_code=$("#class_code").val();
		$("input[name='repeated_class']").each(function(){
			if($(this).is(":checked")){
				repeated_class=$(this).val();
			}
		});
		
		

		if(class_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Class Name");
			valid=0;
		}
		if(course_id=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select course");
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
		
		if(start_time=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Start Time");
			valid=0;
		}
		if(end_time=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter End Time");
			valid=0;
		}
      

		
        if(valid==1){
			$.ajax({
        		type:"POST",
        		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_class.php",
        		data:{'partner_id':partner_id,'class_name':class_name,'course_id':course_id,'start_date':start_date,'end_date':end_date,'start_time':start_time,'end_time':end_time,'is_repeated':is_repeated,'repeated_class':repeated_class,'mode':mode,'class_id':class_id,'class_code':class_code},
        		dataType:"json",
        		success:function(data){
        			if(data.result==1){
        				$("#error").hide();
						$("#success").show();
        				$("#success").text("Class successfully added");
						//setTimeout(function(){ window.location.href="list_classes.php"; }, 2000);
        			}else{
        				$("#error").show();
        				$("#error").text("Some problem occured");
        			}
        		}
        	});
        }
		$("html, body").animate({ scrollTop: 0 }, "slow");
        e.preventDefault();
	});
$("#select_all_batch").click(function(){
  	if($(this).is(":checked"))
  		$(".chk_student").prop('checked',true);
  	else
  		$(".chk_student").prop('checked',false);
  });

  $("#btn_assign_batch").click(function(){
  	var batches='';
  	$(".chk_batch").each(function(){
  		if($(this).is(":checked")){
  			if(batches=='')
  				batches=$(this).val();
  			else
  				batches+='~'.$(this).val();
  		}
  	});
  	var class_id=$("#course_id").val();
  	

  	$.ajax({
  		type:"POST",
  		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_assign_class_to_batch.php",
  		data:{'batches':batches,'class_id':class_id},
  		dataType:"json",
  		success:function(data){
  			if(data.result==1){
  				$("#success").show();
  				$("#success").html("Class has been assigned to the batch successfully");
  			}else{
  				$("#error").show();
  				$("#error").html("Some problem occured");
  			}
  		}
  	});
  });
</script>