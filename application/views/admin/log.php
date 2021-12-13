<main>
  
    <div class="album bg-light">
      <div id="recordsDiv" class="container">
        <div class="row">
          <div class="col-sm-2">
            <select id="dd_year" class="form-control">
              <?php foreach($year as $row){?>
              <option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
              <?php } ?>
            </select>  
          </div>
          <div class="col-sm-2">
            <select id="dd_month" class="form-control">
              <?php foreach($month as $row){?>
              <option value="<?php echo $row['month'];?>"><?php echo $row['monthname'];?></option>
              <?php } ?>
            </select>  
          </div>
          <div class="col-sm-2">
            <select class="select2 form-control" id="dd_user">
               <?php foreach($user as $row){?>
              <option <?php if($userid==$row['id']){ echo "selected"; }?> value="<?php echo $row['id'];?>"><?php echo $row['fullname'];?></option>
              <?php } ?>
            </select>  
          </div>
          <button class="btn btn-sm pull-right btnPrint">Print</button>
          <button class="btn btn-sm pull-right btn-success btnSaveChanges">Save Changes</button>  
        </div>
        <div class="row" style="padding-top: 3vh">
          <div class="col-sm-12 myTable">
            <div class="table-responsive">
            <table class="table table-striped" id="">
              <thead>
                <tr>
                  <th  style="width:100px;">Day</th>
                  <th style="width:150px;">Login(AM)</th>
                  <th style="width:150px;">Logout(AM)</th>
                  <th style="width:150px;">Login(PM)</th>
                  <th style="width:150px;">Logout(PM)</th>
                  <th>Remarks</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($logs2)){?>
                  <?php foreach($logs2 as $row){?>
                    <tr>
                      <td><?php echo $row['day_numeric']. ' '.substr($row['day'], 0,3);?></td>
                      <td><?php echo ((empty($row['login_am'])|| (substr($row['login_am'],11)=='00:00:00')) ? '' : date('h:i', strtotime($row['login_am'])));?></td>
                      <td><?php echo ((empty($row['logout_am'])|| (substr($row['logout_am'],11)=='00:00:00')) ? '' : date('h:i', strtotime($row['logout_am'])));?></td>
                      <td><?php echo ((empty($row['login_pm'])|| (substr($row['login_pm'],11)=='00:00:00')) ? '' :  date('h:i', strtotime($row['login_pm'])));?></td>
                      <td><?php echo ((empty($row['logout_pm'])|| (substr($row['logout_pm'],11)=='00:00:00')) ? '' :  date('h:i', strtotime($row['logout_pm'])));?></td>
                     <td><input oldval="<?php echo $row['remarks'];?>" dataid="<?php echo $row['logid'];?>" class="form-control log text-left" type="text" name="log_<?php echo (empty($row['logid']) ? '0' : $row['logid']).'_'.$row['dt'];?>" value="<?php echo $row['remarks'];?>"></td>
                      <!-- <td>
                        <button class="btn btn-sm btn-warning">View</button>
                        <button class="btn btn-sm btn-success">Approve</button>
                      </td> -->
                    </tr>
                    <?php }?>
                  <?php } else{ ?>
                      <p>No records found!</p>
                  <?php }?> 
              </tbody>
            </table>
           </div>
          </div>
          <!-- <p></p> -->
        </div>
      </div>
    </div>

  </main>