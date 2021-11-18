
    <div class="row">
      <div class="col-sm-2">
        <select id="dd_year" class="form-control">
          <?php foreach($year as $row){?>
          <option <?php echo ($currentYear==$row['year'] ? "selected" : '');?> value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
          <?php } ?>
        </select>  
      </div>
      <div class="col-sm-2">
        <select id="dd_month" class="form-control">
          <?php foreach($month as $row){?>
          <option <?php echo ($currentMonth==$row['month'] ? "selected" : '');?> value="<?php echo $row['month'];?>"><?php echo $row['monthname'];?></option>
          <?php } ?>
        </select>  
      </div>
    </div>
    <div class="row" style="padding-top: 3vh">
      <div class="col-sm-12">
        <div class="table-responsive">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Position</th>
              <th>Department</th>
              <th>Login(AM)</th>
              <th>Logout(AM)</th>
              <th>Login(PM)</th>
              <th>Logout(PM)</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $x=0;
            if(!empty($logs)){?>
              <?php foreach($logs as $row){?>
                <tr>
                  <td><?php $x++; echo $x;?></td>
                  <td><?php echo $row['fullname'];?></td>
                  <td><?php echo $row['position'];?></td>
                  <td><?php echo $row['department'];?></td>
                  <td><?php echo $row['login_am'];?></td>
                 <td><?php echo $row['logout_am'];?></td>
                 <td><?php echo $row['login_pm'];?></td>
                 <td><?php echo $row['logout_pm'];?></td>
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
    </div>