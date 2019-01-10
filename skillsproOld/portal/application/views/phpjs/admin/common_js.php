 <script type="'text/javascript'">
 	$(document).ready(function(){
        $("#state").change(function(){
        	alert('aa');
            $state_id=$(this).val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/common/get_cities",
                data:{"state_code":$state_id},
                success:function(data){
                	$("#cities").html(data);
                }
            });
        });
});
    </script>