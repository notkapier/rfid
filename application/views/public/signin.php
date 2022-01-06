
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="icon" href="../rfid/logo.png"
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets');?>/favicon.ico">

    <title>RFID</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets');?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets');?>/css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url('assets');?>/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets');?>/js/ie-emulation-modes-warning.js"></script>

    <link href="<?php echo base_url('assets');?>/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url('assets');?>/css/signin.css" rel="stylesheet">

    <script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head> 

  <body>

    

    <!-- Fixed navbar -->
   <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ATTENDANCE MONITORING SYSTEM</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/home');?>"><i class="glyphicon glyphicon-repeat" style="font-size:15px;"></i>&nbsp;Return</a></li>
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <main>
  
    <div class="album bg-light">
      <div class="container">

        <form class="form-signin" method="POST" action="<?php echo base_url('/login/signin');?>" style="margin-top: 10vh;">
          <center><h2 class="form-signin-heading">PLEASE SIGN IN</h2></center>
          <center><i class="glyphicon glyphicon-envelope" style="font-size:20px;"></i></center><label for="inputEmail" class="sr-only">Email Address</label>
          <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus>
		  <br>
          <center><i class="glyphicon glyphicon-lock" style="font-size:20px;"></i></center><label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
          <div class="checkbox">
            
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="glyphicon glyphicon-log-in" style="font-size:15px;"></i>&nbsp;&nbsp;Sign in</button>
        </form>
      </div>
    </div>

  </main>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets');?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets');?>/js/ie10-viewport-bug-workaround.js"></script>
     <script src="<?php echo base_url('assets');?>/js/client.js"></script>

     <?php if($this->session->flashdata('status')){ 
     
     $test = explode('\r\n',$this->session->flashdata('status')); ?>
     
     <script type="text/javascript">
            alert('nothing')
            // $('#dp').attr('src','<?php echo $test[4];?>');
            $('#dp').attr('src', '<?php echo $test[4];?>');
            
            $("#tb_name").val('<?php echo $test[1];?>');
            $("#tb_position").val('<?php echo $test[2];?>');
            $("#tb_department").val('<?php echo $test[3];?>');
          </script>';
     <?php } ?>
  </body>
</html>
