<script type="text/javascript">
	$(document).ready(function()
	{
		$("#fileuploader").uploadFile({
			url:"<?php echo WEBDIR.ROOT;?>partners/ajax_file_upload.php",
			fileName:"myfile",
			allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar",
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
			allowedTypes:"jpg,png,gif,jpeg",
			onSuccess:function(files,data,xhr,pd)
			{
			   var obj=$.parseJSON(data);
  	var hid_file=$("#hid_img_file").val();
  	hid_file+='~'+obj.res;
    $("#hid_img_file").val(hid_file);
			  
			}
		});
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

	$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var project_id=$("#project_id").val();
		var type = '';
		var project_name=$("#project_name").val();
		var topic_id=$("#topic_id").val();
		var course_id=$("#course_id").val();
		var is_video;
		var project_video_link=$("#project_video_link").val();
		var project_description=tinyMCE.get('project_description').getContent();
		var project_files=$("#hid_doc_file").val();
		var valid=1;
		$("input[name='option_type']").each(function(){
			if($(this).is(":checked")==true){
				type=$(this).val();
			}
		});
		$("input[name='is_video']").each(function(){
			if($(this).is(":checked")==true){
				is_video=$(this).val();
			}
		});
		if(type=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text("Please select type");
		}
		if(project_name=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text("Please enter project name");
		}
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
		if(project_description=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text("Please enter project/assignment description");
		}
		if(valid==1){
			$.ajax({
				type:"POST",
				url:"ajax_save_projects.php",
				data:{'partner_id':partner_id,'project_id':project_id,'type':type,"project_name":project_name,"topic_id":topic_id,"course_id":course_id,'project_description':project_description,'project_files':project_files,'project_video_link':project_video_link,'is_video':is_video,'created_by':'P',},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#error").hide();
						$("#success").show();
						$("#success").text("Project saved successfully");
						window.location.href='list_projects.php';
					}else{
						$("#success").hide();
						$("#error").show("Some error occured");
					}
				}
			});
		}
		$("html, body").animate({ scrollTop: 0 }, "slow");
		e.preventDefault();
	});
	//Ghouse For Deleting the Project/Assignment from the list of Project/Assignment
	function delete_partner_project(eleObj,project_id) {
		var row_id = $(eleObj).data('row_id');
        $.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/common_partners_ajax.php",
			data:{'mode':'ajax','function':'delete_partner_project','project_id':project_id},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#error").hide();
					$("#success").show();
					$("#success").text("Project/Assignment deleted successfully");
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