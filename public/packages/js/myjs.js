var total = 0;
$(document).ready(function() {

	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() +9 , 0, 0, 0, 0);

	$('#filter_depart').datepicker({
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
	});
	$('.hidden_filters').hide();
	if($('#onewayTrip').is(':checked')) {
		$('#returnLabel').hide();
		$('#returnDate').hide();
	}

	$('.departure_field').show();
	$('#query').text("Show all bus leaving on " + $('#filter_depart').val());
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
///////////////for prices
	
  var id = 0;
    $('.prices').click(function(event){
      var idString = $(event.target).attr("class");
      id = idString.replace( /^\D+/g, '');
      var price = $('#hiddenPrice'+id).val();
      if(this.checked)
        total += parseInt(price);
      else
        total -= parseInt(price);
      // alert(id +" " +price+" " +total);
     var l = "price"+id;
      $("label[for="+l).text("Price: ₱ "+ total);

    });
    $('.terms').click(function(event){
      if(this.checked) {
        $('#agree'+id).attr('disabled', false);
      } else {
        $('#agree'+id).attr('disabled', true);
      }

    });
});
$('#roundTrip').click(function(){
	if($('#roundTrip').is(':checked')) {
		$('#returnLabel').show();
		$('#returnDate').show();
	} 
});
$('#onewayTrip').click(function(){
	if($('#onewayTrip').is(':checked')) {
		$('#returnLabel').hide();
		$('#returnDate').hide();
	} 
});


$('.tripData').click(function(){
	$('#seatModal'+$(this).attr('id')).modal('show');
});

$('.tripData').tooltip();

$('.filterSelect').change(function(){
	$('.hidden_filters').hide();
	var filter = $('select.filterSelect').val();
	if(filter == "1") {
		$('#query').text("Show all bus leaving on " + $('#filter_depart').val());
		$('.departure_field').show();
	} else if(filter == "2") {
		$('#query').text("Show all bus going to " + $('.filterSelect1 option:selected').text());
		$('.destination_field').show();
	} else if(filter == "3") {
		$('#query').text("Show all bus leaving from " + $('.filterSelect2 option:selected').text());
		$('.origin_field').show();
	} else if(filter == "4") {
		if($('#filter_aircon').is(':checked')) {
			$('#query').text("Show all Aircon bus");
		} else {
			$('#query').text("Show all Ordinary bus");
		}
		$('.type_field').show();
	} 
});

$('#filter_depart').on('changeDate', function(ev){
	$('#query').text("Show all bus leaving on " + $('#filter_depart').val());
});

$('.filterSelect1').change(function(){
	$('#query').text("Show all bus going to " + $('.filterSelect1 option:selected').text());
});

$('.filterSelect2').change(function(){
	$('#query').text("Show all bus leaving from " + $('.filterSelect2 option:selected').text());
});

$('#filter_aircon').click(function(){
	$('#query').text("Show all Aircon bus");
});

$('#filter_ordinary').click(function(){
	$('#query').text("Show all Ordinary bus");
});

$('.modal').on('hidden.bs.modal', function(){
	total = 0;
	$id = $(this).attr('id').replace( /^\D+/g, '');
	$('input:checkbox').removeAttr('checked');
	$("label[for="+"price"+$id).text("Price: ₱ 0");
});
////////////////////////////////////////////////

