$(document).ready(function() {
        $('#dataTableGenders').dataTable();
        //$( "#optOrgGender" ).addClass( "active" );
        //$( "#menuTaxonomies" ).addClass( "in" );
        //$( "#menuInsects" ).addClass( "in" );
        $( "#selectOrders" ).change(function() {setFamilies('no')});
    });

    /**
     * [showAdd Show Modal to add a new Gender]
     */
    function showAdd(){
      $('#myModalLabel').text("Add a new Gender");
      $('#selectOrders option').eq(0).prop('selected',true);
      $("#selectFamilies").html('<option></option>');
      $('#nameGender').val("");
      setFamilies('no');
      var buttons = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="addGender" class="btn btn-success" onclick="addGender();" type="button">Add New</button>';
      $('#butonsModal').html(buttons);
      $('#myModal').modal('show');
    }

    /**
     * [setFamilies Show the availables Families for the Order selected in the addGender time ]
     */
    function setFamilies(idFamily){
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
                      }
                    }else {
                      $('#selectFamilies').html('<option>No options available</option>');
                      $('#selectFamilies').attr('disabled', 'disabled');
                    }
                  }
                });
      }
    }


    /**
     * [addGender Add a new Gender with ajax]
     */
    function addGender(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameGender').val();
      var idFamily = $('#selectFamilies').val();
      if((idFamily ==null || idFamily=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Family and Gender fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#selectOrders').focus();
      }
      else if(idFamily ==null || idFamily=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The Family field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#selectOrders').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The Gender field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#nameGender').focus();
      }else
      {
        var datos= {'idFamily':idFamily,'name':name}
        $.ajax({
            url: site_url+'index.php/OrganismGender/createGender/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data.result)
                    {

                        $("#dataTableGenders").dataTable().fnDestroy();
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+name+'</td>';
                        fila+='<td id="tdc_'+data.id+'">'+$("#selectFamilies option:selected").html()+'</td>';
                        fila+='<td id="tdcnt_'+data.id+'">'+$("#selectOrders option:selected").html()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editGender('+data.id+','+idFamily+','+$("#selectOrders").val()+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteGender('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableGenders  > tbody:last').append(fila);
                        $('#nameGender').val("");
                        $('#nameGender').focus();

                        $('#alertSuccess').html('<strong>Successfull!</strong>Gender successfully added.');
                        $('#alertSuccess').removeClass( "hide",0,callbackAddGender());

                        $("#dataTableGenders ").dataTable();
                    }else{
                        $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                        $('#alertDanger').removeClass( "hide",0,callbackAddGender());
                        $( "#bodyModal" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editGenderAux(id){

      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var name = $('#nameGender').val();
      var idFamily = $('#selectFamilies').val();
      if((idFamily ==null || idFamily=="No options available") && (name == "" || name == " " || name == " " || name.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Family and Gender fields are required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#selectOrders').focus();
      }
      else if(idFamily ==null || idFamily=="No options available"){
         $('#alertDanger').html('<strong>Error!</strong>The Family field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#selectOrders').focus();

      }else if(name == "" || name == " " || name == " " || name.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The Gender field is required.');
         $( "#bodyModal" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#nameGender').focus();
      }else
      {
        var datos= {'id':id,'idFamily':idFamily,'name':name}
        $.ajax({
            url: site_url+'index.php/OrganismGender/editGender/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data){
                            $("#dataTableGenders ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#nameGender').val());
                            $('#tdc_'+id).html($("#selectFamilies option:selected").html());
                            $('#tdcnt_'+id).html($("#selectOrders option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editGender('+id+','+$("#selectFamilies").val()+','+$("#selectOrders").val()+')');

                            $('#modalOptionsTitle').text("Successfull");
                            $('#modalOptionsBody').html("<p>Gender: "+$('#nameGender').val()+" successfully edited.</p>");
                            $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );

                            $('#myModal').modal('hide');
                            $('#modalOptions').modal('show');

                            $("#dataTableGenders").dataTable();




                        }else{
                            $('#alertDanger').html('<strong>Error!</strong>r!Already exists a entry with this name.');
                            $('#alertDanger').removeClass( "hide",0,callbackAddGender());
                            $( "#bodyModal" ).addClass( "has-error" ,0);
                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }


    function editGender(id,idFamily,idOrder){
        $('#myModalLabel').text("Edit Gender: "+$('#td_'+id).html());
        $("#selectFamilies").html('<option></option>');
        $("#selectOrders").val(idOrder);
        setFamilies(idFamily);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editGenderAux('+id+')">Update</button>');
        $('#nameGender').val($('#td_'+id).html());
        $('#myModal').modal('show');
    }


    function deleteGender(id){

        $('#modalOptionsTitle').text("Delete Gender: "+$('#td_'+id).html());
        $('#modalOptionsBody').html("<p>Are you sure you want to delete this record?</p>");
        $('#modalOptionsButons' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteGenderAux('+id+')">Delete</button>');
        $('#modalOptions').modal('show');

    }

    function deleteGenderAux(id)
    {
        var name = $('#td_'+id).html();
        var datos= {'idGender':id}
        $.ajax({
          url: site_url+'index.php/organismgender/deleteGender/',
          type:'POST',
          data:datos,
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableGenders").dataTable().fnDestroy();
                    $('#modalOptionsTitle').text("Successfull");
                    $('#modalOptionsBody').html("<p>Gender: "+name+" successfully deleted.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableGenders").dataTable();
                  }else{
                    $('#modalOptionsTitle').text("Error");
                    $('#modalOptionsBody').html("<p>Unable to delete this record, check if State:"+name+" is used by the application.</p>");
                    $( "#modalOptionsButons" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#modalOptions').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddGender() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditGender() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditGender() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddGender() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#bodyModal').removeClass( "has-error");

      }, 4000 );
    }