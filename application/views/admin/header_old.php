<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Herbario Cecidias Admin </a>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links LogOut-->
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">

                            <!-- /input-group -->
                        </li>
                        <li>
                            <a  href="#"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                        <li>
                            <a id="optCollection" href="#"><i class="fa fa-database fa-fw"></i>Collections</a>
                        </li>
                        <li>
                            <a id="optGall" href="<?php echo base_url();?>index.php/Gall/view"><i class="fa fa-archive fa-fw"></i>Galls</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-road fa-fw"></i>Locations<span class="fa arrow"></span></a>
                            <ul id="menuLocations" class="nav nav-second-level">
                                <li>
                                    <a id="optCountry" href="<?php echo base_url();?>index.php/Country/view">Countries</a>
                                </li>
                                <li>
                                    <a id="optState" href="<?php echo base_url();?>index.php/State/view">States</a>
                                </li>
                                <li>
                                    <a id="optCity" href="<?php echo base_url();?>index.php/City/view">Cities</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Taxonomies<span class="fa arrow"></span></a>
                            <ul id="menuTaxonomies" class="nav nav-second-level">
                                 <li>
                                    <a href="#"><i class="fa fa-leaf"></i> Plants<span class="fa arrow"></span></a>
                                    <ul id="menuPlants" class="nav nav-third-level">
                                        <li>
                                            <a id="optFamily" href="<?php echo base_url();?>index.php/Family/view">Families</a>
                                        </li>
                                        <li>
                                            <a id="optGender" href="<?php echo base_url();?>index.php/Gender/view">Genders</a>
                                        </li>
                                        <li>
                                            <a id="optSpecies" href="<?php echo base_url();?>index.php/Species/view">Species</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-bug "></i> Insects<span class="fa arrow"></span></a>
                                    <ul id="menuInsects" class="nav nav-third-level">
                                        <li>
                                            <a id="optOrgOrder" href="<?php echo base_url();?>index.php/OrganismOrder/view">Orders</a>
                                        </li>
                                        <li>
                                            <a id="optOrgFamily" href="<?php echo base_url();?>index.php/OrganismFamily/view">Families</a>
                                        </li>
                                        <li>
                                            <a id="optOrgGender" href="<?php echo base_url();?>index.php/OrganismGender/view">Genders</a>
                                        </li>
                                        <li>
                                            <a  id="optOrgSpecies" href="<?php echo base_url();?>index.php/OrganismSpecies/view">Species</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a id="optPerson" href="<?php echo base_url();?>index.php/Person/view"><i class="fa fa-users fa-fw"></i>Collaborators</a>
                        </li>
                        <li>
                            <a id="optOrgUser" href="#"><i class="fa fa-user fa-fw"></i>Users</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">