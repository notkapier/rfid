$(document).on('click','.btnSubmitUser',function(){
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

	var form = $('.userForm')[0]; // You need to use standard javascript object here
		  var formData = new FormData(form);
       
      $.ajax({
      	url:base_url + '/user/updateAccount',
      	type:'POST',
      	data: formData,
      	dataType:'json',
      	cache: false,
        contentType: false,
        processData: false,
      	success:function(data){
      		if(data.status=='success'){
      			swal("Success!", 'Successfuly updated account', 'success'); 
      			 location.reload()
      		}
      		else{
      			swal("Error!", "Something went wrong", 'warning'); 
      		}
      	},
      	error:function(){
      		swal("Error!", 'Something went wrong, please contact administrator', 'warning'); 
      	},
      })
});