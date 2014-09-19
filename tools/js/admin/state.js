$(document).ready(function() {
        $('#dataTableStates').dataTable();

            $('#divAdd').hide();
            var combo = $('#selectCountries').combobox({ id:'cboxCountVal',id2:'tboxCount',holder:'Country',val:1});
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
     * [addState Add a new State with ajax]
     */
    function addState(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameState').val();
      var idCountry = $('#cboxCountVal').val();

      if(idCountry =="" && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Country and Name field are required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddState());
         $('#tboxCount').focus();
      }
      else if(idCountry==""){
         $('#alertDanger').html('<strong>Error!</strong>The Country field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddState());
         $('#tboxCount').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddState());
         $('#nameState').focus();
      }else
      {
        $.ajax({
            url: site_url+'index.php/State/createState/'+idCountry+'/'+data,
            type:'POST',
            dataType: "json",
            success: function(data){
                     if(data.result)
                    {
                        $("#dataTableStates").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddState());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameState').val()+'</td>';
                        fila+='<td>'+$('#tboxCount').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editState('+data.id+','+idCountry+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteState('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableStates  > tbody:last').append(fila);
                        $('#nameState').val("");
                        $('#nameState').focus();

                        $("#dataTableStates ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddState());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editStateAux(id){
      var data = $('#editStateName').val();
      var idCountry=$("#editCountries").val();

      if(idCountry ==null && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
          $('#alertDangerEdit').html('<strong>Error!</strong>The Name and Country field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditState());
          $('#editStateName').focus();
      }
      else if(idCountry==null){
         $('#alertDangerEdit').html('<strong>Error!</strong>The Country field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditState());
          $('#editCountries').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditState());
          $('#editStateName').focus();
      }else{
          $.ajax({
                url: site_url+'index.php/State/editState/'+id+'/'+idCountry+'/'+data,
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableStates ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editStateName').val());
                            $('#tdc_'+id).html($("#editCountries option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editState('+id+','+idCountry+')');
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>State:"+$('#editStateName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableStates ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditState());
                            $( "#editContent" ).addClass( "has-error" ,0);

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

    function editState(id,idCountry){
        $('#myModalLabel').text("Edit State: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><h4>Name</h4><input id="editStateName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"><h4>Country</h4><select id="editCountries" class="form-control"></select> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        setCountries(idCountry);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editStateAux('+id+')">Update</button>');
        $('#myModal').modal('show');




    }

    //Delete a State
    function deleteState(id){

        $('#myModalLabel').text("Delete State: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteStateAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deleteStateAux(id)
    {
        var name = $('#td_'+id).html();
        $.ajax({
          url: site_url+'index.php/State/deleteState/'+id,
          type:'POST',
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableStates").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>State: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableStates").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if State:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddState() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');


      }, 4000 );
    }

    function callbackErrorEditState() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");
        $('#alertDangerEdit').html('<strong>Error!</strong> Already exists a entry with this name.');
      }, 4000 );
    }

    function callbackEditState() {
      setTimeout(function() {
        $( '#alertDangerEdit' ).addClass( "hide" );
        $('#editContent').removeClass( "has-error");

      }, 4000 );
    }

    function callbackAddState() {
      setTimeout(function() {
        $( "#alertSuccess" ).addClass( "hide" );
        $( "#alertDanger" ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }