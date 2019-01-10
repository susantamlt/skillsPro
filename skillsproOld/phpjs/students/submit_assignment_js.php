<script type="text/javascript">
	$(document).ready(function()
	{
		$("#fileuploader").uploadFile({
			url:"<?php echo WEBDIR.ROOT;?>students/common_ajax_students.php",
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
	});

	$("#btn_submit").click(function(e){
		var student_id=$("#student_id").val();
		var project_id=$("#project_id").val();
		
		var project_description=tinyMCE.get('project_description').getContent();
		var project_files=$("#hid_doc_file").val();
		var valid=1;
		alert(project_description);
		if(project_description=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text("Please enter assignment description");
		}
		if(valid==1){
			$.ajax({
				type:"POST",
				url:"ajax_student_projects.php",
				data:{'student_id':student_id,'project_id':project_id,'project_description':project_description,'project_files':project_files},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#error").hide();
						$("#success").show();
						$("#success").text("Assignment saved successfully");
						window.location.href='my-assignments.php';
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
	
</script>