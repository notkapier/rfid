$(document).on('click','.btnadduser',function(){
	$('#recordsDiv').hide();
	$('.usersForm').removeClass('hide');
	$(this).hide();
});


$(document).on('click','.btnSubmitUser',function(){
	let rfid = $('#rfid').val();
	let lastname = $('#lastname').val();
	let firstname = $('#firstname').val();
	let middlename = $('#middlename').val();
	let email = $('#email').val();
	let password = $('#password').val();
	let userid = $('#user_id').val();

	 let msg = '';
	  if(!rfid){
        msg += ' \nInvalid rfid';
      }
      if(!lastname){
        msg += ' \nInvalid lastname';
      }
      if(!firstname){
        msg += ' \nInvalid firstname';
      }
      if(!middlename){
        msg += ' \nInvalid middlename';
      }
      if(!position){
        msg += ' \nInvalid position';
      }
      if(!department){
        msg += ' \nInvalid department';
      }
      if(!email){
        msg += ' \nInvalid email';
      }
      if(password.length < 8 && password.length > 0 && userid!=0){
        msg += ' \nPassword should be equal or more than 8 characters';
      }
      else if(password.length < 8 && userid==0 ){
         msg += ' \nPassword should be equal or more than 8 characters';
      }

      if(( document.getElementById("image").files.length == 0 ) && (userid==0) ){
  		 msg += ' \nFile should not be empty';
  	  }
      if(msg){
        swal("Invalid!", msg, 'warning');  
        return
      }

      var form = $('.userForm')[0]; // You need to use standard javascript object here
		  var formData = new FormData(form);
       
      $.ajax({
      	url:base_url + '/admin/saveUser',
      	type:'POST',
      	data: formData,
      	dataType:'json',
      	cache: false,
        contentType: false,
        processData: false,
      	success:function(data){
      		if(data.status=='success'){
      			swal("Success!", msg, 'success'); 
      			 location.reload()
      		}
      		else{
      			swal("Error!", msg, 'warning'); 
      		}
      	},
      	error:function(){
      		swal("Error!", 'Something went wrong, please contact administrator', 'warning'); 
      	},
      })

});

$(document).on('click','.btnCancelUser',function(){

	$('#recordsDiv').fadeIn();
	$('.usersForm').addClass('hide');
	$('.btnadduser').show();
	$('#user_id').val(0);

  $('#firstname').val('');
  $('#middlename').val('');
  $('#lastname').val('');
  $('#email').val('');
  $('#position').val('');
  $('#department').val('');
  $('#rfid').val('');


});

$(document).on('click','.btnEditUser',function(){
	let userid = $(this).attr('userid');
	$('#user_id').val(userid);
	$.ajax({
		url: base_url + '/admin/getUser/'+ userid,
		type: 'GET',
		dataType: 'json',
		success: function(data){
			if(data.status){
				swal("Error!", data.type, 'warning'); 
			}
			else{
				$('#firstname').val(data.firstname);
				$('#middlename').val(data.middlename);
				$('#lastname').val(data.lastname);
				$('#email').val(data.email);
				$('#position').val(data.position);
				$('#department').val(data.department);
				$('#rfid').val(data.rfid);
				$('#recordsDiv').hide();
				$('.usersForm').removeClass('hide');
				$('.btnadduser').hide();
			}
		},
		error: function(){

		},
	})
});

$(document).on('click','.btnDisableUser',function(){
  let userid = $(this).attr('userid');
  swal({
        title: "Disable this user?",
        text: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((proceed) => {
        if (proceed) {
         $.ajax({
              url: base_url+'admin/disableUser/'+userid,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                 window.location = data.url;
              },
          });
        } else {
          swal("Message","Disabling cancelled", "warning");
        }
      });
});

$(document).on('click','.btnEnableUser',function(){
  let userid = $(this).attr('userid');
  swal({
        title: "Enable this user?",
        text: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((proceed) => {
        if (proceed) {
         $.ajax({
              url: base_url+'admin/enableUser/'+userid,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                 window.location = data.url;
              },
          });
        } else {
          swal("Message","Enabling cancelled", "warning");
        }
      });
})