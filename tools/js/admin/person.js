$(document).ready(function() {
        $('#dataTablePersons').dataTable();

            $('#divAdd').hide();
    });

    /**
     * [showAdd show Add Panel]
     */
    function showAdd(){
          $('#divAdd').hide("slow");
          $('#divAdd').show("slow");
    }

    /**
     * [addPerson Add a new Person with ajax]
     */
    function addPerson(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#namePerson').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddPerson());
         $('#namePerson').focus();
      }else
      {

          $.ajax({
            url: site_url+'index.php/Person/createPerson/'+data,
            type:'POST',
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTablePersons").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddPerson());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#namePerson').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editPerson('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deletePerson('+data.id+');" > Delete</a> </tr>';
                        $('#dataTablePersons  > tbody:last').append(fila);
                        $('#namePerson').val("");
                        $('#namePerson').focus();

                        $("#dataTablePersons ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddPerson());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editPersonAux(id){
      var data = $('#editPersonName').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditPerson());
          $('#editPersonName').focus();
      }else{
          $.ajax({
                url: site_url+'index.php/Person/editPerson/'+id+'/'+data,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTablePersons ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editPersonName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Person:"+$('#editPersonName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTablePersons ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditPerson());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function editPerson(id){
        $('#myModalLabel').text("Edit Person: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><input id="editPersonName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editPersonAux('+id+')">Update</button>');
        $('#myModal').modal('show');

    }

    //Delete a Person
    function deletePerson(id){

        $('#myModalLabel').text("Delete Person: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deletePersonAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deletePersonAux(id)
    {
        var name = $('#td_'+id).html();
        $.ajax({
          url: site_url+'index.php/Person/deletePerson/'+id,
          type:'POST',
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTablePersons").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>Person: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTablePersons").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if Person:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddPerson() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditPerson() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditPerson() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddPerson() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }