
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
      <a class="navbar-brand" href="#">ATTENDANCE MONITORING SYSTEM</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('/login');?>"><i class="glyphicon glyphicon-log-in" style="font-size:15px;"></i>&nbsp;&nbsp;LOGIN</a></li>
      </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <main>
  
    <div class="album bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-6"  style="margin-top: 5vh;">
            <div class="card mb-4 shadow-sm">
              <img id="dp" style="width:35vw;height:60vh;" src="<?php echo base_url('assets');?>/image/download.jpg" alt="img">

              <div class="card-body" style="padding-top:10px;">
                <div class="row">
                  <div class="col-sm-2">
                      <p id="" class="card-text">Name: </p>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" id="tb_name" readonly name="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <p id="" class="card-text">Position: </p>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" id="tb_position" readonly name="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <p id="" class="card-text">Department: </p>
                  </div>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" id="tb_department" readonly name="">
                  </div>
                </div>
               
               
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6" id="right_col" > 
            <div style="max-height:10vh;min-height: 10vh;" >

              <?php if($this->session->flashdata('status')){ 
                 $test = explode('\r\n',$this->session->flashdata('status'));            
               if((!empty($test[1])) && (count($test)>1) ){?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Message: </strong><?php echo $test[1];?>
                </div>
              <?php }
		else {?>
		 <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Message: </strong><?php echo $this->session->flashdata('status');?>
                </div>
		<?php } 
              } ?>
              

            </div>
            
            <div class="clock_container">
            <center>
            <div id="MyClockDisplay" class="clock row" onload="showTime()"></div>
            <div class="row" style="height:220px;">
            <br>
            <br>
            <br>
            <br>
            </div>
            <form method="post" action="<?php echo base_url();?>home/saveLog">
              <input type="password" name="rfid" id="rfid"/>  
              <input type="hidden" name="type" id="type" value="login_am" />
            </form>
            
            
            <br>
            <div class="button-group">
              <p><strong>AM</p>
             <button type="button" log="login_am" class="btn btn-default btn-lg btntype active_login">TIME IN - AM</button>
              <button type="button" log="logout_am" class="btn btn-default btn-lg btntype">TIME OUT - AM</button>
            </div>
            <br>
            <br>
            <div class="button-group">
              <p><strong>PM</p>
              <button type="button" log="login_pm" class="btn btn-default btn-lg btntype">TIME IN - PM</button>
              <button type="button" log="logout_pm" class="btn btn-default btn-lg btntype">TIME OUT - PM</button>
            </div>
            </div>
          </div>
        </div>
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
        $('#dp').attr('src', '<?php echo $test[5];?>');
        $("#tb_name").val('<?php echo $test[2];?>');
        $("#tb_position").val('<?php echo $test[3];?>');
        $("#tb_department").val('<?php echo $test[4];?>');
	      $("[log='<?php echo $test[0]?>']").trigger('click');
      </script>
     <?php } ?>
  </body>
</html>
