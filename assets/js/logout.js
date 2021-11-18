$(document).on('click','.btnlogout',function(){

    swal({
      title: "Logout?",
      text: "Are you sure?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
       $.ajax({
            url: base_url+'/admin/logout',
            type: "POST",
            dataType: "JSON",
            success: function(data) {
               window.location = data.url;
            },
        });
      } else {
        swal("logout cancelled");
      }
    });
});