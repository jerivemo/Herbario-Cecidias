<section class="content-header">
    <h1>Collections<small>View</small></h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row" style="margin-right:0px;margin-left: 0px">

      <div class="panel panel" style="width=100">
                       <div class="panel-heading">
                       <div class="row">
                       <div class="col-md-1"><a href="<?php echo base_url(); ?>index.php/collection/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                       </div>
                       </div>
                       </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">List of Collections</h3>
                                </div><!-- /.box-header -->
                              <div class="box-body table-responsive" >
                                <table class="table table-striped table-bordered"  id="dataTableCollections">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Collection Number</th>
                                            <th>Family</th>
                                            <th>Gender</th>
                                            <th>Specie</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th style="width:120px" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           if (isset($collection)){
                                              if ($collection !=false){
                                                  foreach ($collection as $result => $row) {
                                                    echo '<tr id=tr_'.$row->idCollection.' >';
                                                    echo '<td>' .$row->collectionNumber. '</td>';
                                                    echo '<td>' .$row->familyName. '</td>';
                                                    echo '<td>' .$row->genderName. '</td>';
                                                    echo '<td>' .$row->speciesName. '</td>';
                                                    echo '<td>' .$row->nameCountry. '</td>';
                                                    echo '<td>' .$row->nameState. '</td>';
                                                    echo '<td>' .$row->nameCity. '</td>';
                                                    echo '<td ><a class="Edit fa fa-edit" href="'.base_url().'index.php/collection/edit/'.$row->idCollection.'"> Edit</a>  |
                                                          <a class="Delete fa fa-trash-o" href="javascript:deleteCollection('.$row->idCollection.');" > Delete</a></td>
                                                          </tr>';
                                                 }
                                              }
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                          </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
</div>

                               <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="false" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel">Remove</h4>
                                        </div>
                                        <div id="bodyModal" class="modal-body">
                                        <p>Are you sure you want to delete this record?</p>
                                        </div>
                                        <div id="butonsModal" class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

</section><!-- /.content -->