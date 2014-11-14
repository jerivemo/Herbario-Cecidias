<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search results - Herbario Cecidias</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>tools/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="<?php echo base_url(); ?>tools/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>tools/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="<?php echo base_url(); ?>tools/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tools/css/default.css" rel="stylesheet">

    <!-- CoinSlider Styles (image viewer) -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>tools/css/Image_Slider/coin-slider-styles.css" type="text/css" />


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
        <li><a href="#collection">Collection</a></li>
        <li><a href="#organism">Organisms</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro" style="padding:10% 0 0 0;height:50%">

        <div class="slogan">
            <h2><span class="text_color">Search Results</span> </h2>
        </div>
        <div class="page-scroll">
            <a href="#collection" class="btn btn-circle">
                <i class="fa fa-angle-double-down animated"></i>
            </a>
        </div>
    </section>
    <!-- /Section: intro -->

    <!-- Section: about -->

    <section id="collection" class="home-section text-center">
        <div class="heading-about">

            </div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Collection </h2>

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


                <div class="row" style="display:-webkit-inline-box">
            <div style="margin-right:30px;">
                <a style="color: #666;" href="javascript:goBackCollection();">
                    <i class="glyphicon glyphicon-circle-arrow-left fa-2x animated"  ></i>
                </a>
            </div>
            <strong><div id="currentResult"> 1 </div> &nbsp; / &nbsp; <div id="totalResults">
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){

                                                    }else {
                                                        echo $collectionResults;
                                                    }
                                                }
                                            ?> </div> &nbsp; Results</strong>
            <div style="margin-left:30px" >
                <a style="color: #666;" href="javascript:goNextCollection();">
                    <i class="glyphicon glyphicon-circle-arrow-right fa-2x animated" ></i>
                </a>
            </div>
            </div>
            </div>

        </div>
  </div>
  <br>
        <div class="container">
                <div class="row">
                <div class="col-lg-2 col-lg-offset-5">
                <div class="input-group">
                <input id="goCollection" type="number" placeholder="# result" class="form-control">
                <span class="input-group-btn">
                <button type="button" onclick="goToCollection()" class="btn btn-success" style="border-bottom-right-radius: 4px;
