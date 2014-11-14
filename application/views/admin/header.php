    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Admin  <i class="glyphicon glyphicon-list-alt"></i>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="logo" style="width:400px" ><small>Herbario Cecidias - Tecnológico de Costa Rica</small></div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>User Name <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            User |
                            <a href="#"><i class="fa fa-circle text-success"></i>  Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo base_url();?>index.php/Collection/view">
                                <i class="fa fa-th"></i> <span>Collections</span> <small class=""></small>
                            </a>
                        </li>
                        <li>
                            <a id="optGall" href="<?php echo base_url();?>index.php/Gall/view" >
                                <i class="fa fa-database fa-fw"></i> <span>Galls</span> <small class=""></small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-road fa-fw"></i>
                                <span>Locations</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id="optCountry" href="<?php echo base_url();?>index.php/Country/view"><i class="fa fa-angle-double-right"></i> Countries</a></li>
                                <li><a id="optState" href="<?php echo base_url();?>index.php/State/view"><i class="fa fa-angle-double-right"></i> States</a></li>
                                <li><a id="optCity" href="<?php echo base_url();?>index.php/City/view"><i class="fa fa-angle-double-right"></i> Cities</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-leaf"></i>
                                <span>Taxonomies | Plants</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id="optFamily" href="<?php echo base_url();?>index.php/Family/view"><i class="fa fa-angle-double-right"></i> Families</a></li>
                                <li><a id="optGender" href="<?php echo base_url();?>index.php/Gender/view"><i class="fa fa-angle-double-right"></i> Genders</a></li>
                                <li><a id="optSpecies" href="<?php echo base_url();?>index.php/Species/view"><i class="fa fa-angle-double-right"></i> Species</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bug"></i> <span>Taxonomies | Insects</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a id="optOrgOrder" href="<?php echo base_url();?>index.php/OrganismOrder/view"><i class="fa fa-angle-double-right"></i> Orders</a></li>
                                <li><a id="optOrgFamily" href="<?php echo base_url();?>index.php/OrganismFamily/view"><i class="fa fa-angle-double-right"></i> Families</a></li>
                                <li><a id="optOrgGender" href="<?php echo base_url();?>index.php/OrganismGender/view"><i class="fa fa-angle-double-right"></i> Genders</a></li>
                                <li><a id="optOrgSpecies" href="<?php echo base_url();?>index.php/OrganismSpecies/view"><i class="fa fa-angle-double-right"></i> Especies</a></li>
                            </ul>
                        </li>
                        <li>
                            <a id="optPerson" href="<?php echo base_url();?>index.php/Person/view">
                                <i class="fa fa-users"></i> <span>Collaborators</span>
                                <small class=""></small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-user"></i> <span>Users</span>
                                <small class="pull-right"></small>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">