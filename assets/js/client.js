$("#rfid").css({
   position: 'absolute',
   top: '-100px'
});

window.onload = function() {
  document.getElementById("rfid").focus();
}
// define variables that reference elements on our page
const myForm = document.forms[0];



// // listen for the form to be submitted and add a new dream when it is
myForm.onsubmit = function (event) {
  // TODO: check the text isn't more than 100chars before submitting0859404274
  var rfid = document.getElementById("rfid").value;
  if (rfid.length==10){
  	document.getElementById("rfid").reset();
  }
  event.preventDefault();

  
};

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    // var time = h + ":" + m + ":" + s + " "+ session;
    var time = h + ":" + m +" "+ session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();	



$('.btntype').on('click',function(){
  let type = $(this).attr('log');
  $(".active_login").removeClass('active_login');
  $('#type').val(type);
  $(this).addClass('active_login');
  $('#rfid').focus();
});

$('.confirm').on('click',function(){
  $('#rfid').focus();
})

$('#btnsignin').on('click',function(){
  // $('#header').addClass('hidden');
  $('#main').addClass('hidden');
  $('#mySignin').fadeIn().addClass('mySignin');
})

$('.btnlogin').on('click',function(){
  let username = $('#username').val();
  let password = $('#password').val();
  $.ajax({
    url:base_url + 'login/signin',
    type:'POST',
    data:{
      username: username,
      password: password,
    },
    dataType:'json',
    crossDomain: true,
    success:function(data){
      console.log(data);
    },
    error: function(){

    },
  })
});