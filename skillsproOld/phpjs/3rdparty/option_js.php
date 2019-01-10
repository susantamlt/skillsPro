<script type="text/javascript">
$(".opt_plus").click(function(){
  var next= $(this).data('next');
  $("#"+next).show();
});

$(".opt_minus").click(function(){
  var curr= $(this).data('next');
  $("#"+curr).hide();
});
$("#btn_submit").click(function(e){
	var opt='';
  var is_right='';
  var is_right_count=0;
  var i=0;
  var valid=1;
  $("input[name='opt']").each(function(){
    if($(this).val()!=''){
    if(opt=='')
      opt+=$(this).val();
    else
      opt+='~'+$(this).val();
    var id=$(this).attr('id');
    var id_right=id.replace('option_','is_right_');
    
    if($("#"+id_right).is(":checked")){
      is_right="Y";
      is_right_count++;
    }else{
      is_right="N";
    }
    opt+='#$'+is_right;
    i++;
   } 
  });
  alert(i);
  if(opt=='' && valid==1){
    $("#error").show();
    $("#error").text("Please enter Options");
    valid=0;
  }

  if(i<1 && valid==1)
  {
    $("#error").show();
    $("#error").text("Please enter atleast two Options");
    valid=0;
  }

  if(is_right_count>0 && valid==1){
    $("#error").show();
    $("#error").text("Please check the right answer");
    valid=0;
  }

  if(valid==1){
    $.ajax({
      type:"POST",
      url:"ajax_save_options.php",
      data:{"option":opt,"question_id":$("#question_id").val()},
      dataType:"json",
      success:function(data){
        if(data.result==1){
          $("#success").show();
          $("#error").hide();
          $("#success").text("Options saved successfully");
        }
      }
    });
  }
  e.preventDefault();
});	

</script>