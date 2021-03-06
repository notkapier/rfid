<!DOCTYPE html>
<html lang="en">
  <head>
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

    <link href="<?php echo base_url('assets');?>/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets');?>/css/style.css" rel="stylesheet">

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
      <a class="navbar-brand" href="<?php echo base_url('/home/index');?>"><i class="glyphicon glyphicon-home" style="font-size:15px;"></i>&nbsp;Home</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li><a href="<?php echo base_url('/user/index');?>"><i class="glyphicon glyphicon-book" style="font-size:15px;"></i>&nbsp;Daily Log</a></li>
        <li><a href="<?php echo base_url('/user/myaccount');?>"><i class="glyphicon glyphicon-cog" style="font-size:15px;"></i>&nbsp;My Account</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a type="button" style="cursor:pointer;" class="btnlogout"><i class="glyphicon glyphicon-log-out" style="font-size:15px;cursor:pointer;"></i>&nbsp;Logout</a></li>
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>