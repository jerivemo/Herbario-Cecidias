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
    <script src="<?php echo base_url(); ?>/tools/js/bootstrap.js"></script>
     <!-- Bootstrap Core JavaScript -->
 <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/tools/js/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>tools/js/jquery.bootstrap.wizard.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/admin/collection.js"></script>

    <script>
    var Collection={};
    var idCollection="";
$(document).ready(function() {


    $('#rootwizard').bootstrapWizard({'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if($('#collectionNumber').val()=="" || $('#collectionNumber').val() == " " || $('#collectionNumber').val() == " " || $('#collectionNumber').val().indexOf(" ") == 0 ){
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Collection Number field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    $('#collectionNumber').focus();
                    return false;
                }else{

                    Collection.collectionNumber=$('#collectionNumber').val();
                    Collection.collectionDate=$('#collectionDate').val();
                    Collection.determinationDate=$('#determinationDate').val();

                    $("#rsCN").html($('#collectionNumber').val());
                    $("#rsCD").html($('#collectionDate').val());
                    $("#rsDA").html($('#determinationDate').val());
                    if($("#drySample").is(':checked')){
                         $("#rsDS").html('YES');
                         Collection.drySample='1';
                    }else {
                        $("#rsDS").html('NO');
                        Collection.drySample='0';
                    }
                    if($("#wetSample").is(':checked')){
                         $("#rsWS").html('YES');
                         Collection.wetSample='1';
                    }else {
                        $("#rsWS").html('NO');
                        Collection.wetSample='0';
                    }
                }

            }else if (index==2) {
                if($('#selectGalls').val()==null) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Gall field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    $('#selectGalls').focus();
                    return false;
                }else if($('#selectFamilies').val()==null) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Family field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    $('#selectFamilies').focus();
                    return false;
                }else if($('#selectGenders').val()==null || $('#selectGenders').val()=="No options available" || $('#selectGenders').val()=="Loading ..." ) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Gender field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else if($('#selectSpecies').val()==null || $('#selectSpecies').val()=="No options available" || $('#selectSpecies').val()=="Loading ...") {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Specie field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else {
                    Collection.idGall=$('#selectGalls').val();
                    Collection.idSpecie=$('#selectSpecies').val();

                    $("#rsG").html($('#selectGalls option:selected').html());
                    $("#rsF").html($('#selectFamilies option:selected').html());
                    $("#rsGD").html($('#selectGenders option:selected').html());
                    $("#rsS").html($('#selectSpecies option:selected').html());
                }
            }else if (index==3) {
                if($('#selectCountries').val()==null) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Country field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else if($('#selectStates').val()==null || $('#selectStates').val()=="No options available" || $('#selectStates').val()=="Loading" ) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>State field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else if($('#selectCities').val()==null || $('#selectCities').val()=="No options available" || $('#selectCities').val()=="Loading ..." ) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>City field is required</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else if(isNaN($('#altitude').val())) {
                    msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Altitude field must be a number</div>';
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html(msg);
                    $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#myModal').modal('show');
                    return false;
                }else {

                    Collection.idCity=$('#selectCities').val();
                    Collection.coordinates=$('#coordinates').val();
                    Collection.altitude=$('#altitude').val();
                    Collection.locationSpanish=$('#locationSpanish').val();
                    Collection.locationEnglish=$('#locationEnglish').val();

                    $("#rsC").html($('#selectCountries option:selected').html());
                    $("#rsST").html($('#selectStates option:selected').html());
                    $("#rsCT").html($('#selectCities option:selected').html());
                    $("#rsCord").html($('#coordinates').val());
                    $("#rsAT").html($('#altitude').val());
                    $("#rsLS").html($('#locationSpanish').val());
                    $("#rsLE").html($('#locationEnglish').val());
                }
            }else if (index==4) {
                    Collection.hostSpanish=$('#hostSpanish').val();
                    Collection.hostEnglish=$('#hostEnglish').val();
                    Collection.morphotypeSpanish=$('#morphotypeSpanish').val();
                    Collection.lmorphotypeEnglish=$('#morphotypeEnglish').val();

                    $("#rsHS").html($('#hostSpanish').val());
                    $("#rsHE").html($('#hostEnglish').val());
                    $("#rsMS").html($('#morphotypeSpanish').val());
                    $("#rsME").html($('#morphotypeEnglish').val());

            }else if (index==5) {
                    Collection.classifier=$('#selectClassifiers').val();
                    Collection.collector=$('#selectCollectors').val();

                    var companions = [];
                    var companionsAux = "";
                    var determinators = [];
                    var determinatorsAux = "";

                    // Add companions to the collection
                    $('#tableCompanions > tbody  > tr').each(function () {
                    companions.push($(this).attr('id'));
                    if(companionsAux==""){
                        companionsAux+=$(this).children("td").eq(0).html();
                    }else{
                        companionsAux+=", ";
                        companionsAux+=$(this).children("td").eq(0).html();
                    }
                   });

                    // Add determinators to the collection
                    $('#tableDeterminators > tbody  > tr').each(function () {
                    determinators.push($(this).attr('id'));
                    if(determinatorsAux==""){
                        determinatorsAux+=$(this).children("td").eq(0).html();
                    }else{
                        determinatorsAux+=", ";
                        determinatorsAux+=$(this).children("td").eq(0).html();
                    }
                   });

                    Collection.companions=companions;
                    Collection.determinators=determinators;
                    $("#rsCF").html($('#selectClassifiers option:selected').html());
                    $("#rsCL").html($('#selectCollectors option:selected').html());
                    $("#rsCP").html(companionsAux);
                    $("#rsDE").html(determinatorsAux);

            }else if (index==6) {
                    var organisms=[];
                    var organismsAux="";

                    $('#tableOrganism > tbody  > tr').each(function () {
                        var tmp = [];
                        tmp.push($(this).children("td").eq(0).attr('id'));
                        tmp.push($(this).children("td").eq(4).attr('id'));
                        tmp.push($(this).children("td").eq(5).attr('id'));
                        tmp.push($(this).children("td").eq(6).attr('id'));
                        tmp.push($(this).children("td").eq(7).attr('id'));
                        tmp.push($(this).children("td").eq(8).attr('id'));
                        organisms.push(tmp);

                        var tmpAux="<dd>";
                        tmpAux+="Type: ";
                        tmpAux+=$(this).children("td").eq(0).html();
                        tmpAux+=" / Order: ";
                        tmpAux+=$(this).children("td").eq(1).html();
                        tmpAux+=" / Family: ";
                        tmpAux+=$(this).children("td").eq(2).html();
                        tmpAux+=" / Gender: ";
                        tmpAux+=$(this).children("td").eq(3).html();
                        tmpAux+=" / Specie: ";
                        tmpAux+=$(this).children("td").eq(4).html();
                        tmpAux+=" / Larvae: ";
                        tmpAux+=$(this).children("td").eq(5).html();
                        tmpAux+=" / Nymphs: ";
                        tmpAux+=$(this).children("td").eq(6).html();
                        tmpAux+=" / Pupae: ";
                        tmpAux+=$(this).children("td").eq(7).html();
                        tmpAux+=" / Adult: ";
                        tmpAux+=$(this).children("td").eq(8).html();
                        tmpAux+="</dd>";

                        organismsAux+=tmpAux;
                    });

                    Collection.organisms=organisms;
                    $("#rsOG").html(organismsAux);


            }

        },'onTabClick': function(tab, navigation, index) {
        return false;
    },'onTabShow': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});

        if($current==1) {
            $('#rootwizard').find('.pager .first').hide();
        } else {
            $('#rootwizard').find('.pager .first').show();
        }

        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
            $('#rootwizard').find('.pager .last').hide();
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
            $('#rootwizard').find('.pager .last').hide();
        }
    }}
    );
});
    var site_url ="<?php echo base_url(); ?>";

    </script>

</body>

</html>