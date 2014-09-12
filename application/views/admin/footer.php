 </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url(); ?>/tools/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/plugins/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/sb-admin-2.js"></script>
    
    <?php 
        if(isset($links))
        {


        foreach ($links as $link) {
            echo '<script src='.base_url().$link.'></script>';
        }
        }
    ?>

    <script>
        var site_url ="<?php echo base_url(); ?>";
    </script>
</body>

</html>

