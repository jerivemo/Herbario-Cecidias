<br>
<div class="row" style="">      <!-- Form Name -->
      <legend> <a href="<?php echo base_url(); ?>index.php/City"> Cities</a></legend>

      <div class="panel panel" style="width=100">
                        <div class="panel-heading">

                       <div class="row">


                        <div class="col-md-1"><a href="javascript:showAdd();" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                        </div>

                        <div id="alertSuccess" class="col-md-2 alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert">
                          <strong>Successful!</strong> City successfully added.
                        </div>

                        <div id="alertDanger" class="col-md-3 hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert">
                          <strong>Error!</strong> Already exists a entry with this name.
                        </div>


                       </div>


                        </div>
                        <hr>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="table-responsive" style="width:480px">
                                <table class="table table-striped table-bordered"  id="dataTableCities">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th style="width:110px" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           if (isset($datos)){
                                           if ($datos !=""){
                                           foreach ($datos as $result => $row) {
                                              echo '<tr class="even gradeC">';
                                              echo '<td id=td_'.$row->idCity.'>' .$row->nameCity. '</td>';
                                              echo '<td id=tdc_'.$row->idCity.'>' .$row->nameState. '</td>';
                                              echo '<td id='.$row->idCity.' ><a id=edit_'.$row->idCity.' class="Edit fa fa-edit" href="javascript:editCity('.$row->idCity.','.$row->idCountry.');"> Edit</a>  |
                                                    <a class="Delete fa fa-trash-o" href="javascript:deleteCity('.$row->idCity.');" > Delete</a>
                                                    </tr>';
                                           }}
                                           }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
</div>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div id="bodyModal" class="modal-body">
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
                            <!-- /.modal -->

                            <!-- Modal Add -->
                            <div class="modal fade" id="myModal1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title" id="myModalLabel">Add a new City</h3>
                                        </div>
                                        <div id="bodyModal1" class="modal-body">
                                        <h4>Country</h4>
                                        <select id="Countries" class="combobox form-control" placeholder="ss">
                                        <option value="-1"></option>
                                           <?php
                                              if (isset($countries)){
                                                foreach ($countries as $country => $row) {
                                                 echo '<option value="'.$row->idCountry.'">'.$row->nameCountry.'</option>';
                                                }
                                              }
                                            ?>
                                        </select>
                                        <h4>State</h4>
                                        <select id="states" class="form-control">
                                        <option value="-1"></option>
                                        </select>
                                        <h4>City</h4>
                                        <input id="nameCity" type="text" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div id="butonsModal1" class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button id="addCity" onclick="addCity()"  class="btn btn-success" type="button">Add New</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


