<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Herbario Cecidias</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>tools/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="<?php echo base_url(); ?>tools/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>tools/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="<?php echo base_url(); ?>tools/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tools/css/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/Main">
                    <h1>HERBARIO CECIDIAS</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#service">Search</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="<?php echo base_url();?>index.php/Login">Sign in</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro">

        <div class="slogan">
            <h2>WELCOME TO <span class="text_color">Herbario Cecidias</span> </h2>
            <h4>Tecnológico de Costa Rica Sede Regional San Carlos</h4>
        </div>
        <div class="page-scroll">
            <a href="#service" class="btn btn-circle">
                <i class="fa fa-angle-double-down animated"></i>
            </a>
        </div>
    </section>
    <!-- /Section: intro -->

    <!-- Section: about -->
    <section id="about" class="home-section text-center">
        <div class="heading-about">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>About us</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">

        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-6">
                <div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
                        <h5>Tecnologico de Costa Rica</h5>
                        <p class="subtitle">Sede Regional San Carlos</p>
                        <img src="<?php echo base_url();?>tools/img/team/1.jpg" alt="" class="img-responsive" />
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-6">
                <div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
                        <h5>Escuela de Ciencias Y Letras</h5>
                        <p class="subtitle">Area de Biologia</p>
                        <strong>Investigadores:</strong>
                        <br>Omar Gatgens Boniche
                        <br>Jose Pablo Alfaro
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /Section: about -->


    <!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">

        <div class="heading-about">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Search</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
<div >
            <div class="boxed-grey">

                <div class="row">
                 <form id="searchByPlantsInfo" action="<?php echo base_url();?>index.php/Main/search" method="post" accept-charset="utf-8">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Plants Information</h3>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Family</label>
                            <select id="families" name="family" class="form-control" required="required">
                            <?php
                                if (isset($families)){
                                    if($families==null){
                                        echo '<option value="na" selected="">Choose One:</option>string';
                                    }else {
                                        echo '<option value="na" selected="">Choose One:</option>';
                                        foreach ($families as $Family => $row) {
                                            echo '<option value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                            }
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Gender</label>
                            <select id="genders" name="gender"  class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Specie</label>
                            <select id="species" name="specie"  class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                State</label>
                            <select id="states" name="state" class="form-control" required="required">
                            <?php
                                if (isset($states)){
                                    if($states==null){
                                        echo '<option value="no" selected="">Options not available</option>string';
                                    }else {
                                        echo '<option value="na" selected="">Choose One:</option>';
                                        foreach ($states as $state => $row) {
                                            echo '<option value="'.$row->idState.'">'.$row->nameState.' - '.$row->nameCountry.'</option>';
                                            }
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success pull-right" id="btnContactUs">
                            Search</button>
                    </div>
                    </form>
                    <div class="col-md-6">
                     <form id="searchOrganismInfo" action="<?php echo base_url();?>index.php/Main/search" method="post" accept-charset="utf-8" >
                        <div class="form-group">
                            <h3>Organisms Information</h3>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Order</label>
                            <select id="orgOrders" name="orgOrder" class="form-control" required="required">
                            <?php
                                if (isset($orders)){
                                    if($orders==null){
                                        echo '<option value="no" selected="">Choose One:</option>string';
                                    }else {
                                        echo '<option value="na" selected="">Choose One:</option>';
                                        foreach ($orders as $order => $row) {
                                            echo '<option value="'.$row->idOrder.'">'.$row->orderName.'</option>';
                                            }
                                        }
                                    }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Family</label>
                            <select id="orgFamilies" name="orgFamily"  class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Gender</label>
                            <select id="orgGenders" name="orgGender"  class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Specie</label>
                            <select id="orgSpecies" name="orgSpecie"  class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success pull-right" id="btnContactUs">
                           Search</button>
                    </form>
                    </div>

                </div>

            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- /Section: services -->




    <!-- Section: contact -->
    <section id="contact" class="home-section text-center">
        <div class="heading-contact">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Get in touch</h2>
                    <i class="fa fa-2x fa-angle-down"></i>

                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">

        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Country</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Country" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="widget-contact">
                <h5>Location</h5>
                <address>
                  <strong>Escuela de Ciencias y Letras, Tecnológico de Costa Rica.</strong><br>
                  Santa Clara, Alajuela Costa Rica.<br>
                  <br>
                  <abbr title="Phone">P:</abbr> (+506) 2401 0000
                </address>

                <address>
                  <strong>Email</strong><br>
                  <a href="mailto:#">email.name@example.com</a>
                </address>
                <address>
                  <strong>We're on social networks</strong><br>
                        <ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                </address>

            </div>
        </div>
    </div>

        </div>
    </section>
    <!-- /Section: contact -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="wow shake" data-wow-delay="0.4s">
                    <div class="page-scroll marginbot-30">
                        <a href="#intro" id="totop" class="btn btn-circle">
                            <i class="fa fa-angle-double-up animated"></i>
                        </a>
                    </div>
                    </div>
                    <p>&copy;Copyright 2014 - CTEC Tecnológico de Costa Rica. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core JavaScript Files -->
    <script src="<?php echo base_url(); ?>tools/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/jquery.scrollTo.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>tools/js/custom.js"></script>
    <!-- Main Page Actions -->
    <script src="<?php echo base_url(); ?>tools/js/mainPage/main.js"></script>

    <script>
        var site_url ="<?php echo base_url(); ?>";
    </script>





</body>

</html>
