$(document).ready(function() {
	   
	   if($('#onewayTrip').is(':checked')) {
	   		$('#returnDate').hide();
	   }
	 
	   
	   
	});
  $('#roundTrip').click(function(){
	   	if($('#roundTrip').is(':checked')) {
	   		$('#returnDate').show();
	   } 
	});
   $('#onewayTrip').click(function(){
	   	if($('#onewayTrip').is(':checked')) {
	   		$('#returnDate').hide();
	   } 
	});


