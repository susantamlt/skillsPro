<script type="text/javascript">
	$(document).ready(function()
	{
		$("#fileuploader").uploadFile({
			url:"<?php echo WEBDIR.ROOT;?>students/ajax_file_upload.php",
			fileName:"myfile",
			allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar",
			onSuccess:function(files,data,xhr,pd)
			{

			  var hid_file=$("#hid_doc_file").val();
			  var ff=$.parseJSON(data);
			  hid_file+='~'+ff.res;
			  $("#hid_doc_file").val(hid_file);
			
			  
			}
		});
	});

	$("#btn_submit").click(function(e){
		var student_id=$("#student_id").val();
		var project_id=$("#project_id").val();
		var p_type=$("#p_type").val();
		var project_description=tinyMCE.get('project_description').getContent();;
		var project_files=$("#hid_doc_file").val();
		var valid=1;
		
		if(project_description=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text("Please enter project/assignment description");
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
						$("#success").text("Project saved successfully");
						if(p_type!='A')
							window.location.href='my-projects.php';
						else
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