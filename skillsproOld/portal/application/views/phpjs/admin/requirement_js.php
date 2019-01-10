<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
	url:"<?php echo base_url();?><?php echo config_item('index_page');?>/portal/admin/requirement/save_file",
	fileName:"myfile"
	});
});
</script>