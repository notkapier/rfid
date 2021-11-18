$(document).on('change','#dd_year, #dd_month, #dd_user',function(){
	let year = $('#dd_year').val();
	let month = $('#dd_month').val();
	let user = $('#dd_user').val();
	let invoker = $(this).attr('id').replace('dd_','');

	$.ajax({
		url: base_url + 'admin/getLogs',
		data:{
			year: year,
			month: month,
			user: user,
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