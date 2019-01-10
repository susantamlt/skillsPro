<script type="text/javascript">
	$(document).ready(function()
{
  $("#fileuploader").uploadFile({
  url:"<?php echo WEBDIR.ROOT;?>partners/ajax_file_upload.php",
  fileName:"myfile",
  allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,mp3,mpeg4,mpeg,avi,mp4",
  onSuccess:function(files,data,xhr,pd)
  {
    var obj=$.parseJSON(data);
  	var hid_file=$("#hid_doc_file").val();
  	hid_file+='~'+obj.res;
    $("#hid_doc_file").val(hid_file);
    
  }
  });
  $("#fileuploader_img").uploadFile({
  url:"<?php echo WEBDIR.ROOT;?>partners/ajax_file_upload.php",
  fileName:"myfile",
  allowedTypes:"jpg,png,gif,jpeg,mp3,mpeg4,mpeg,avi",
  onSuccess:function(files,data,xhr,pd)
  {
  	var hid_img_file=$("#hid_img_file").val();
  	hid_img_file+='~'+files;
    $("#hid_img_file").val(hid_img_file);
    
  }
  });
});

$(".pl").click(function(){
	var id=$(this).data('nextid');
	$("#"+id).show();
});
$(".mi").click(function(){
	var id=$(this).data('currid');
	$("#"+id).hide();
});
$("#topic_id").change(function(){
      var topic_id=$(this).val();
      $.ajax({
        type:"POST",
        url:"ajax_course_by_topic.php",
        data:{'topic_id':topic_id,'partner_id':$("#partner_id").val()},
        success:function(data){
          $("#course_id").html(data);
        }
      });
  });
$("#course_id").change(function(){
      var course_id=$(this).val();
      $.ajax({
        type:"POST",
        url:"ajax_chapter_by_course.php",
        data:{'course_id':course_id,'partner_id':$("#partner_id").val()},
        success:function(data){
          $("#chapter_id").html(data);
        }
      });
  });
$("#btn_submit").click(function(e){
	var topic_id=$("#topic_id").val();
	var course_id=$("#course_id").val();
  var chapter_id=$("#chapter_id").val();
  var object_id=$("#object_id").val();
	var uploaded_file_name=$("#hid_doc_file").val();
	
	
	var url_of_the_object=$("#url_of_the_object").val();
	
  var minimum_time_to_spent=$("#minimum_time_to_spent").val();
  
  var point_secured=$("#point_secured").val();
  
  var library_file_title=$("#library_file_title").val();
 
	var partner_id=$("#partner_id").val();

  var mode=$("#mode").val();

  var library_file_id=$("#library_file_id").val();
	
	var valid=1;

	if(topic_id=='' && valid==1){
		valid=0;
		$("#error").show();
		$("#error").text("Please select topic");
	}

	if(course_id=='' && valid==1){
		valid=0;
		$("#error").show();
		$("#error").text("Please select Course");
	}
  if(chapter_id=='' && valid==1){
    valid=0;
    $("#error").show();
    $("#error").text("Please select Chapter");
  }
  if(chapter_id=='' && valid==1){
    valid=0;
    $("#error").show();
    $("#error").text("Please select Chapter");
  }
  if(library_file_title=='' && valid==1){
    valid=0;
    $("#error").show();
    $("#error").text("Please enter Title");
  }
    
    if(valid==1){
    	$.ajax({
    		type:"POST",
    		url:"ajax_save_file.php",
    		data:{"topic_id":topic_id,"course_id":course_id,"chapter_id":chapter_id,"object_id":object_id,"uploaded_file_name":uploaded_file_name,'url_of_the_object':url_of_the_object,'minimum_time_to_spent':minimum_time_to_spent,'point_secured':point_secured,'library_file_title':library_file_title,'created_by':'P','created_id':partner_id,'mode':mode,'library_file_id':library_file_id},
    		dataType:"json",
    		success:function(data){
    			if(data.result==1){
    				$("#error").hide();
    				$("#success").show();
    				$("#success").text("File(s) saved successfully");
    			}else{
    				$("#success").hide();
    				$("#error").show("Some error occured");
    			}
    		}
    	});
    }
	
	e.preventDefault();
});	

</script>