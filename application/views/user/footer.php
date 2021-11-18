    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets');?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets');?>/js/ie10-viewport-bug-workaround.js"></script>

    <script src="<?php echo base_url('assets');?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets/js/sweetalert.min.js');?>"></script>

     <script src="<?php echo base_url('assets');?>/js/user/logs.js"></script>


      <script src="<?php echo base_url('assets');?>/js/user/myaccount.js"></script>

      <script src="<?php echo base_url('assets');?>/js/user/logout.js"></script>

     <?php if($this->session->flashdata('Error')){ ?>
        <script type="text/javascript">
          swal('error','<?php echo $this->session->flashdata('Error')?>','warning');
        </script>      
     
     <?php } ?>
     <?php if($this->session->flashdata('Success')){ ?>
        <script type="text/javascript">
          swal('Success','<?php echo $this->session->flashdata('Success')?>','success');
        </script>      
     
     <?php } ?>
     <script type="text/javascript">
      var base_url = <?php echo json_encode(base_url()); ?>;
      $(document).ready(function() {
            $('#table1').DataTable();
        } );
     </script>     
  </body>
</html>
