$(document).ready(function() {
        $('#dataTableOrders').dataTable();
        $('#divAdd').hide();
       // $( "#optOrgOrder" ).addClass( "active" );
       // $( "#menuTaxonomies" ).addClass( "in" );
       // $( "#menuInsects" ).addClass( "in" );
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
     * [addOrder Add a new Order with ajax]
     */
    function addOrder(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameOrder').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddOrder());
         $('#nameOrder').focus();
      }else
      {

          $.ajax({
            url: site_url+'index.php/OrganismOrder/createOrganismOrder/'+data,
            type:'POST',
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTableOrders").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddOrder());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameOrder').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editOrder('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteOrder('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableOrders  > tbody:last').append(fila);
                        $('#nameOrder').val("");
                        $('#nameOrder').focus();

                        $("#dataTableOrders ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddOrder());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editOrderAux(id){
      var data = $('#editOrderName').val();
      if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditOrder());
          $('#editOrderName').focus();
      }else{
          $.ajax({
                url: site_url+'index.php/OrganismOrder/editOrganismOrder/'+id+'/'+data,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableOrders ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editOrderName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Order:"+$('#editOrderName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableOrders ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditOrder());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function editOrder(id){
        $('#myModalLabel').text("Edit Order: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><input id="editOrderName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editOrderAux('+id+')">Update</button>');
        $('#myModal').modal('show');

    }

    //Delete a Order
    function deleteOrder(id){

        $('#myModalLabel').text("Delete Order: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteOrderAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deleteOrderAux(id)
    {
        var name = $('#td_'+id).html();
        $.ajax({
          url: site_url+'index.php/OrganismOrder/deleteOrganismOrder/'+id,
          type:'POST',
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableOrders").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>Order: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableOrders").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if Order:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddOrder() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditOrder() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditOrder() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddOrder() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }