<main>
  
    <div class="album bg-light">
      <div class="usersForm container">
      <div class="col-sm-12">
      <hr>
      <h4><strong><i class="glyphicon glyphicon-user"></i>&nbsp;MY INFORMATION</strong></h4>
      <hr>
      <div class="row">
        <form class="userForm" enctype="multipart/form-data">
      </div>
      <div class="row">
        <div class="col-sm-3">
          <label><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Email Address:</label>
          <input class="form-control" type="email" name="email" value="<?php echo $user['email'];?>"  id="email"/>  
        </div>
        <div class="col-sm-3">
          <label><i class="glyphicon glyphicon-lock"></i>&nbsp;&nbsp;Password:</label>
          <input class="form-control" type="password" name="password"  id="password" placeholder="1234wasd" />  
        </div>   
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6">
            <input type="file" class="custom-file-input" name="image"  accept="image/png, image/gif, image/jpeg" id="image"
              aria-describedby="inputGroupFileAddon02">
        </div>
      </div>
      </form>
      <hr>
      <div class="row pull-right">
        <div class="col-sm-12">
        <button class="btn btn-success btnSubmitUser"><i class="glyphicon glyphicon-check"></i>&nbsp;SUBMIT</button>
        </div>    
      </div>
  </div>
      </div>
      

  </main>