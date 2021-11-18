$(document).on('change','#dd_year, #dd_month',function(){
	let year = $('#dd_year').val();
	let month = $('#dd_month').val();
	let invoker = $(this).attr('id').replace('dd_','');

	$.ajax({
		url: base_url + 'user/getLogs',
		data:{
			year: year,
			month: month,
			invoker: invoker,
		},
		type: 'GET',
		dataType: 'html',
		success: function(data){
			$('#recordsDiv').html(data);
			$('#table1').DataTable();
		},
		error: function(){

		},
	});
})