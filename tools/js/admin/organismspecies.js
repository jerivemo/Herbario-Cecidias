$(document).ready(function() {
        $('#dataTableSpecies').dataTable();
       // $( "#optOrgSpecies" ).addClass( "active" );
       // $( "#menuTaxonomies" ).addClass( "in" );
       // $( "#menuInsects" ).addClass( "in" );
        $( "#selectOrders" ).change(function() {setFamilies('no', 'no')});
        $( "#selectFamilies" ).change(function() {setGenders('no')});
    });

    /**
     * [showAdd Show Modal to add a new Species]
     */
    function showAdd(){
      $('#myModalLabel').text("Add a new Species");
      $('#selectOrders option').eq(0).prop('selected',true);
      $("#selectFamilies").html('<option></option>');
      $("#selectGenders").html('<option></option>');
      $('#nameSpecies').val("");
      setFamilies('no','no');
      var buttons = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="addSpecies" class="btn btn-success" onclick="addSpecies();" type="button">Add New</button>';
      $('#butonsModal').html(buttons);
      $('#myModal').modal('show');
    }

    /**
     * [setFamilies Show the availables Families for the Order selected in the addSpecies time ]
     */
    function setFamilies(idFamily, idGender){
      var id = $("#selectOrders").val();
      if (id !=null){
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
                      $('#selectFamilies').html(options);
                      $('#selectFamilies').removeAttr('disabled');
                      if(idFamily!='no')
                      {
                          $("#selectFamilies").val(idFamily);
                          setGenders(idGender);
                      }else{
                          setGenders('no');
                      }
                    }else {
                      $('#selectFamilies').html('<option>No options available</option>');
                      $('#selectFamilies').attr('disabled', 'disabled');
                      $('#selectGenders').html('<option>No options available</option>');
                      $('#selectGenders').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }

        /**
     * [setFamilies Show the availables Families for the Order selected in the addSpecies time ]
     */
    function setGenders(idGender){
      var id = $("#selectFamilies").val();
      if (id !=null){
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
                      $('#selectGenders').html(options);
                      $('#selectGenders').removeAttr('disabled');
                      if(idGender!='no')
                      {
                          $("#selectGenders").val(idGender);
                      }
                    }else {
                      $('#selectGenders').html('<option>No options available</option>');
                      $('#selectGenders').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    /**
     * [addSpecies Add a new Species with ajax]
     */
    function addSpecies(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameSpecies').val();
      var idGender = $('#selectGenders').val();
      if((idGender ==null || idGender=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Gender and Species fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#selectOrders').focus();
      }
      else if(idGender ==null || idGender=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The Gender field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#selectOrders').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The Species field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#nameSpecies').focus();
      }else
      {
        var datos= {'idGender':idGender,'name':name}
        $.ajax({
            url: site_url+'index.php/OrganismSpecies/createSpecies/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data.result)
                    {

                        $("#dataTableSpecies").dataTable().fnDestroy();
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+name+'</td>';
                        fila+='<td id="tdg_'+data.id+'">'+$("#selectGenders option:selected").html()+'</td>';
                        fila+='<td id="tdc_'+data.id+'">'+$("#selectFamilies option:selected").html()+'</td>';
                        fila+='<td id="tdcnt_'+data.id+'">'+$("#selectOrders option:selected").html()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editSpecies('+data.id+','+$("#selectGenders").val()+','+$("#selectFamilies").val()+','+$("#selectOrders").val()+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteSpecies('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableSpecies  > tbody:last').append(fila);
                        $('#nameSpecies').val("");
                        $('#nameSpecies').focus();

                        $('#alertSuccess').html('<strong>Successfull!</strong>Species successfully added.');
                        $('#alertSuccess').removeClass( "hide",0,callbackAddSpecies());

                        $("#dataTableSpecies ").dataTable();
                    }else{
                        $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                        $('#alertDanger').removeClass( "hide",0,callbackAddSpecies());
                        $( "#bodyModal" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editSpeciesAux(id){

      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameSpecies').val();
      var idGender = $('#selectGenders').val();
      if((idGender ==null || idGender=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Gender and Species fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#selectOrders').focus();
      }
      else if(idGender ==null || idGender=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The Gender field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#selectOrders').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The Species field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddSpecies());
         $('#nameSpecies').focus();
      }else
      {
        var datos= {'id':id,'idGender':idGender,'name':name}
        $.ajax({
            url: site_url+'index.php/OrganismSpecies/editSpecies/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data){
                            $("#dataTableSpecies ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#nameSpecies').val());
                            $('#tdg_'+id).html($("#selectGenders option:selected").html());
                            $('#tdc_'+id).html($("#selectFamilies option:selected").html());
                            $('#tdcnt_'+id).html($("#selectOrders option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editSpecies('+id+','+$("#selectGenders").val()+','+$("#selectFamilies").val()+','+$("#selectOrders").val()+')');

                            $('#modalOptionsTitle').text("Successfull");
                            $('#modalOptionsBody').html("<p>Species: "+$('#nameSpecies').val()+" successfully edited.</p>");
                            $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );

                            $('#myModal').modal('hide');
                            $('#modalOptions').modal('show');

                            $("#dataTableSpecies").dataTable();




                        }else{
                            $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                            $('#alertDanger').removeClass( "hide",0,callbackAddSpecies());
                            $( "#bodyModal" ).addClass( "has-error" ,0);
                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }


    function editSpecies(id,idGender,idFamily,idOrder){
        $('#myModalLabel').text("Edit Species: "+$('#td_'+id).html());
        $("#selectFamilies").html('<option></option>');
        $("#selectGenders").html('<option></option>');
        $("#selectOrders").val(idOrder);
        setFamilies(idFamily,idGender);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editSpeciesAux('+id+')">Update</button>');
        $('#nameSpecies').val($('#td_'+id).html());
        $('#myModal').modal('show');
    }


    function deleteSpecies(id){

        $('#modalOptionsTitle').text("Delete Species: "+$('#td_'+id).html());
        $('#modalOptionsBody').html("<p>Are you sure you want to delete this record?</p>");
        $('#modalOptionsButons' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteSpeciesAux('+id+')">Delete</button>');
        $('#modalOptions').modal('show');

    }

    function deleteSpeciesAux(id)
    {
        var name = $('#td_'+id).html();
        var datos= {'idSpecies':id}
        $.ajax({
          url: site_url+'index.php/organismSpecies/deleteSpecies/',
          type:'POST',
          data:datos,
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableSpecies").dataTable().fnDestroy();
                    $('#modalOptionsTitle').text("Successfull");
                    $('#modalOptionsBody').html("<p>Species: "+name+" successfully deleted.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableSpecies").dataTable();
                  }else{
                    $('#modalOptionsTitle').text("Error");
                    $('#modalOptionsBody').html("<p>Unable to delete this record, check if State:"+name+" is used by the application.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#modalOptions').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddSpecies() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditSpecies() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditSpecies() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddSpecies() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");

      }, 4000 );
    }