$(document).ready(function() {
        $('#dataTableCities').dataTable();
        $( "#selectCountries" ).change(function() {setStates('no')});
        //$( "#optCity" ).addClass( "active" );
        //$( "#menuLocations" ).addClass( "in" );
    });

    /**
     * [showAdd Show Modal to add a new city]
     */
    function showAdd(){
      $('#myModalLabel').text("Add a new City");
      $('#selectCountries option').eq(0).prop('selected',true);
      $("#selectStates").html('<option></option>');
      $('#nameCity').val("");
      setStates('no');
      var buttons = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="addCity" class="btn btn-success" onclick="addCity();" type="button">Add New</button>';
      $('#butonsModal').html(buttons);
      $('#myModal').modal('show');
    }

    /**
     * [setStates Show the availables cities for the country selected in the addCity time ]
     */
    function setStates(idState){
      var id = $("#selectCountries").val();
      if (id !=null){
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
                      if(idState!='no')
                      {
                      $("#selectStates").val(idState);
                      }
                    }else {
                      $('#selectStates').html('<option>No options available</option>');
                      $('#selectStates').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    /**
     * [addCity Add a new City with ajax]
     */
    function addCity(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameCity').val();
      var idState = $('#selectStates').val();
      if((idState ==null || idState=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The State and City fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#selectCountries').focus();
      }
      else if(idState ==null || idState=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The State field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#selectCountries').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The City field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#nameCity').focus();
      }else
      {
        var datos= {'idState':idState,'name':name}
        $.ajax({
            url: site_url+'index.php/City/createCity/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data.result)
                    {

                        $("#dataTableCities").dataTable().fnDestroy();
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+name+'</td>';
                        fila+='<td id="tdc_'+data.id+'">'+$("#selectStates option:selected").html()+'</td>';
                        fila+='<td id="tdcnt_'+data.id+'">'+$("#selectCountries option:selected").html()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editCity('+data.id+','+idState+','+$("#selectCountries").val()+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteCity('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableCities  > tbody:last').append(fila);
                        $('#nameCity').val("");
                        $('#nameCity').focus();

                        $('#alertSuccess').html('<strong>Successfull!</strong>City successfully added.');
                        $('#alertSuccess').removeClass( "hide",0,callbackAddCity());

                        $("#dataTableCities ").dataTable();
                    }else{
                        $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                        $('#alertDanger').removeClass( "hide",0,callbackAddCity());
                        $( "#bodyModal" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editCityAux(id){

      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameCity').val();
      var idState = $('#selectStates').val();
      if((idState ==null || idState=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The State and City fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#selectCountries').focus();
      }
      else if(idState ==null || idState=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The State field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#selectCountries').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The City field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCity());
         $('#nameCity').focus();
      }else
      {
        var datos= {'id':id,'idState':idState,'name':name}
        $.ajax({
            url: site_url+'index.php/City/editCity/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data){
                            $("#dataTableCities ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#nameCity').val());
                            $('#tdc_'+id).html($("#selectStates option:selected").html());
                            $('#tdcnt_'+id).html($("#selectCountries option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editCity('+id+','+$("#selectStates").val()+','+$("#selectCountries").val()+')');

                            $('#modalOptionsTitle').text("Successfull");
                            $('#modalOptionsBody').html("<p>City: "+$('#nameCity').val()+" successfully edited.</p>");
                            $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );

                            $('#myModal').modal('hide');
                            $('#modalOptions').modal('show');

                            $("#dataTableCities").dataTable();




                        }else{
                            $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                            $('#alertDanger').removeClass( "hide",0,callbackAddCity());
                            $( "#bodyModal" ).addClass( "has-error" ,0);
                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function setCountries(id){
      var texto="";
       $.ajax({
            url: site_url+'index.php/Country/getCountries',
            type:'POST',
            dataType: "json",
            success: function(data){
            if (data!=false){
                texto = "";
                for (var i = 0; i < data.length; i++){
                  var x ='<option value='+data[i].idCountry+'>'+data[i].nameCountry+'</option>';
                  texto = texto + x;
                }
                $('#editCountries').html(texto);
                $("#editCountries").val(id);
                $("#editCountries").change();

          }
            }
          });

    }

    function editCity(id,idState,idCountry){
        $('#myModalLabel').text("Edit City: "+$('#td_'+id).html());
        $("#selectStates").html('<option></option>');
        $("#selectCountries").val(idCountry);
        setStates(idState);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editCityAux('+id+')">Update</button>');
        $('#nameCity').val($('#td_'+id).html());
        $('#myModal').modal('show');
    }


    function deleteCity(id){

        $('#modalOptionsTitle').text("Delete City: "+$('#td_'+id).html());
        $('#modalOptionsBody').html("<p>Are you sure you want to delete this record?</p>");
        $('#modalOptionsButons' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteCityAux('+id+')">Delete</button>');
        $('#modalOptions').modal('show');

    }

    function deleteCityAux(id)
    {
        var name = $('#td_'+id).html();
        var datos= {'idCity':id}
        $.ajax({
          url: site_url+'index.php/City/deleteCity/',
          type:'POST',
          data:datos,
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableCities").dataTable().fnDestroy();
                    $('#modalOptionsTitle').text("Successfull");
                    $('#modalOptionsBody').html("<p>City: "+name+" successfully deleted.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableCities").dataTable();
                  }else{
                    $('#modalOptionsTitle').text("Error");
                    $('#modalOptionsBody').html("<p>Unable to delete this record, check if State:"+name+" is used by the application.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#modalOptions').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddCity() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditCity() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditCity() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddCity() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");

      }, 4000 );
    }