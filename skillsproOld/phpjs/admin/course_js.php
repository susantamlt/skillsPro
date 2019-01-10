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
      $('#file_upload').uploadify({
        'formData'     : {
          'timestamp' : '<?php echo $timestamp;?>',
          'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
        },
        'swf'      : 'uploadify.swf',
        'uploader' : 'uploadify.php',
         'onUploadComplete' : function(file) {
                 alert('The file ' + file.name + ' finished processing.');
        } 
      });
    });

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

  $("#btn_submit").click(function(){
  	

  });
 

// 	$('#start_date,#end_date').datepick({ 
//     onSelect: customRange, showTrigger: '#calImg'}); 
     
// function customRange(dates) { 
//     if (this.id == 'start_date') { 
//         $('#end_date').datepick('option', 'minDate', dates[0] || null); 
//     } 
//     else { 
//         $('#start_date').datepick('option', 'maxDate', dates[0] || null); 
//     } 
// }
</script>