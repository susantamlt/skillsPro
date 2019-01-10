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
  	var batch_name=$("#batch_name").val();
  	var center_id=$("#center_id").val();
  	var partner_id=$("#partner_id").val();
  	var city_id=$("#city_id").val();
  	var start_date=$("#start_date").val();
  	var end_date=$("#end_date").val();
  	var valid=1;
  	if(batch_name=='' && valid==1){
  		valid=0;
  		$("#error").show();
  		$("#error").text("Please enter batch name");
  	}

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