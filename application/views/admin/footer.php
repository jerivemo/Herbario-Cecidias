 </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url(); ?>/tools/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/plugins/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/sb-admin-2.js"></script>
    
    <script src="<?php echo base_url(); ?>tools/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script>
    $(document).ready(function() {
        var tableGalls = $('#dataTables-example').dataTable();
        
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
            url: 'http://localhost/AdminHerbario/index.php/Gall/createGall/'+$('#nameGall').val(),
            type:'POST',
            dataType: "json",
            success: function(data){
                    if(data.result)
                    {
                        $("#dataTables-example").dataTable().fnDestroy();
                        $('#alertSuccess').removeClass( "hide",0,callbackAddGall());

                        var fila = '<tr class="even gradeC">';
                        fila+='<td>'+$('#nameGall').val()+'</td>';
                        fila+='<td><a class="Edit fa fa-edit" ';
                        fila+= 'href="javascript:editGall('+data.id+');"> Edit</a>  | <a class="Delete fa fa-trash-o" href="javascript:deleteGall('+data.id+');" > Delete</a> </tr>';
                        $('#dataTables-example > tbody:last').append(fila);
                        $('#nameGall').val("");
                        $('#nameGall').focus();
                        
                        $("#dataTables-example").dataTable();
                    }else{
                        $('#alertDanger').removeClass( "hide",0,callbackAddGall());
                        $( "#divAdd" ).addClass( "has-error" ,0);  
                    }
                } // End of success function of ajax form
            }); // End of ajax call
       }        
    }

    function callbackErrorAddGall() {
      setTimeout(function() {
        $( '#alertDanger' ).addClass( "hide" );
        $('#divAdd').removeClass( "has-error");
        $('#alertDanger').html('<strong>Error!</strong> Already exists a entry with this name.');
        

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

     function editGallAux(id){
        $.ajax({
                url: 'http://localhost/AdminHerbario/index.php/Gall/editGall/'+id+'/'+$('#editGallName').val(),
                type:'POST',
                success: function(output_string){
                        if(output_string==true)
                        {
                            $("#dataTables-example").dataTable().fnDestroy();
                            $('#td_'+id).html($('#editGallName').val());
                            $('#myModalLabel').text("Information - Successfull");
                            $('#bodyModal').html("<p>Gall successfully edited.</p>");
                            $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                            $("#dataTables-example").dataTable();


                        }else{
                            $('#alertDangerEdit').removeClass( "hide",0,callbackEditGall());
                            $( "#editContent" ).addClass( "has-error" ,0);  
                
                        }                
                        //$('#result_table').append(output_string);
                    } // End of success function of ajax form
                }); // End of ajax call   

    } 

    function editGall(id){
        $('#myModalLabel').text("Edit Gall");
        $('#bodyModal').html('<div id="editContent"><input id="editGallName" required type="text" class="form-control" placeholder="Name" value="'+$('#td_'+id).html()+'"> <br><div id="alertDangerEdit" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"> <strong>Error!</strong> Already exists a entry with this name.</div></div>');
        $( "#butonsModal" ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="editGallAux('+id+')">Update</button>');
        $('#myModal').modal('show');
      
    }
    
    //Edit a gall
   


    //Delete a gall
    function deleteGall(id){

    $('#myModalLabel').text("Delete Gall");
    $('#bodyModal').html("<p>Are you sure you want to delete this record?</p>");
    $( "#butonsModal" ).html( '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="deleteGallAux('+id+')">Delete</button>');
    $('#myModal').modal('show');
      
    }
    /**
     * [deleteGallAux description]
     * @param  {[type]} id
     * @return {[type]}
     */
    function deleteGallAux(id)
    {
         $.ajax({
        url: 'http://localhost/AdminHerbario/index.php/Gall/deleteGall/'+id,
        type:'POST',
        success: function(output_string){
                if(output_string==true)
                {
                    $("#dataTables-example").dataTable().fnDestroy();
                    $('#myModalLabel').text("Information - Successfull");
                    $('#bodyModal').html("<p>Gall successfully deleted.</p>");
                    $( "#butonsModal" ).html( '<button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>' );
                    $('#'+id+'').parents("tr").remove();
                    $("#dataTables-example").dataTable();

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


    </script>
</body>

</html>

