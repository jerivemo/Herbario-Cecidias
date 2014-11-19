$(document).ready(function() {
        $('#dataTableCountries').dataTable();
        $('#divAdd').hide();
       // $( "#optCountry" ).addClass( "active" );
        //$( "#menuLocations" ).addClass( "in" );
    });

    /**
     * [showAdd show Add Panel]
     */
    function showAdd(){
          if($('#divAdd').is(':visible'))
          {
            $('#divAdd').hide("slow");
          }else if ($('#divAdd').is(':hidden')){

          $('#divAdd').show("slow");
          }
    }


    /**
     * [addCountry Add a new Country with ajax]
     */
    function addCountry(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameCountry').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddCountry());
         $('#nameCountry').focus();
      }else
      {
          var datos = {'name':data};
          $.ajax({
            url: site_url+'index.php/country/createCountry/',
            type:'POST',
            data:datos,
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTableCountries").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddCountry());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameCountry').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editCountry('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteCountry('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableCountries  > tbody:last').append(fila);
                        $('#nameCountry').val("");
                        $('#nameCountry').focus();

                        $("#dataTableCountries ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddCountry());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editCountryAux(id){
      var data = $('#editCountryName').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditCountry());
          $('#editCountryName').focus();
      }else{
          var datos = {'id': id, 'name':data};
          $.ajax({
                url: site_url+'index.php/country/editCountry/',
                data:datos,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableCountries ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editCountryName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Country:"+$('#editCountryName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableCountries ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditCountry());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function editCountry(id){
        $('#myModalLabel').text("Edit Country: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><input id="editCountryName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editCountryAux('+id+')">Update</button>');
        $('#myModal').modal('show');

    }

    //Delete a Country
    function deleteCountry(id){

        $('#myModalLabel').text("Delete Country: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteCountryAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deleteCountryAux(id)
    {
        var name = $('#td_'+id).html();
        var datos = {'id': id};
        $.ajax({
          url: site_url+'index.php/country/deleteCountry/',
          data:datos,
          type:'POST',
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableCountries").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>Country: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableCountries").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if Country:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddCountry() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditCountry() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditCountry() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddCountry() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }