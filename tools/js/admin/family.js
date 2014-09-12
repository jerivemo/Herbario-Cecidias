$(document).ready(function() {
        $('#dataTableFamilies').dataTable();

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
     * [addFamily Add a new Family with ajax]
     */
    function addFamily(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameFamily').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddFamily());
         $('#nameFamily').focus();
      }else
      {

          $.ajax({
            url: site_url+'index.php/Family/createFamily/'+data,
            type:'POST',
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTableFamilies").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddFamily());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameFamily').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editFamily('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteFamily('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableFamilies  > tbody:last').append(fila);
                        $('#nameFamily').val("");
                        $('#nameFamily').focus();

                        $("#dataTableFamilies ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddFamily());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editFamilyAux(id){
      var data = $('#editFamilyName').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditFamily());
          $('#editFamilyName').focus();
      }else{
          $.ajax({
                url: site_url+'index.php/Family/editFamily/'+id+'/'+data,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableFamilies ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editFamilyName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Family:"+$('#editFamilyName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableFamilies ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditFamily());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function editFamily(id){
        $('#myModalLabel').text("Edit Family: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><input id="editFamilyName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editFamilyAux('+id+')">Update</button>');
        $('#myModal').modal('show');

    }

    //Delete a Family
    function deleteFamily(id){

        $('#myModalLabel').text("Delete Family: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteFamilyAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deleteFamilyAux(id)
    {
        var name = $('#td_'+id).html();
        $.ajax({
          url: site_url+'index.php/Family/deleteFamily/'+id,
          type:'POST',
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableFamilies").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>Family: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableFamilies").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if Family:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddFamily() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditFamily() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditFamily() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddFamily() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }