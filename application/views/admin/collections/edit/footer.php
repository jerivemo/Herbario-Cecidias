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
 <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/tools/js/app.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>tools/js/admin/collectionEdit.js"></script>

    <script>
        var site_url ="<?php echo base_url(); ?>";

        var idCollection = "<?php if (isset($idCollection)){echo $idCollection;}?>";

        $('#newOrganism').hide();
         $('#newImage').hide();


    </script>
</script>

</body>

</html>