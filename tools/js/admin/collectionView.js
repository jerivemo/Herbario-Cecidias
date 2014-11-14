    function deleteCollection(id){
      var msg="Delete "+$('#tittleCollection').text();
      $('#myModalLabel').html(msg);
      $('#bodyModal').html('<p>Are you sure you want to delete this record?</p>');
      var btns='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="deleteAuxCollection('+id+')"  type="button" class="btn btn-danger">Delete</button>';
      $('#butonsModal').html(btns);
      $('#myModal').modal('show');
    }

    function deleteAuxCollection(idCollection)
    {
      var info = {'idCollection':idCollection}
        $.ajax({
                url: site_url+'index.php/Collection/deleteCollection/',
                type:'POST',
                dataType: "json",
                data:info,
                success: function(data){
                        if(data.result){
                          debugger;
                          $("#dataTableCollections").dataTable().fnDestroy();
                          $('#tr_'+idCollection).remove();
                          $("#dataTableCollections").dataTable();
                          $('#myModalLabel').html('Information');
                          $('#bodyModal').html('<div class="alert alert-success" role="alert"><strong>Success!</strong>Collection successfully deleted</div></p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');


                        }else {
                          $('#myModalLabel').html('Error');
                          $('#bodyModal').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong>Problems deleting Colection</div></p>');
                          $('#butonsModal').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');

                        }
                      }
                    });
    }