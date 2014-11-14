<section class="content-header">
    <h1>Species<small>Plant | View</small></h1>
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
                                    <h3 class="box-title">List of Species</h3>
                                </div><!-- /.box-header -->
                            <div class="box-body table-responsive" >
                                <table class="table table-striped table-bordered"  id="dataTableSpecies">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Family</th>
                                            <th style="width:110px" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           if (isset($datos)){
                                           if ($datos !=""){
                                           foreach ($datos as $result => $row) {
                                              echo '<tr class="even gradeC">';
                                              echo '<td id=td_'.$row->idSpecies.'>' .$row->speciesName. '</td>';
                                              echo '<td id=tdc_'.$row->idSpecies.'>' .$row->genderName. '</td>';
                                              echo '<td id=tdcnt_'.$row->idSpecies.'>' .$row->familyName. '</td>';
                                              echo '<td id='.$row->idSpecies.' ><a id=edit_'.$row->idSpecies.' class="Edit fa fa-edit" href="javascript:editSpecies('.$row->idSpecies.','.$row->idGender.','.$row->idFamily.');"> Edit</a>  |
                                                    <a class="Delete fa fa-trash-o" href="javascript:deleteSpecies('.$row->idSpecies.');" > Delete</a>
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
                                            <h3 class="modal-title" id="myModalLabel">Add a new Species</h3>
                                        </div>
                                        <div id="bodyModal" class="modal-body">
                                        <h4>Family</h4>
                                        <select id="selectFamilies" class="combobox form-control" placeholder="ss">
                                           <?php
                                              if (isset($families)){
                                                foreach ($families as $family => $row) {
                                                 echo '<option value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                                }
                                              }
                                            ?>
                                        </select>
                                        <h4>Gender</h4>
                                        <select id="selectGenders" class="form-control">
                                        </select>
                                        <h4>Species</h4>
                                        <input id="nameSpecies" type="text" class="form-control" placeholder="Name" required>
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



