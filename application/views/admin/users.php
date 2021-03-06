<main>
  
    <div class="album bg-light">
      <div id="recordsDiv" class="container">
        <button class="btn btn-sm btn-success pull-right btnadduser"><i class="glyphicon glyphicon-plus"></i>&nbsp;ADD NEW USER</button>
        <div class="row" style="padding-top: 3vh;margin-top:3vh">
          <div class="col-sm-12">
            <div class="table-responsive">
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Position</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $x=0;
                if(!empty($user)){?>
                  <?php foreach($user as $row){?>
                    <tr>
                      <td><?php $x++; echo $x;?></td>
                      <td><?php echo $row['fullname'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['position'];?></td>
                      <td><?php echo $row['department'];?></td>
                      <td>
                        <?php if($row['deactivated']==0){?>
                          <button class="btn btn-sm btn-danger btnDisableUser" userid="<?php echo $row['id'];?>"><i class="glyphicon glyphicon-ban-circle"></i>&nbsp;DISABLE</button>
                        <?php 
                          }else {?>
                          <button class="btn btn-sm btn-success btnEnableUser" userid="<?php echo $row['id'];?>"><i class="glyphicon glyphicon-check"></i>&nbsp;ENABLE</button>
                          <?php } ?>
                        <button class="btn btn-sm btn-warning btnEditUser" userid="<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit"></i>&nbsp;EDIT</button>
                        
                      </td>
                    </tr>
                    <?php }?>
                  <?php } else{ ?>
                      <p>No records found!</p>
                  <?php }?> 
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </div>

      <div class="usersForm container hide">
      <div class="col-sm-12">
      <hr>
      <h4><strong><i class="glyphicon glyphicon-user"></i>&nbsp;USER INFORMATION</strong></h4>
      <hr>
      <div class="row">
        <form class="userForm" enctype="multipart/form-data">
        <input type="hidden" name="user_id" id="user_id" value="0">
        <div class="col-sm-3">
          <label>RFID</label>
          <input class="form-control" type="password" name="rfid"  id="rfid"/>  
        </div>
        <div class="col-sm-3">
          <label>Last Name</label>
          <input type="hidden" id="teacher_userid" value="0">
          <input class="form-control" type="text" name="lastname"  id="lastname"/>  
        </div>  
        <div class="col-sm-3">
          <label>First Name</label>
          <input class="form-control" type="text" name="firstname"  id="firstname"/>  
        </div>  
        <div class="col-sm-3">
          <label>Middle Name</label>
          <input class="form-control" type="text" name="middlename"  id="middlename"/>  
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <label>Email</label>
          <input class="form-control" type="email" name="email"  id="email"/>  
        </div>
        <div class="col-sm-3">
          <label>Password</label>
          <input class="form-control" type="password" name="password"  id="password" placeholder="1234wasd" />  
        </div>   
      </div>
      <hr>
      <div class="row">
          <div class="col-sm-3">
             <label>Position</label>
             <input class="form-control" type="position" name="position"  id="position"/> 
          </div>
          <div class="col-sm-3">
             <label>Department</label>
             <input class="form-control" type="department" name="department"  id="department"/> 
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
        <button class="btn btn-warning btnCancelUser"><i class="glyphicon glyphicon-remove"></i>&nbsp;CANCEL</button>
        <button class="btn btn-success btnSubmitUser"><i class="glyphicon glyphicon-saved"></i>&nbsp;SUBMIT</button>
        </div>    
      </div>
  </div>
      </div>
      

  </main>