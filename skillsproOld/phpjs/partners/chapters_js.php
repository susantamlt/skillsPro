<script type="text/javascript">
	$(document).ready(function(){
		$(document).ready(function()
			{
			  $("#fileuploader").uploadFile({
			  url:"<?php echo WEBDIR.ROOT;?>partners/ajax_file_upload.php",
			  fileName:"myfile",
			  onSuccess:function(files,data,xhr,pd)
			  {
			    
				var obj=$.parseJSON(data);
			  	var hid_file=$("#hid_doc_file").val();
			  	hid_file+='~'+obj.res;
			    $("#hid_doc_file").val(hid_file);

			  }
			  });
			});
	});
	$("#btn_submit").click(function(e){
		
		var chapter_name=$("#chapter_name").val();
		var partner_id=$("#partner_id").val();
		var topic_id=$("#topic_id").val();
		var mode=$("#mode").val();
		var chapter_id=$("#chapter_id").val(); 
		var chapter_price=$("#chapter_price").val();
		var currency=$("#currency").val();
		var chapter_pic=$("#hid_doc_file").val();
		var valid=1;

		if(valid==1 && chapter_name==''){
			$("#error").show();
			$("#error").text("Please enter chapter name");
			valid=0;
		}

		if(valid==1){
			$.ajax({
				type:"POST",
				url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_chapter.php",
				data:{"chapter_name":chapter_name,"chapter_price":chapter_price,"currency":currency,"chapter_pic":chapter_pic,"partner_id":partner_id,'mode':mode,'topic_id':topic_id,'chapter_id':chapter_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#success").show();
						$("#error").hide();
						$("#success").text("Successfully added topic");
						setTimeout(function(){ window.location.href="list_chapters.php"; }, 2000);
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

	//Ghouse For Deleting the Chapter from the list of Chapters
	function delete_patner_chapter(eleObj,chapter_id) {
		var row_id = $(eleObj).data('row_id');
        $.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/common_partners_ajax.php",
			data:{'mode':'ajax','function':'delete_patner_chapter','chapter_id':chapter_id},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#error").hide();
					$("#success").show();
					$("#success").text("Center deleted successfully");
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