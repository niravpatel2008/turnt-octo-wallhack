	<!-- jQuery 2.0.2 -->
    <script src="<?=public_path()?>js/jquery.2.0.2.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="<?=public_path()?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?=public_path()?>js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?=public_path()?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?=public_path()?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?=public_path()?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?=public_path()?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src="<?=public_path()?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=public_path()?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?=public_path()?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?=public_path()?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=public_path()?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=public_path()?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=public_path()?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    
    <script type="text/javascript">
        function admin_path () {
            return '<?=admin_path()?>';
        }
    </script>

    <?php if ($this->router->fetch_class() == "users") { ?>
		<script src="<?=public_path()?>js/admin/users/index.js" type="text/javascript"></script>
    <?php } ?>
	
    <?php if ($this->router->fetch_class() == "category") { ?>
		<script src="<?=public_path()?>js/admin/category/index.js" type="text/javascript"></script>
    <?php } ?>

    <?php if ($this->router->fetch_class() == "dealer") { ?>
        <script src="<?=public_path()?>js/admin/dealer/index.js" type="text/javascript"></script>
    <?php } ?>

    <?php if ($this->router->fetch_class() == "deal") { ?>
        <script src="<?=public_path()?>js/admin/deal/index.js" type="text/javascript"></script>
    <?php } ?>

    <!-- AdminLTE App -->
    <script src="<?=public_path()?>js/AdminLTE/app.js" type="text/javascript"></script>
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=public_path()?>js/AdminLTE/dashboard.js" type="text/javascript"></script>     
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?=public_path()?>js/AdminLTE/demo.js" type="text/javascript"></script>


    </body>
</html>