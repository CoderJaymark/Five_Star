$(document).ready(function() {

	if($('#onewayTrip').is(':checked')) {
		$('#returnDate').hide();
	}

	var options = $('select.selectRoute1 option');
	var arr = options.map(function(_, o) { return { t: $(o).text(), v: o.value }; }).get();
	arr.sort(function(o1, o2) { return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0; });
	options.each(function(i, o) {
		o.value = arr[i].v;
		$(o).text(arr[i].t);
	});

	var options = $('select.selectRoute2 option');
	var arr = options.map(function(_, o) { return { t: $(o).text(), v: o.value }; }).get();
	arr.sort(function(o1, o2) { return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0; });
	options.each(function(i, o) {
		o.value = arr[i].v;
		$(o).text(arr[i].t);
	});


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


$('.tripData').click(function(){
	$('#seatModal'+$(this).attr('id')).modal('show');
});

$('.tripData').tooltip();
