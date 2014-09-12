<div class="row" style="">      <!-- Form Name -->
      <legend> <a href="<?php echo base_url(); ?>index.php/Gall"> Galls</a></legend>

      <div class="panel panel" style="width=100">
                        <div class="panel-heading">

                       <div class="row">
                            
                 
                        <div class="col-md-1"><a href="javascript:showAdd();" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group ">
                              <select id="selectPrincipal" class="combobox form-control">
                                <option></option>
                                <option value="PA">Pennsylvania</option>
                                <option value="CT">Connecticut</option>
                                <option value="NY">New York</option>
                                <option value="MD">Maryland</option>
                                <option value="VA">Virginia</option>
                              </select>
                           </div> 
                          </div> 
                          <div id="divAdd" class="col-md-3">

                             
                            <div class="input-group ">
                               <input id="nameGall" type="text" class="form-control" placeholder="Name" required>
                                     <span class="input-group-btn">
                                      <button id="addGall" onclick="addGall()"  class="btn btn-success" type="button">Add</button>
                                     </span>

                            </div><!-- /input-group -->
                        </div>
                        <div id="alertSuccess" class="col-md-2 alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert">
                          <strong>Successful!</strong> Gall successfully added.
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
                                <table class="table table-striped table-bordered"  id="dataTableGalls">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Name</th>
                                             <th style="width:110px" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           if ($datos!=null){
                                           foreach ($datos as $result => $row) {
                                              
                                              echo '<tr class="even gradeC">';
                                              echo '<td id=td_'.$row->idState.'>' .$row->nameState. '</td>';
                                              echo '<td id='.$row->idState.' ><a id=edit_'.$row->idState.' class="Edit fa fa-edit" href="javascript:editGall('.$row->idState.');"> Edit</a>  |
                                                    <a class="Delete fa fa-trash-o" href="javascript:deleteGall('.$row->idState.');" > Delete</a>
                                                    </tr>';
                                           }
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

                            <!-- Modal -->
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


