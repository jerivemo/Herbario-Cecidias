$(document).ready(function() {
        $( "#selectFamilies" ).change(function() {setGenders()});
        $( "#selectGenders" ).change(function() {setSpecies()});
        $( "#selectCountries" ).change(function() {setStates()});
        $( "#selectStates" ).change(function() {setCities()});
        $( "#selectOrgOrders" ).change(function() {setOrgFamilies()});
        $( "#selectOrgFamilies" ).change(function() {setOrgGenders()});
        setOrgFamilies();
    });


   function setGenders(){
      var id = $("#selectFamilies").val();
      if (id !=null){
        $('#selectGenders').html('<option>Loading ...</option>');
        $('#selectGenders').attr('disabled', 'disabled');
        $('#selectSpecies').html('<option>Loading ...</option>');
        $('#selectSpecies').attr('disabled', 'disabled');
        var info = {'idFamily':id}
        $.ajax({
            url: site_url+'index.php/Gender/getGenders/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idGender+'>'+data[i].genderName+'</option>';
                      }
                      $('#selectGenders').html(options);
                      $('#selectGenders').removeAttr('disabled');
                      $('#selectSpecies').html('<option>Loading ...</option>');
                      $('#selectSpecies').attr('disabled', 'disabled');
                      setSpecies();
                    }else {
                      $('#selectGenders').html('<option>No options available</option>');
                      $('#selectGenders').attr('disabled', 'disabled');
                      $('#selectSpecies').html('<option>No options available</option>');
                      $('#selectSpecies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    function setSpecies(){
      var id = $("#selectGenders").val();
      if (id !=null){
        $('#selectSpecies').html('<option>Loading ...</option>');
        $('#selectSpecies').attr('disabled', 'disabled');
        var info = {'idGender':id}
        $.ajax({
            url: site_url+'index.php/Species/getSpecies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idSpecies+'>'+data[i].speciesName+'</option>';
                      }
                      $('#selectSpecies').html(options);
                      $('#selectSpecies').removeAttr('disabled');

                    }else {
                      $('#selectSpecies').html('<option>No options available</option>');
                      $('#selectSpecies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


     function setStates(){
      var id = $("#selectCountries").val();
      if (id !=null){
        $('#selectStates').html('<option>Loading ...</option>');
        $('#selectStates').attr('disabled', 'disabled');
        $('#selectCities').html('<option>Loading ...</option>');
        $('#selectCities').attr('disabled', 'disabled');

        var info = {'idCountry':id}
        $.ajax({
            url: site_url+'index.php/State/getStates/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idState+'>'+data[i].nameState+'</option>';
                      }
                      $('#selectStates').html(options);
                      $('#selectStates').removeAttr('disabled');
                      setCities();
                    }else {
                      $('#selectStates').html('<option>No options available</option>');
                      $('#selectStates').attr('disabled', 'disabled');
                      $('#selectCities').html('<option>No options available</option>');
                      $('#selectCities').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }

      function setCities(){
      var id = $("#selectStates").val();
      if (id !=null){
        $('#selectCities').html('<option>Loading ...</option>');
        $('#selectCities').attr('disabled', 'disabled');
        var info = {'idState':id}
        $.ajax({
            url: site_url+'index.php/City/getCities/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idCity+'>'+data[i].nameCity+'</option>';
                      }
                      $('#selectCities').html(options);
                      $('#selectCities').removeAttr('disabled');
                    }else {
                      $('#selectCities').html('<option>No options available</option>');
                      $('#selectCities').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    function setOrgFamilies(){
      var id = $("#selectOrgOrders").val();
      if (id !=null){
        $('#selectOrgFamilies').html('<option>Loading ...</option>');
        $('#selectOrgFamilies').attr('disabled', 'disabled');
        $('#selectOrgGenders').html('<option>Loading ...</option>');
        $('#selectOrgGenders').attr('disabled', 'disabled');
        $('#selectOrgSpecies').html('<option>Loading ...</option>');
        $('#selectOrgSpecies').attr('disabled', 'disabled');
        var info = {'idOrder':id}
        $.ajax({
            url: site_url+'index.php/OrganismFamily/getFamilies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idFamily+'>'+data[i].familyName+'</option>';
                      }
                      $('#selectOrgFamilies').html(options);
                      $('#selectOrgFamilies').removeAttr('disabled');
                      setOrgGenders();

                    }else {
                      $('#selectOrgFamilies').html('<option>No options available</option>');
                      $('#selectOrgFamilies').attr('disabled', 'disabled');
                      $('#selectOrgGenders').html('<option>No options available</option>');
                      $('#selectOrgGenders').attr('disabled', 'disabled');
                      $('#selectOrgSpecies').html('<option>No options available</option>');
                      $('#selectOrgSpecies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }

        /**
     * [setFamilies Show the availables Families for the Order selected in the addSpecies time ]
     */
    function setOrgGenders(){
      var id = $("#selectOrgFamilies").val();
      if (id !=null){
        $('#selectOrgGenders').html('<option>Loading ...</option>');
        $('#selectOrgGenders').attr('disabled', 'disabled');
        $('#selectOrgSpecies').html('<option>Loading ...</option>');
        $('#selectOrgSpecies').attr('disabled', 'disabled');
        var info = {'idFamily':id}
        $.ajax({
            url: site_url+'index.php/OrganismGender/getGenders/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idGender+'>'+data[i].genderName+'</option>';
                      }
                      $('#selectOrgGenders').html(options);
                      $('#selectOrgGenders').removeAttr('disabled');
                      setOrgSpecies();
                    }else {
                      $('#selectOrgGenders').html('<option>No options available</option>');
                      $('#selectOrgGenders').attr('disabled', 'disabled');
                      $('#selectOrgSpecies').html('<option>No options available</option>');
                      $('#selectOrgSpecies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    function setOrgSpecies(){
      var id = $("#selectOrgGenders").val();
      if (id !=null){
        $('#selectOrgSpecies').html('<option>Loading ...</option>');
        $('#selectOrgSpecies').attr('disabled', 'disabled');
        var info = {'idGender':id}
        $.ajax({
            url: site_url+'index.php/OrganismSpecies/getSpecies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idSpecies+'>'+data[i].speciesName+'</option>';
                      }
                      $('#selectOrgSpecies').html(options);
                      $('#selectOrgSpecies').removeAttr('disabled');
                    }else {
                      $('#selectOrgSpecies').html('<option>No options available</option>');
                      $('#selectOrgSpecies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }

     /**
     * [Add a companion to the collection]
     */
    $( "#addCompanion" ).click(function() {
        if ($('#selectCompanions').val()!=null){
            var idPerson = $('#selectCompanions').val();
            var info = {'idCollection':idCollection, 'idPerson':idPerson}
            $.ajax({
                url: site_url+'index.php/Collection/addCompanion/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          var fila = '<tr id="'+$('#selectCompanions').val()+'">';
                          fila+='<td>'+$("#selectCompanions option:selected").html()+'</td>';
                          fila+= '<td><a class="Delete fa fa-trash-o btn btn-danger deleteCompanion"> Remove</a></td> </tr>';
                          $('#tableCompanions  > tbody:last').append(fila);
                          $("#selectCompanions option:selected").remove();
                          $('#alertCompanionSuccess').removeClass('hide',0,callbackAddCompanion());
                        }else {
                          $('#alertCompanionDanger').removeClass('hide',0,callbackAddErrorCompanion());

                        }
                      }
                    });

        }
    });

    /**
     * [Add a determinator to the collection]
     */
    $( "#addDeterminator" ).click(function() {
        if ($('#selectDeterminators').val()!=null){
            var idPerson = $('#selectDeterminators').val();
            var info = {'idCollection':idCollection, 'idPerson':idPerson}
            $.ajax({
                url: site_url+'index.php/Collection/addDeterminator/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          var fila = '<tr id="'+$('#selectDeterminators').val()+'">';
                          fila+='<td>'+$("#selectDeterminators option:selected").html()+'</td>';
                          fila+= '<td><a class="Delete fa fa-trash-o btn btn-danger deleteDeterminator"> Remove</a></td> </tr>';
                          $('#tableDeterminators  > tbody:last').append(fila);
                          $("#selectDeterminators option:selected").remove();
                          $('#alertDeterminatorSuccess').removeClass('hide',0,callbackAddDeterminator());

                        }else {
                          $('#alertDeterminatorDanger').removeClass('hide',0,callbackAddErrorDeterminator());

                        }
                      }
                    });
        }
    });


    /**
     * [OnClick Remove Determinators]
     */
    $(document).on("click", "#tableDeterminators .deleteDeterminator", function() {
        var id = $(this).parents("tr").attr("id");
        var name = $(this).parents("tr").children(0).html();
        rowDeterminator = $(this);

        $('#myModalLabel').html('Remove Determinator: '+name);
        $('#bodyModal').html('<p>Are you sure you want to remove this record?</p>');
        var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteDeterminator('+id+',\''+name+'\')"  type="button" class="btn btn-danger">Remove</button>';
        $('#butonsModal').html(btns);
        $('#myModal').modal('show');


    });

    var rowDeterminator="";

    function deleteDeterminator(idDeterminator,name){
      var info = {'idCollection':idCollection, 'idPerson':idDeterminator}
      $.ajax({
                url: site_url+'index.php/Collection/deleteDeterminator/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          $('#selectDeterminators').append('<option value="'+idDeterminator+'">'+name+'</option>');
                          rowDeterminator.parents("tr").remove();
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<p>Determinator deleted successfully</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<p>Error!: Problem deleting the Determinator</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }



    /**
     * [OnClick Remove Companion]
     */
    $(document).on("click", "#tableCompanions .deleteCompanion", function() {
        var id = $(this).parents("tr").attr("id");
        var name = $(this).parents("tr").children(0).html();
        rowCompanion = $(this);

        $('#myModalLabel').html('Remove Companion: '+name);
        $('#bodyModal').html('<p>Are you sure you want to remove this record?</p>');
        var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteCompanion('+id+',\''+name+'\')"  type="button" class="btn btn-danger">Remove</button>';
        $('#butonsModal').html(btns);
        $('#myModal').modal('show');


    });

    var rowCompanion="";

    function deleteCompanion(idCompanion,name){
      var info = {'idCollection':idCollection, 'idPerson':idCompanion}
        $.ajax({
                url: site_url+'index.php/Collection/deleteCompanion/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){

                        if(data.result==true){
                          $('#selectCompanions').append('<option value="'+idCompanion+'">'+name+'</option>');
                          rowCompanion.parents("tr").remove();
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<p>Companion deleted successfully</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<p>Error!: Problem deleting the Companion</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }


    $( "#addOrganism" ).click(function() {
        if ($('#selectOrgSpecies').val()!="No options available" && $('#selectOrgSpecies').val()!="Loading ..." && $('#selectOrgGenders').val()!="No options available" && $('#selectOrgGenders').val()!="Loading ..." && $('#selectOrgFamilies').val()!="No options available" && $('#selectOrgFamilies').val()!="Loading ..." && $('#selectOrgOrders').val()!="" ){

            var idSpecies = $('#selectOrgSpecies').val();

            var type = $('input:radio[name=optionsType]:checked').val();

            if($("#checkboxLarvae").is(':checked')){
                var larvae="1";
            }else {
                var larvae="0";
            }
            if($("#checkboxNymphs").is(':checked')){
                var nymph="1";
            }else {
                var nymph="0";
            }
            if($("#checkboxPupae").is(':checked')){
                var pupae="1";
            }else {
                var pupae="0";
            }
            if($("#checkboxAdult").is(':checked')){
                var adult="1";
            }else {
                var adult="10";
            }

            var info = {'idCollection':idCollection, 'idSpecies':idSpecies, 'type':type, 'larvae':larvae , 'nymph':nymph , 'pupae':pupae , 'adult':adult}

            $('#circularG2').removeClass('hide',0);
            $('#addOrganism').addClass('disabled',0);
            $.ajax({
                url: site_url+'index.php/Collection/addOrganism/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){

                          var fila = '<tr id="'+data.idOrganism+'">';
                          var type = $('input:radio[name=optionsType]:checked').val();

                          if (type=="0") {
                              fila+='<td id=0>Inductor</td>';
                          }else {
                              fila+='<td id=1>Associate</td>';
                          }

                          fila+='<td id="'+$('#selectOrgOrders').val()+'">'+$("#selectOrgOrders option:selected").html()+'</td>';
                          fila+='<td id="'+$('#selectOrgFamilies').val()+'">'+$("#selectOrgFamilies option:selected").html()+'</td>';
                          fila+='<td id="'+$('#selectOrgGenders').val()+'">'+$("#selectOrgGenders option:selected").html()+'</td>';
                          fila+='<td id="'+$('#selectOrgSpecies').val()+'">'+$("#selectOrgSpecies option:selected").html()+'</td>';

                          if($("#checkboxLarvae").is(':checked')){
                              fila+='<td id=1>YES</td>';
                          }else {
                              fila+='<td id=0>NO</td>';
                          }
                          if($("#checkboxNymphs").is(':checked')){
                              fila+='<td id=1>YES</td>';
                          }else {
                              fila+='<td id=0>NO</td>';
                          }
                          if($("#checkboxPupae").is(':checked')){
                              fila+='<td id=1>YES</td>';
                          }else {
                              fila+='<td id=0>NO</td>';
                          }
                          if($("#checkboxAdult").is(':checked')){
                              fila+='<td id=1>YES</td>';
                          }else {
                              fila+='<td id=0>NO</td>';
                          }

                          fila+= '<td><a class="Delete fa fa-trash-o btn btn-danger deleteOrganism"> Remove</a></td> </tr>';
                          $('#tableOrganism  > tbody:last').append(fila);

                          $('#circularG2').addClass('hide',0);
                          $('#addOrganism').removeClass('disabled',0);
                          $('#alertOrganismSuccess').removeClass('hide',0,callbackAddOrganism());

                        }else {
                          $('#circularG2').addClass('hide',0);
                          $('#addOrganism').removeClass('disabled',0);
                          $('#alertOrganismDanger').removeClass('hide',0,callbackAddErrorOrganism());

                        }
                      }
                    });

          }
    });

        /**
     * [OnClick Remove Organism]
     */
    var rowOrganism ="";

    $(document).on("click", "#tableOrganism .deleteOrganism", function() {
        var id = $(this).parents("tr").attr("id");
        rowOrganism = $(this);

        $('#myModalLabel').html('Remove Organism');
        $('#bodyModal').html('<p>Are you sure you want to remove this record?</p>');
        var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteOrganism('+id+')"  type="button" class="btn btn-danger">Remove</button>';
        $('#butonsModal').html(btns);
        $('#myModal').modal('show');

    });

    function deleteOrganism(idOrganism)
    {
      var info = {'idCollection':idCollection, 'idOrganism':idOrganism}
        $.ajax({
                url: site_url+'index.php/Collection/deleteOrganism/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          rowOrganism.parents("tr").remove();
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<p>Organism deleted successfully</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<p>Error!: Problem deleting the organism</p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }

    function checkFieldsUpdate(){
      var msg="";
      if($('#collectionNumber').val()=="" || $('#collectionNumber').val() == " " || $('#collectionNumber').val() == " " || $('#collectionNumber').val().indexOf(" ") == 0 ){
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Collection Number field is required</div>';
        $('#divCN').addClass('has-error');
      }
      if($('#selectGalls').val()==null) {

        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Gall field is required</div>';
        $('#divGA').addClass('has-error');

      }
       if($('#selectFamilies').val()==null) {

        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Family field is required</div>';
        $('#divF').addClass('has-error');

      }
      if($('#selectGenders').val()==null || $('#selectGenders').val()=="No options available" || $('#selectGenders').val()=="Loading ..." ) {

        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Gender field is required</div>';
        $('#divG').addClass('has-error');
      }
      if($('#selectSpecies').val()==null || $('#selectSpecies').val()=="No options available" || $('#selectSpecies').val()=="Loading ...") {
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Specie field is required</div>';
        $('#divS').addClass('has-error');
      }

      if($('#selectCountries').val()==null) {
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Country field is required</div>';
        $('#divC').addClass('has-error');
      }
      if($('#selectStates').val()==null || $('#selectStates').val()=="No options available" || $('#selectStates').val()=="Loading" ) {
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>State field is required</div>';
        $('#divST').addClass('has-error');

      }
      if($('#selectCities').val()==null || $('#selectCities').val()=="No options available" || $('#selectCities').val()=="Loading ..." ) {
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>City field is required</div>';
        $('#divCT').addClass('has-error');
      }
       if(isNaN($('#altitude').val())) {
        msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Altitude field must be a number</div>';
        $('#divAT').addClass('has-error');
      }

      if(msg=="")
      {
        $('#divCN').removeClass('has-error');
        $('#divGA').removeClass('has-error');
        $('#divF').removeClass('has-error');
        $('#divG').removeClass('has-error');
        $('#divS').removeClass('has-error');
        $('#divST').removeClass('has-error');
        $('#divC').removeClass('has-error');
        $('#divCT').removeClass('has-error');
        $('#divAT').removeClass('has-error');
        return false;
      }else{
        $('#myModalLabel').text("Information - Error");
        $('#bodyModal').html(msg);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
        $('#myModal').modal('show');
        clearMSGErrorUpdate();
        return true;
      }

    }

    function UpdateCollection() {

            if (!checkFieldsUpdate()){
            var Collection={};
            Collection.id=idCollection;
            Collection.collectionNumber=$('#collectionNumber').val();
            Collection.collectionDate=$('#collectionDate').val();
            Collection.determinationDate=$('#determinationDate').val();
            if($("#drySample").is(':checked')){
              Collection.drySample='1';
            }else {
              Collection.drySample='0';
            }
            if($("#wetSample").is(':checked')){
              Collection.wetSample='1';
            }else {
              Collection.wetSample='0';
            }
            Collection.idGall=$('#selectGalls').val();
            Collection.idSpecie=$('#selectSpecies').val();
            Collection.idCity=$('#selectCities').val();
            Collection.coordinates=$('#coordinates').val();
            Collection.altitude=$('#altitude').val();
            Collection.locationSpanish=$('#locationSpanish').val();
            Collection.locationEnglish=$('#locationEnglish').val();
            Collection.hostSpanish=$('#hostSpanish').val();
            Collection.hostEnglish=$('#hostEnglish').val();
            Collection.morphotypeSpanish=$('#morphotypeSpanish').val();
            Collection.lmorphotypeEnglish=$('#morphotypeEnglish').val();
            Collection.clasifier=$('#selectClassifiers').val();
            Collection.collector=$('#selectCollectors').val();
            $('#circularG').removeClass('hide',0);
            $('#updateCollection').addClass('disabled',0);
            $.ajax({
                url: site_url+'index.php/Collection/editCollection/',
                type:'POST',
                dataType: "json",
                data:Collection,
                success: function(data){
                        if(data.result){

                          $('#tittleCollection').text("Collection "+Collection.collectionNumber);
                          $('#circularG').addClass('hide',0);
                          $('#updateCollection').removeClass('disabled',0);
                          $('#alertSuccess').removeClass('hide',0,callbackEditCollection());
                          var flag = false;
                          var error="<strong>Error!</strong>Please check";
                          if (!data.resultClassifier)
                          {
                            flag=true;
                            error+="the classifier";
                          }
                          if (!data.resultCollector)
                          {
                            if (flag)
                            {
                              error+="and the collector";
                            }else
                            {
                              flag=true;
                              error+="the collector";
                            }
                          }
                          if (flag) {
                            error+=".";
                            $('#alertDanger').html(error);
                            $('#alertDanger').removeClass('hide',0,callbackEditErrorCollection());
                          };



                        }
                        else {
                          $('#circularG').addClass('hide',0);
                          $('#updateCollection').removeClass('disabled',0);
                          $('#alertDanger').html('<strong>Error!</strong>Already exists a entry with this name.');
                          $('#alertDanger').removeClass('hide',0,callbackEditErrorCollection());

                        }
                      }
                    });
        }
        }
    /**
     * [delCollection Show Modal ]
     * @return {[type]} [description]
     */
    function deleteCollection(id){
      var msg="Delete "+$('#tittleCollection').text();
      $('#myModalLabel').html(msg);
      $('#bodyModal').html('<p>Are you sure you want to delete this record?</p>');
      var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteAuxCollection('+id+')"  type="button" class="btn btn-danger">Delete</button>';
      $('#butonsModal').html(btns);
      $('#myModal').modal('show');
    }

    function deleteAuxCollection(idCollection)
    {
      var info = {'idCollection':idCollection}
        $.ajax({
                url: site_url+'index.php/Collection/deleteCollection/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<div class="alert alert-success" role="alert"><strong>Success!</strong>Collection successfully deleted</div></p>');
                          $('#butonsModal').html( '<button type="button" class="btn btn-success" onclick="parent.location=\''+site_url+'index.php/Collection/view\'">Close</button>');
                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems deleting Colection</div></p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }


  function callbackEditCollection() {
      setTimeout(function() {
        $( '#alertSuccess' ).addClass( "hide" );
      }, 4000 );
  }

  function callbackEditErrorCollection() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
      }, 4000 );
  }

    function callbackAddCompanion() {
      setTimeout(function() {
        $( '#alertCompanionSuccess' ).addClass( "hide" );
      }, 3000 );
  }

  function callbackAddErrorCompanion() {
      setTimeout(function() {
        $( '#alertCompanionDanger' ).addClass( "hide" );
      }, 3000 );
  }

  function callbackAddDeterminator() {
      setTimeout(function() {
        $( '#alertDeterminatorSuccess' ).addClass( "hide" );
      }, 3000 );
  }

  function callbackAddErrorDeterminator() {
      setTimeout(function() {
        $( '#alertDeterminatorDanger' ).addClass( "hide" );
      }, 3000 );
  }

  function callbackAddOrganism() {
      setTimeout(function() {
        $( '#alertOrganismSuccess' ).addClass( "hide" );
      }, 4000 );
  }

  function callbackAddErrorOrganism() {
      setTimeout(function() {
        $( '#alertOrganismDanger' ).addClass( "hide" );
      }, 4000 );
  }

  function clearMSGErrorUpdate() {
      setTimeout(function() {
        $('#divCN').removeClass('has-error');
        $('#divGA').removeClass('has-error');
        $('#divF').removeClass('has-error');
        $('#divG').removeClass('has-error');
        $('#divS').removeClass('has-error');
        $('#divST').removeClass('has-error');
        $('#divC').removeClass('has-error');
        $('#divCT').removeClass('has-error');
        $('#divAT').removeClass('has-error');
      }, 6000 );
  }




  $( "#uploadImages" ).click(function() {
    var data;
    debugger;
    data = new FormData($('#upload-file-form'));

    $.ajax({
        url: site_url+'index.php/Upload/index',
        dataType: "json",
        data: $('#upload-file-form').serialize(),
        processData: false,

        type: 'POST',

        success: function (data) {
            alert(data);
        }
    });
    });




    $(document).ready(function() {
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });


      $(document).ready(function() {
        var upload_number = 2;
        $('#attachMore').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag += '<div class="element"><label for="upload_file"' + upload_number + '>Browse a file</label>';
            moreUploadTag += '<input class="btn btn-sm btn-default" type="file" id="upload_file' + upload_number+'" name="upload_file' + upload_number + '"/>';
            moreUploadTag += '<div class="col-sm-10"><a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete</a></div></div>';
            $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
            upload_number++;
        });
    });

       function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }


//Program a custom submit function for the form upload Images
$("form#upload-file-form").submit(function(event){

  //disable the default form submission
  event.preventDefault();

  //grab all form data
  var formData = new FormData($(this)[0]);

  $.ajax({
    url: site_url+'index.php/Upload/index/'+idCollection,
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    dataType: "json",
    processData: false,
    success: function (data) {
      if(!data.result){
        $('#myModalLabel').html('Information');
        $('#bodyModal').html('<div class="alert alert-success" role="alert"><strong>Success!</strong>'+data.success+'</div></p>');
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
        $('#myModal').modal('show');
        getImages();

      }else {
        $('#myModalLabel').html('Error');
        $('#bodyModal').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong>File(s) not uploaded. '+data.errors+'</div></p>');
        $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
        $('#myModal').modal('show');

      }
    }
  });

  return false;
});


/**
 * [showAdd Show Add Organism]
 * @return {[type]} [description]
 */
function showAdd(){
          if($('#newOrganism').is(':visible'))
          {
            $('#newOrganism').hide("slow");
          }else if ($('#newOrganism').is(':hidden')){

          $('#newOrganism').show("slow");
          }
        }


function showAddImage(){
          if($('#newImage').is(':visible'))
          {
            $('#newImage').hide("slow");
          }else if ($('#newImage').is(':hidden')){

          $('#newImage').show("slow");
          }
        }


function deleteImage(id,name){

      var msg="Delete Image";
      $('#myModalLabel').html(msg);
      $('#bodyModal').html('<p>Are you sure you want to remove the image:'+name+'?</p>');
      var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteAuxImage('+id+',\''+name+'\')"  type="button" class="btn btn-danger">Remove</button>';
      $('#butonsModal').html(btns);
      $('#myModal').modal('show');
    }

function deleteAuxImage(idImage,nameImage)
    {
      var info = {'idImage':idImage,'nameImage':nameImage}
        $.ajax({
                url: site_url+'index.php/Collection/deleteImage/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          $('#btnImage_'+idImage).parent().parent().remove();
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<div class="alert alert-success" role="alert"><strong>Success!</strong>Image: '+nameImage+' successfully removed.</div></p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems removing image: '+nameImage+', try again.</div></p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }


function getImages(){
  var info = {'idCollection':idCollection}
  $.ajax({
    url: site_url+'index.php/Collection/getImages/',
    type:'POST',
    dataType: "json",
    data:info,
    success: function(data){

      var temp = data;

      if (temp.length > 0){
        var images = "";
        for (var i = 0; i < data.length ; i++) {
          images+='<div  class="col-xs-3 col-md-2" style="border: 1px solid #ddd;border-radius:5px;margin: 6px;padding: 3px;"><a class="thumbnail" style="padding:0px;margin-bottom:2px;border: 0px;"><img data-src="holder.js/100%x180" alt="100%x180" src="'+site_url+'/images/'+temp[i].name+'" style="height: 180px; width: 100%; display: block;"><div class="caption" style="text-align: center;"><small>'+temp[i].name+'</small><a id="btnImage_'+temp[i].idImage+'"href="javascript:deleteImage('+temp[i].idImage+',\''+temp[i].name+'\');" class="btn btn-danger imgCollection" role="button" >Remove</a></div></a></div>';
        }
        $('#imagesCollection').html(images);
      }
    }
  });
}



