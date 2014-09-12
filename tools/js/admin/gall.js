$(document).ready(function() {
        $('#dataTableGalls').dataTable();

            $('#divAdd').hide();
    });

    function showAdd(){
          $('#divAdd').hide("slow");
          $('#divAdd').show("slow");
    }

    function addGall(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );

      var data = $('#nameGall').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGall());
         $('#nameGall').focus();
      }else
      {

          $.ajax({
            url: site_url+'index.php/Gall/createGall/'+data,
            type:'POST',
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTableGalls").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddGall());

                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameGall').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editGall('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteGall('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableGalls > tbody:last').append(fila);
                        $('#nameGall').val("");
                        $('#nameGall').focus();

                        $("#dataTableGalls").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddGall());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }


    function editGallAux(id){
      var data = $('#editGallName').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
         $('#editContent' ).addClass( "has-error" ,0);
         $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditGall());
         $('#editGallName').focus();
      }else
      {

        $.ajax({
                url: site_url+'index.php/Gall/editGall/'+id+'/'+data,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableGalls").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editGallName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Gall successfully edited.</p>");
                            $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableGalls").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditGall());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                        //$('#result_table').append(output_string);
                    } // End of success function of ajax form
                }); // End of ajax call
      }
    }

    function editGall(id){
        $('#myModalLabel').text("Edit Gall");
        $('#bodyModal').html('<div id="editContent"><input id="editGallName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $( "#butonsModal" ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editGallAux('+id+')">Update</button>');
        $('#myModal').modal('show');

    }

    //Delete a gall
    function deleteGall(id){

    $('#myModalLabel').text("Delete Gall");
    $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
    $( "#butonsModal" ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteGallAux('+id+')">Delete</button>');
    $('#myModal').modal('show');

    }

    function deleteGallAux(id)
    {
         $.ajax({
        url: site_url+'index.php/Gall/deleteGall/'+id,
        type:'POST',
        success: function(output_string){
                if(output_string==true)
                {
                    $("#dataTableGalls").dataTable().fnDestroy();
                    $('#myModalLabel').text("Information - Successfull");
                    $('#bodyModal').html("<p>Gall successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableGalls").dataTable();

                }else{
                    $('#myModalLabel').text("Information - Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if it is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                }

                //$('#result_table').append(output_string);
            } // End of success function of ajax form
        });
    }


    function callbackErrorAddGall() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackErrorEditGall() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditGall() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
      }, 4000 );
    }

    function callbackAddGall() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
      }, 4000 );
    }
