

<style>
#viewdemo
{
    display: block;
    background: white;
    border-radius: 15px;
    box-shadow: 11px 11px 11px #333;
    position: fixed;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 600px;
    z-index: 99999999999999999999999999;
    border: 2px solid #333;
    padding: 15px;
    
}

</style>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>STVinc</b> Admin System | Version 2.0
        </div>
        <strong>Copyright &copy; 2007-2018 <a href="<?php echo base_url(); ?>">STV</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>


    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>