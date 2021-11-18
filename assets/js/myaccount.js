$(document).on('click','.btnSubmitAdmin',function(){
	let email = $('#email').val();
	let password = $('#password').val();
	if(email.length==0){
		swal('Error','Invalid email', 'warning');
		return;
	}
	if(password.length > 0 && password.length < 8){
		swal('Error','Invalid password','warning');
		return;
	}

	$.ajax({
		url:base_url + '/admin/updateAdmin',
		type:'POST',
		dataType: 'json',
		data:{
			email: email,
			password:password
		},
		success: function(data){
			swal('success','You have updated your account','success');
			$('#password').val('');
		},	
		error: function(){
			swal('error','Something went wrong, try again later','error');
		},
	})
});