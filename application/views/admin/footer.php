    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets');?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets');?>/js/ie10-viewport-bug-workaround.js"></script>

    <script src="<?php echo base_url('assets');?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets');?>/js/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets/js/sweetalert.min.js');?>"></script>

     <script src="<?php echo base_url('assets');?>/js/logs.js"></script>

      <script src="<?php echo base_url('assets');?>/js/user.js"></script>
      <script src="<?php echo base_url('assets');?>/js/myaccount.js"></script>

      <script src="<?php echo base_url('assets');?>/js/logout.js"></script>

     <?php if($this->session->flashdata('status')){ ?>
     
     
     <?php } ?>
     <script type="text/javascript">
      var base_url = <?php echo json_encode(base_url()); ?>;
      $(document).ready(function() {
            $('#table1').DataTable();
        } );
     </script>     
  </body>
</html>
