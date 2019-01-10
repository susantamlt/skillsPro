<script type="text/javascript">
	$("#city_id").change(function(){
		var city_id=$(this).val();
		var partner_id=$("#partner_id").val();

		$.ajax({
			type:"POST",
			url:"ajax_center.php",
			data:{"city_id":city_id,'partner_id':partner_id},
			success:function(data){
				$("#center_id").html(data);
			}
		});
	});
  $("#topic_id").change(function(){
      var topic_id=$(this).val();
      $.ajax({
        type:"POST",
        url:"ajax_chapter.php",
        data:{'topic_id':topic_id},
        success:function(data){
          $("#chapter_id").html(data);
        }
      });
  });
  <?php $timestamp = time();?>
    

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

$(document).ready(function()
{
  $("#fileuploader").uploadFile({
  url:"<?php echo WEBDIR.ROOT;?>partners/ajax_file_upload.php",
  fileName:"myfile",
  onSuccess:function(files,data,xhr,pd)
  {
    
	var obj=$.parseJSON(data);
  	var hid_file=$("#course_pic").val();
  	hid_file+='~'+obj.res;
    $("#course_pic").val(hid_file);

  }
  });
});


	$("#btn_submit").click(function(e){
		var course_name=$("#course_name").val();
		var topic_id=$("#topic_id").val();
		var chapters=$("#chapter_id").val();
		if (chapters != '' && chapters != null) {
			var chapter_id=chapters.join('~');
        }else{
			var chapter_id='';
		}
		var city_id=$("#city_id").val();
		var center_id=$("#center_id").val();
		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();
		var course_mode = '';
		$("input[name=course_mode]").each(function(){
		  if($(this).is(":checked")){
			course_mode=$(this).val();
		  }
		});
		var course_preview_video=$("#course_preview_video").val();
		var course_description=tinyMCE.get('course_description').getContent();//$("#course_description").val();
		var course_pic=$("#course_pic").val();
		var course_id=$("#course_id").val();
		
		var partner_id=$("#partner_id").val();
		var valid=1;
		if(course_name=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please enter course name");
		  valid=0;
		}
  
		if(topic_id=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select topic");
		  valid=0;
		}
		if((chapters == "" || chapters == null) && valid==1){
			$("#error").show();
			$("#error").text("Please select at least one chapter");
			valid=0;
		}
		if(city_id=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select city");
		  valid=0;
		}
		if(center_id=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select center");
		  valid=0;
		}
		if(start_date=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select start date");
		  valid=0;
		}
		if(end_date=='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select end date");
		  valid=0;
		}
		if(course_mode =='' && valid==1){
		  $("#error").show();
		  $("#error").text("Please select course mode");
		  valid=0;
		}
		if(course_description == '' && valid==1){
			$("#error").show();
			$("#error").text("Please enter some course description");
			valid=0;
		}
		
		if(valid==1){
		  $.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_course.php",
			data:{"course_name":course_name,'topic_id':topic_id,'city_id':city_id,'partner_id':partner_id,'center_id':center_id,'start_date':start_date,'end_date':end_date,'chapter_id':chapter_id,'course_preview_video':course_preview_video,'course_mode':course_mode,'course_description':course_description,'course_pic':course_pic,'course_id':course_id},
			dataType:"json",
			success:function(data){
			  if(data.result==1){
				$("#error").hide();
				$("#success").show();
				$("#success").text("Course added successfully");
				window.location.href="list_courses.php";
				setTimeout(function(){  }, 2000);
			  }else{
				$("#error").show("some problem happened");
			  }
			}
		  });
		}
		$('html, body').animate({ scrollTop: 0 }, 'slow');
		e.preventDefault();
	});
	//Ghouse For Deleting the Center from the list of Centers
	function delete_partner_course(eleObj,course_id) {
		var row_id = $(eleObj).data('row_id');
        $.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/common_partners_ajax.php",
			data:{'mode':'ajax','function':'delete_partner_course','course_id':course_id},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#error").hide();
					$("#success").show();
					$("#success").text("Center deleted successfully");
					location.reload();
					setTimeout(function(){ 
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