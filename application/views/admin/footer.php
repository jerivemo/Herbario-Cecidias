 </div>

    </div>
    <!-- /#wrapper -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p>&copy;Copyright 2014 - <a style="color:#f8f8f8" href="http://www.ctec.itcr.ac.cr/">CTEC Tecnológico de Costa Rica</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

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

