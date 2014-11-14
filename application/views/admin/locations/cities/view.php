<section class="content-header">
    <h1>Cities<small>Locations | View</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row" style="margin-right:0px;margin-left: 0px">

      <div class="panel panel" style="width=100">
                       <div class="panel-heading">
                       <div class="row">
                       <div class="col-md-1"><a href="javascript:showAdd();" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                       </div>
                       </div>
                       </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">List of Cities</h3>
                                </div><!-- /.box-header -->
                              <div class="box-body table-responsive" >
                                <table class="table table-striped table-bordered"  id="dataTableCities">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Name</th>
                                            <th>State</th>
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
                                              echo '<td id=tdcnt_'.$row->idCity.'>' .$row->nameCountry. '</td>';
                                              echo '<td id='.$row->idCity.' ><a id=edit_'.$row->idCity.' class="Edit fa fa-edit" href="javascript:editCity('.$row->idCity.','.$row->idState.','.$row->idCountry.');"> Edit</a>  |
                                                    <a class="Delete fa fa-trash-o" href="javascript:deleteCity('.$row->idCity.');" > Delete</a>
                                                    </tr>';
                                           }}
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


                            <!-- Modal Add -->
                            <div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title" id="myModalLabel">Add a new City</h3>
                                        </div>
                                        <div id="bodyModal" class="modal-body">
                                        <h4>Country</h4>
                                        <select id="selectCountries" class="combobox form-control" placeholder="ss">
                                           <?php
                                              if (isset($countries)){
                                                foreach ($countries as $country => $row) {
                                                 echo '<option value="'.$row->idCountry.'">'.$row->nameCountry.'</option>';
                                                }
                                              }
                                            ?>
                                        </select>
                                        <h4>State</h4>
                                        <select id="selectStates" class="form-control">
                                        </select>
                                        <h4>City</h4>
                                        <input id="nameCity" type="text" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div id="alertDanger" class="hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert">
                                        </div>
                                        <div id="alertSuccess" class="alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert">

                                        </div>
                                        <div id="butonsModal" class="modal-footer">
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                            <!-- Modal Edit - Delete -->
                            <div class="modal fade" id="modalOptions" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title" id="modalOptionsTitle"></h3>
                                        </div>
                                        <div id="modalOptionsBody" class="modal-body">
                                        </div>
                                        <div id="modalOptionsButons" class="modal-footer">
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
</section><!-- /.content -->

