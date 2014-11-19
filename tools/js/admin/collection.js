$(document).ready(function() {
        //$('#dataTableSpecies').dataTable();
        $( "#selectFamilies" ).change(function() {setGenders()});
        $( "#selectGenders" ).change(function() {setSpecies()});

        $( "#selectCountries" ).change(function() {setStates()});
        $( "#selectStates" ).change(function() {setCities()});

        $( "#selectOrgOrders" ).change(function() {setOrgFamilies()});
        $( "#selectOrgFamilies" ).change(function() {setOrgGenders()});

        setGenders();
        setStates();
        setOrgFamilies();

    });



  /**
     * [setGenders Show the availables Species for the Family selected]
     */
    function setGenders(){
      var id = $("#selectFamilies").val();
      if (id !=null){
        $('#selectGenders').html('<option>Loading ...</option>');
        $('#selectGenders').attr('disabled', 'disabled');
        $('#selectSpecies').html('<option>Loading ...</option>');
        $('#selectSpecies').attr('disabled', 'disabled');
        var info = {'idFamily':id}
        $.ajax({
            url: site_url+'index.php/gender/getGenders/',
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
            url: site_url+'index.php/species/getSpecies/',
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
            url: site_url+'index.php/state/getStates/',
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
            url: site_url+'index.php/city/getCities/',
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
            url: site_url+'index.php/organismfamily/getFamilies/',
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
            url: site_url+'index.php/organismgender/getGenders/',
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
            url: site_url+'index.php/organismspecies/getSpecies/',
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
            var fila = '<tr id="'+$('#selectCompanions').val()+'">';
            fila+='<td>'+$("#selectCompanions option:selected").html()+'</td>';
            fila+= '<td><a class="Delete fa fa-trash-o btn btn-danger deleteCompanion"> Remove</a></td> </tr>';
            $('#tableCompanions  > tbody:last').append(fila);
            $("#selectCompanions option:selected").remove();
        }
    });

    /**
     * [Add a determinator to the collection]
     */
    $( "#addDeterminator" ).click(function() {
        if ($('#selectDeterminators').val()!=null){
            var fila = '<tr id="'+$('#selectDeterminators').val()+'">';
            fila+='<td>'+$("#selectDeterminators option:selected").html()+'</td>';
            fila+= '<td><a class="Delete fa fa-trash-o btn btn-danger deleteDeterminator"> Remove</a></td> </tr>';
            $('#tableDeterminators  > tbody:last').append(fila);
            $("#selectDeterminators option:selected").remove();
        }
    });


    /**
     * [OnClick Remove Determinators]
     */
    $(document).on("click", "#tableDeterminators .deleteDeterminator", function() {
        var id = $(this).parents("tr").attr("id");
        var name = $(this).parents("tr").children(0).html();
         $('#selectDeterminators').append('<option value="'+id+'">'+name+'</option>');
        $(this).parents("tr").remove();

    });

    /**
     * [OnClick Remove Companion]
     */
    $(document).on("click", "#tableCompanions .deleteCompanion", function() {
        var id = $(this).parents("tr").attr("id");
        var name = $(this).parents("tr").children(0).html();
         $('#selectCompanions').append('<option value="'+id+'">'+name+'</option>');
        $(this).parents("tr").remove();

    });



    $( "#addOrganism" ).click(function() {
        if ($('#selectOrgSpecies').val()!="No options available" && $('#selectOrgSpecies').val()!="Loading ..." && $('#selectOrgGenders').val()!="No options available" && $('#selectOrgGenders').val()!="Loading ..." && $('#selectOrgFamilies').val()!="No options available" && $('#selectOrgFamilies').val()!="Loading ..." && $('#selectOrgOrders').val()!="" ){

            var fila = '<tr>';
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

        }
    });

        /**
     * [OnClick Remove Organism]
     */
    $(document).on("click", "#tableOrganism .deleteOrganism", function() {
        $(this).parents("tr").remove();

    });


    //Eliminar imagen
    $(document).on("click", ".imgCollection", function() {
        $(this).parent().parent().remove();
    });


    var resultUploadImages="";
    function createCollection(){

            if(Collection.length==0)
            {

            }else {
              resultUploadImages=""
                $.ajax({
                url: site_url+'index.php/collection/createCollection/',
                type:'POST',
                dataType: "json",
                data:Collection,
                success: function(data){
                        var msg ="";
                        if(data.result){
                          msg='<div class="alert alert-success" role="alert"><strong>Success!</strong>Collection successfully added</div>';
                          if(data.resultClassifier==false){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems adding the Classifier to the collection</div>';
                          }
                          if(data.resultCollector==false){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems adding the Collector to the collection</div>';
                          }
                          if(data.resultCompanions==false){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems adding the Companions to the collection</div>';
                          }
                          if(data.resultDeterminators==false){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems adding the Determinators to the collection</div>';
                          }
                          if(data.resultOrganisms==false){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems adding the Organisms to the collection</div>';
                          }
                          idCollection = data.idCollection;
                          $( "#upload-file-form" ).submit();


                          if(resultUploadImages!=true && resultUploadImages!=""){
                            msg+='<div class="alert alert-danger" role="alert"><strong>Error!</strong>File(s) not uploaded. ';
                            msg+=resultUploadImages;
                            msg+='. Try later</div>';
                          }

                          $('#myModalLabel').text("Information");
                          $('#bodyModal').html(msg);
                          $('#butonsModal').html( '<button type="button" class="btn btn-success" onclick="parent.location=\''+site_url+'index.php/collection/add\'">Close</button>');
                          $('#myModal').modal('show');
                        }else{
                          msg='<div class="alert alert-danger" role="alert"><strong>Error!</strong>Alredy exist a entry with this Collection Number</div>';
                          $('#myModalLabel').text("Information - Error");
                          $('#bodyModal').html(msg);
                          $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                          $('#myModal').modal('show');
                        }
                      }
                    });
            }
    }


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
    url: site_url+'index.php/upload/index/'+idCollection,
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    dataType: "json",
    processData: false,
    success: function (data) {
      if(!data.result){
        resultUploadImages=true;
      }else {
        resultUploadImages = data.errors;
      }
    }
  });

});










