$(document).ready(function() {
        $('#dataTableGenders').dataTable();
        $('#divAdd').hide();
        //////$( "#optGender" ).addClass( "active" );
       //// $( "#menuTaxonomies" ).addClass( "in" );
       // $( "#menuPlants" ).addClass( "in" );
        var combo = $('#selectFamilies').combobox({ id:'cboxGenderVal',id2:'tboxGender',holder:'Family',val:1});
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
     * [addGender Add a new Gender with ajax]
     */
    function addGender(){
      $( "#alertSuccess" ).addClass( "hide" );
      $( "#alertDanger" ).addClass( "hide" );
      var data = $('#nameGender').val();
      var idFamily = $('#cboxGenderVal').val();

      if(idFamily =="" && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
         $('#alertDanger').html('<strong>Error!</strong>The Family and Name field are required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#tboxGender').focus();
      }
      else if(idFamily==""){
         $('#alertDanger').html('<strong>Error!</strong>The Family field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#tboxGender').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
         $('#alertDanger').html('<strong>Error!</strong>The name field is required.');
         $( "#divAdd" ).addClass( "has-error" ,0);
         $('#alertDanger').removeClass( "hide",0,callbackErrorAddGender());
         $('#nameGender').focus();
      }else
      {
        var datos = {'idFamily': idFamily, 'name':data};
        $.ajax({
            url: site_url+'index.php/Gender/createGender/',
            type:'POST',
            dataType: "json",
            data:datos,
            success: function(data){
                     if(data.result)
                    {
                        $("#dataTableGenders").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddGender());
                        var fila = '<tr class="even gradeC">';
                        fila+='<td id="td_'+data.id+'">'+$('#nameGender').val()+'</td>';
                        fila+='<td id="tdc_'+data.id+'"">'+$('#tboxGender').val()+'</td>';
                        fila+='<td id='+data.id+'><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editGender('+data.id+','+idFamily+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteGender('+data.id+');" > Delete</a> </tr>';
                        $('#dataTableGenders  > tbody:last').append(fila);
                        $('#nameGender').val("");
                        $('#nameGender').focus();

                        $("#dataTableGenders ").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddGender());
                        $( "#divAdd" ).addClass( "has-error" ,0);
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }
    }



     function editGenderAux(id){
      var data = $('#editGenderName').val();
      var idFamily=$("#editFamilies").val();

      if(idFamily ==null && (data == "" || data == " " || data == " " || data.indexOf(" ") == 0)){
          $('#alertDangerEdit').html('<strong>Error!</strong>The Name and Family field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditGender());
          $('#editGenderName').focus();
      }
      else if(idFamily==null){
         $('#alertDangerEdit').html('<strong>Error!</strong>The Family field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditGender());
          $('#editFamilies').focus();

      }else if(data == "" || data == " " || data == " " || data.indexOf(" ") == 0)
      {
          $('#alertDangerEdit').html('<strong>Error!</strong>The name field is required.');
          $('#editContent' ).addClass( "has-error" ,0);
          $('#alertDangerEdit').removeClass( "hide",0,callbackErrorEditGender());
          $('#editGenderName').focus();
      }else{
          var datos = {'id':id,'idFamily':idFamily,'name':data}
          $.ajax({
                url: site_url+'index.php/Gender/editGender/',
                type:'POST',
                data:datos,
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTableGenders ").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editGenderName').val());
                            $('#tdc_'+id).html($("#editFamilies option:selected").html());
                            $('#edit_'+id).attr("href",'javascript:editGender('+id+','+idFamily+')');
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Gender:"+$('#editGenderName').val()+" successfully edited.</p>");
                            $("#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTableGenders ").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditGender());
                            $( "#editContent" ).addClass( "has-error" ,0);

                        }
                    } // End of success function of ajax form
                }); // End of ajax call
            }

    }

    function setFamilies(id){
      var texto="";
       $.ajax({
            url: site_url+'index.php/Family/getFamilies',
            type:'POST',
            dataType: "json",
            success: function(data){
            if (data!=false){
                texto = "";
                for (var i = 0; i < data.length; i++){
                  var x ='<option value='+data[i].idFamily+'>'+data[i].familyName+'</option>';
                  texto = texto + x;
                }
                $('#editFamilies').html(texto);
                $("#editFamilies").val(id);
                $("#editFamilies").change();

          }
            }
          });

    }

    function editGender(id,idFamily){
        $('#myModalLabel').text("Edit Gender: "+$('#td_'+id).html());
        $('#bodyModal').html('<div id="editContent"><h4>Name</h4><input id="editGenderName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"><h4>Family</h4><select id="editFamilies" class="form-control"></select> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        setFamilies(idFamily);
        $('#butonsModal').html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editGenderAux('+id+')">Update</button>');
        $('#myModal').modal('show');




    }

    //Delete a Gender
    function deleteGender(id){

        $('#myModalLabel').text("Delete Gender: "+$('#td_'+id).html());
        $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
        $('#butonsModal' ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteGenderAux('+id+')">Delete</button>');
        $('#myModal').modal('show');

    }

    function deleteGenderAux(id)
    {
        var name = $('#td_'+id).html();
        var datos={'idGender':id};
        $.ajax({
          url: site_url+'index.php/Gender/deleteGender/',
          type:'POST',
          data:datos,
          success: function(output_string){
                  if(output_string==true){
                    $("#dataTableGenders").dataTable().fnDestroy();
                    $('#myModalLabel').text("Successfull");
                    $('#bodyModal').html("<p>Gender: "+name+" successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTableGenders").dataTable();
                  }else{
                    $('#myModalLabel').text("Error");
                    $('#bodyModal').html("<p>Unable to delete this record, check if Gender:"+name+" is used by the application.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#myModal').modal('show');
                  }
                } // End of success function of ajax form
          });
    }

    function callbackErrorAddGender() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
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
        $('#divAdd').removeClass( "has-error");

      }, 4000 );
    }