$(document).ready(function() {
        $('#dataTableFamilies').dataTable();
        $('#divAdd').hide();
        //$( "#optOrgFamily" ).addClass( "active" );
        //$( "#menuTaxonomies" ).addClass( "in" );
        //$( "#menuInsects" ).addClass( "in" );
        var combo = $('#selectOrders').combobox({ id:'cboxCountVal',id2:'tboxCount',holder:'Order',val:1});
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
     * [addFamily Add a new Family with ajax]
     */
    function addFamily(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameFamily').val();
      var idOrder = $('#cboxCountVal').val();

      if(idOrder =="" && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Family and Name field are required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddFamily());
         $('#tboxCount').focus();
      }
      else if(idOrder==""){
         $('#alertDanger').html('<strong>Error!</strong>The Family field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddFamily());
         $('#tboxCount').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddFamily());
         $('#nameFamily').focus();
      }else
      {
        var datos = {'idOrder': idOrder,'name': data};
        $.ajax({
            url: site_url+'index.php/OrganismFamily/createFamily',
            type:'POST',
            dataType: "json",
            data: datos,
            success: function(data){
                     if(data.result)
                    {
                        $("#dataTableFamilies").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddFamily());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameFamily').val()+'</td>';
                        fila+='<td id="tdc_'+data.id+'"">'+$('#tboxCount').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editFamily('+data.id+','+idOrder+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteFamily('+data.id+');" > Delete</a> </tr>';
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
      var idOrder=$("#editOrders").val();

      if(idOrder ==null && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
          $('#alertDangerEdit').html('<strong>Error!</strong>The Name and Family field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditFamily());
          $('#editFamilyName').focus();
      }
      else if(idOrder==null){
         $('#alertDangerEdit').html('<strong>Error!</strong>The Family field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditFamily());
          $('#editOrders').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditFamily());
          $('#editFamilyName').focus();
      }else{
          var datos={'id':id,'idOrder':idOrder,'name':data};
          $.ajax({
                url: site_url+'index.php/OrganismFamily/editFamily/',
                type:'POST',
                data:datos,
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableFamilies ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editFamilyName').val());
                            $('#tdc_'+id).html($("#editOrders option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editFamily('+id+','+idOrder+')');
                            $('#myModalLabel').text("Successfull");
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

    function setOrders(id){

      var texto="";
       $.ajax({
            url: site_url+'index.php/OrganismOrder/getOrders',
            type:'POST',
            dataType: "json",
            success: function(data){
            if (data!=false){
                texto = "";
                for (var i = 0; i < data.length; i++){
                  var x ='<option value='+data[i].idOrder+'>'+data[i].orderName+'</option>';
                  texto = texto + x;
                }
                $('#editOrders').html(texto);
                $("#editOrders").val(id);
          }
            }
          });

    }

    function editFamily(id,idOrder){
        $('#myModalLabel').text("Edit Family: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><h4>Name</h4><input id="editFamilyName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"><h4>Order</h4><select id="editOrders" class="form-control"></select> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        setOrders(idOrder);
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
        var name = $('#td_'+id).html()
        var datos = {'id':id}
        $.ajax({
          url: site_url+'index.php/OrganismFamily/deleteFamily/',
          type:'POST',
          data:datos,
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