border-top-right-radius: 4px;">Go <span class="glyphicon glyphicon-share-alt"></span></button>
                </span>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
        </div>
        <hr>
        <div class="row">
            <div class=" col-md-6">
                <div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                        <h5>Information</h5>
                        <br>
                        <dl class="dl-horizontal">
                                            <dt>Family</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="familyName" style="text-align: left;" ></dd>';

                                                    }else {
                                                        echo '<dd id="familyName" style="text-align: left;" >'.$collectionInfo['family'][0]->familyName.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Gender</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="genderName" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="genderName"  style="text-align: left;" >'.$collectionInfo['gender'][0]->genderName.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Specie</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="specieName" style="text-align: left;" ></dd>';

                                                    }else {
                                                        echo '<dd id="specieName" style="text-align: left;" >'.$collectionInfo['specie'][0]->speciesName.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Gall</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="gallName" style="text-align: left;" ></dd>';

                                                    }else {
                                                        echo '<dd id="gallName" style="text-align: left;" >'.$collectionInfo['gall'][0]->gallName.'</dd>';
                                                        }
                                                    }
                                            ?>

                        <hr>

                                            <dt>Host Description</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="hostDescription" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="hostDescription" style="text-align: left;" >'.$collectionInfo['collection'][0]->hostDescriptionEnglish.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Morphotype Description</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="morphotypeDescription" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="morphotypeDescription" style="text-align: left;" >'.$collectionInfo['collection'][0]->morphotypeDescriptionEnglish.'</dd>';
                                                        }
                                                    }
                                            ?>

                        <hr>

                                            <dt>Colect Number</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="collectionNumber" style="text-align: left;" ></dd>';

                                                    }else {
                                                        echo '<dd id="collectionNumber" style="text-align: left;" >'.$collectionInfo['collection'][0]->collectionNumber.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Classifier</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null || $collectionInfo['classifier']==null ){
                                                        echo '<dd id="classifier" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="classifier" style="text-align: left;" >'.$collectionInfo['classifier'][0]->personName.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Collector</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null || $collectionInfo['collector']==null ){
                                                        echo '<dd id="collector" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="collector" style="text-align: left;" >'.$collectionInfo['collector'][0]->personName.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Companions</dt><div id="companions">
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null || $collectionInfo['companions']==null){
                                                        echo '<dd id="companion" style="text-align: left;" ></dd>';
                                                    }else {
                                                        foreach ($collectionInfo['companions'] as $companion => $row) {
                                                            echo '<dd  style="text-align: left;" >'.$row->personName.'</dd>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            </div>
                                            <dt>Colect Date</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="colectDate" style="text-align: left;" ></dd>';

                                                    }else {
                                                        echo '<dd id="colectDate" style="text-align: left;" >'.$collectionInfo['collection'][0]->collectiondateDate.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Determinators</dt>
                                            <div id="determinators">
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null|| $collectionInfo['determinators']==null){
                                                         echo '<dd id="determinator" style="text-align: left;" ></dd>';
                                                    }else {
                                                        foreach ($collectionInfo['determinators'] as $determinator => $row) {
                                                            echo '<dd id="determinator" style="text-align: left;" >'.$row->personName.'</dd>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            </div>
                                            <dt>Determination Date</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                         echo '<dd id="determinationDate" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="determinationDate" style="text-align: left;" >'.$collectionInfo['collection'][0]->determinationDate.'</dd>';
                                                        }
                                                    }
                                            ?>

                        <hr>

                                            <dt>Country</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="country" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="country" style="text-align: left;" >'.$collectionInfo['country'][0]->nameCountry.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>State</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="state" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="state" style="text-align: left;" >'.$collectionInfo['state'][0]->nameState.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>City</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="city" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="city" style="text-align: left;" >'.$collectionInfo['city'][0]->nameCity.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Location Description</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="locationDescription" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="locationDescription" style="text-align: left;" >'.$collectionInfo['collection'][0]->locationDescriptionEnglish.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Coordinates</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="coordinates" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="coordinates" style="text-align: left;" >'.$collectionInfo['collection'][0]->coordinates.'</dd>';
                                                        }
                                                    }
                                            ?>
                                            <dt>Altitude</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="altitude" style="text-align: left;" ></dd>';
                                                    }else {
                                                        echo '<dd id="altitude" style="text-align: left;" >'.$collectionInfo['collection'][0]->altitude.'m</dd>';
                                                        }
                                                    }
                                            ?>

                        <hr>
                        <h5>Samples Availables</h5>
                        <br>
                                            <dt>Wet Sample</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="wetSample" style="text-align: left;" ></dd>';
                                                    }else {
                                                        if ($collectionInfo['collection'][0]->wetSample=="1"){
                                                            echo '<dd id="wetSample" style="text-align: left;" >YES</dd>';
                                                        }else{
                                                            echo '<dd id="wetSample" style="text-align: left;" >NO</dd>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            <dt>Dry Sample</dt>
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null){
                                                        echo '<dd id="drySample" style="text-align: left;" ></dd>';
                                                    }else {
                                                        if ($collectionInfo['collection'][0]->drySample=="1"){
                                                            echo '<dd id="drySample" style="text-align: left;" >YES</dd>';
                                                        }else{
                                                            echo '<dd id="drySample" style="text-align: left;" >NO</dd>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </dl>
                </div>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h5>Images</h5>
                                </div><!-- /.box-header -->
                                <div class="box-body" id="imagesContainer" >
                                    <div id="coin-slider">
                                            <?php
                                                if (isset($collectionInfo)){
                                                    if($collectionInfo==null|| $collectionInfo['images']==null){
                                                        echo '<img src="'.base_url().'tools/img/no_disponible.jpg" />';
                                                    }else {
                                                        foreach ($collectionInfo['images'] as $image => $row) {
                                                            echo '<a href="'.base_url().'images/'.$row->name.'">';
                                                            echo '<img src="'.base_url().'images/'.$row->name.'"/>';
                                                            echo '</a>';
                                                        }
                                                    }
                                                }
                                            ?>

                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <br>
                             <h5>MAP Location</h5>
                            <div id="googleMap" style="width:100%;height:380px;" ></div>

                </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /Section: about -->


    <!-- Section: services -->
    <section id="organism" class="home-section text-center bg-gray">

        <div class="heading-about">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Organisms</h2>
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
        <div id="listOrganism">
        <?php
        if (isset($collectionInfo)){
           if($collectionInfo==null|| $collectionInfo['organisms']==null){
                echo '<h5>Not organisms Associated</h5>';
           }else {
                    foreach ($collectionInfo['organisms'] as $organism => $row) {
                        echo '<div class="row" style="border: 3px;border-style: groove;border-color: #fff;margin-bottom: 15px;"><div class=" col-md-6"><br>';
                        if ($row->organismType=="0") {
                            echo '<h5>Insect Inductor</h5>';
                        }else {
                            echo '<h5>Insect Associate</h5>';
                        }
                        echo '<hr><dl class="dl-horizontal">';
                        echo '<dt>Order</dt><dd style="text-align: left;" >'.$row->orderName.'</dd>';
                        echo '<dt>Family</dt><dd style="text-align: left;" >'.$row->familyName.'</dd>';
                        echo '<dt>Gender</dt><dd style="text-align: left;" >'.$row->genderName.'</dd>';
                        echo '<dt>Specie</dt><dd style="text-align: left;" >'.$row->speciesName.'</dd>';
                        echo '</dl></div><div class=" col-md-6"><br><h5>Material Available</h5><hr><dl class="dl-horizontal">';
                        echo '<dt>Larvae</dt>';
                        if ($row->larvae=="0") {
                            echo '<dd style="text-align: left;" >NO</dd>';
                        }else {
                            echo '<dd style="text-align: left;" >YES</dd>';
                        }
                        echo '<dt>Nymphs</dt>';
                        if ($row->nymphs=="0") {
                            echo '<dd style="text-align: left;" >NO</dd>';
                        }else {
                            echo '<dd style="text-align: left;" >YES</dd>';
                        }
                        echo '<dt>Pupae</dt>';
                        if ($row->pupae=="0") {
                            echo '<dd style="text-align: left;" >NO</dd>';
                        }else {
                            echo '<dd style="text-align: left;" >YES</dd>';
                        }
                        echo '<dt>Adult</dt>';
                        if ($row->adult=="0") {
                            echo '<dd style="text-align: left;" >NO</dd>';
                        }else {
                            echo '<dd style="text-align: left;" >YES</dd>';
                        }
                        echo '</dl></div></div>';




                    }
                }
            }
        ?>
        </div>
        </div>

    </section>
    <!-- /Section: services -->

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
    <!--Search-->
    <script src="<?php echo base_url(); ?>tools/js/mainPage/search.js"></script>

    <script src="<?php echo base_url(); ?>tools/js/easy-gallery-2.min.js"></script>

    <!--Gooogle Map -->
    <script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
    </script>

    <!-- CoinSldier JS (image viewer) -->
    <script type="text/javascript" src="<?php echo base_url(); ?>tools/js/Image_Slider/coin-slider.min.js"></script>
    <!-- Init CoinSlider (image viewer) -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#coin-slider').coinslider({ width:500,height:395,effect: 'straight',navigation:true});
        });
    </script>

<script>

var site_url ="<?php echo base_url(); ?>";
var current = 0;
<?php


if (isset($collectionInfo)){
   if($collectionInfo==null){
   }else {
       echo 'var collectionResults='.$collectionResults.';';
       echo 'var collections='.json_encode($list).';';

    }
}
?>

function initialize()
{
   // <?php  echo  'alert('.$collectionInfo['coordinates']['longitud'].');'?>

var mapProp = {
  center:new google.maps.LatLng(<?php if (isset($collectionInfo)){
                                    if($collectionInfo==null){
                                        echo '210.3633333333333,-84.5089444444444';
                                    }else {
                                        echo $collectionInfo['coordinates']['latitud'].','.$collectionInfo['coordinates']['longitud'];
                                    }
                                }
                                ?>),
  zoom:10,
  mapTypeId:google.maps.MapTypeId.HYBRID
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var myLatlng = new google.maps.LatLng(<?php if (isset($collectionInfo)){
    if($collectionInfo==null){
    }else {
        echo   $collectionInfo['coordinates']['latitud'].','.$collectionInfo['coordinates']['longitud'];
    }
}
?>
);
var marker = new google.maps.Marker({position: myLatlng,map: map,title: ""});

}
initialize();
//google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>

</html>
