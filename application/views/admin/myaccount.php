<main>
<link rel="icon" href="../rfid/logo.png"
    <div class="album bg-light">
      <div class="usersForm container">
      <div class="col-sm-12">
      <hr>
      <h4><strong><i class="glyphicon glyphicon-cog"></i>&nbsp;MY ACCOUNT</strong></h4>
      <hr>
      <div class="row">
          <div class="row">
            <div class="col-sm-3">
              <label><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Email Address:</label>
              <input class="form-control" type="email" name="email" value="<?php echo $admin['email'];?>"  id="email"/>  
            </div>
            <div class="col-sm-3">
              <i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;<label>Password:</label>
              <input class="form-control" type="password" name="password"  id="password" placeholder="1234wasd" />  
            </div>   
          </div>
          <hr>
          <div class="row pull-right">
            <div class="col-sm-12">
            <button class="btn btn-success btnSubmitAdmin"><i class="glyphicon glyphicon-saved"></i>&nbsp;SUBMIT</button>
            </div>    
          </div>
      </div>
      </div>
  </main>