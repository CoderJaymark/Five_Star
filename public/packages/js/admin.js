$(document).ready(function(){
	var ordinary = false;
	$('#BusType').change(function(){

		ordinary?$('#seats').val("51"):$('#seats').val("41");
		ordinary = !ordinary;
	});
	$('#bustype_modify').change(function(){
		var ordinary = $('#bustype_modify option:selected').text()=='Ordinary'?true:false;
		ordinary?$('#seats_modify').val("51"):$('#seats_modify').val("41");
		ordinary = !ordinary;
	});
	$('#modify_busid').change(function(){
		$('#busid_to_delete').val($('#modify_busid option:selected').text());
		var busid = "#bus" + $('#modify_busid option:selected').text();
		var details = $(busid).val().split(",");
		$('#busno_modify').val(details[0]);
		$('#busplate_no_modify').val(details[1]);
		$('#bustype_modify').val(details[2]);
		$('#seats_modify').val(details[3]);
		$('#modify_busstatus').val(details[4]);
		
	});
	$('#editButton').click(function(){
		$('.editable').attr('disabled', false);
	});
	$('.editable').attr('disabled', true);
	$('.editButtons').hide();
});
function removeDisable() {
	$('.modifyButtons').hide();
	$('.editButtons').show();
	$('#busid_modify').attr('disabled', true);
	$('.editable').attr('disabled', false);
}

function addDisable() {
	$('.editButtons').hide();
	$('.modifyButtons').show();
	$('#busid_modify').attr('disabled', false);
	$('.editable').attr('disabled', true);
	var busid = "#bus" + $('#busid_modify option:selected').text();
	var details = $(busid).val().split(",");
	$('#busno_modify').val(details[0]);
	$('#busplate_no_modify').val(details[1]);
	$('#bustype_modify').val(details[2]);
	$('#seats_modify').val(details[3]);
	$('#busstatus_modify').val(details[4]);
}

