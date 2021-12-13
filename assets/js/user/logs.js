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
			$('.table-responsive').html(data);
			$('#table1').DataTable();
		},
		error: function(){

		},
	});
});


$(document).on('click','.btnSaveChanges',function(){
	let x = 0;
	let logs = [];
	$('.log').each(function(){
		let val = $(this).val().trim();
		let oldval = $(this).attr('oldval').trim();
		let name = $(this).attr('name');
		console.log(name);
		if(val!=oldval){
			x=1;
			let newLog = {
				"name": name,
				"value":val,
			};
			logs.push(newLog);
		}
	});
	if(x==0){
		swal('Error','There are no changes!', 'warning');
		return;
	}
	else{
		console.log(logs);
		swal({
	      title: "Save changes?",
	      text: "Are you sure?",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((proceed) => {
	      if (proceed) {
	       $.ajax({
	            url: base_url+'/user/saveLogChanges',
	            type: "POST",
	            dataType: "JSON",
	            data:logs,
	            success: function(data) {
	               window.location = data.url;
	            },
	        });
	      } else {
	        swal("Message","Saving cancelled", "warning");
	      }
	    });
	}
})

$(document).on('click','.btnPrint',function(){
	let year = $('#dd_year').val();
	let month = $('#dd_month').val();

	let request = year + '_' + month;
    let url =  base_url + 'user/printLogs/'+request,
	newWindow = window.open(url, "_blank");
	newWindow.focus();
	newWindow.print();
})