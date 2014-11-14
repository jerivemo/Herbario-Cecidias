<section class="content-header">
    <h1>Genders<small>Plants | View</small></h1>
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
                        <div id="divAdd">
                        <div class="col-md-2">
                            <div class="input-group ">
                              <select id="selectFamilies" class="combobox form-control" placeholder="ss">
                                <option></option>
                                <?php
                                    if (isset($families)){
                                        foreach ($families as $Family => $row) {
                                            echo '<option value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                        }
                                    }
                                ?>
                              </select>
                           </div>
                          </div>
                          <div class="col-md-3">


                            <div class="input-group ">
                               <input id="nameGender" type="text" class="form-control" placeholder="Name" required>
                                     <span class="input-group-btn">
                                      <button id="addGender" onclick="addGender()"  class="btn btn-success" type="button">Add</button>
                                     </span>

                            </div><!-- /input-group -->
                        </div>
                        </div>
                        <div id="alertSuccess" class="col-md-2 alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert">
                          <strong>Successful!</strong> Gender successfully added.
                        </div>

                        <div id="alertDanger" class="col-md-3 hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert">
                          <strong>Error!</strong> Already exists a entry with this name.
                        </div>
                       </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">List of Genders</h3>
                                </div><!-- /.box-header -->
                            <div class="box-body table-responsive" >
                                <table class="table table-striped table-bordered"  id="dataTableGenders">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>Name</th>
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
                                              echo '<td id=td_'.$row->idGender.'>' .$row->genderName. '</td>';
                                              echo '<td id=tdc_'.$row->idGender.'>' .$row->familyName. '</td>';
                                              echo '<td id='.$row->idGender.' ><a id=edit_'.$row->idGender.' class="Edit fa fa-edit" href="javascript:editGender('.$row->idGender.','.$row->idFamily.');"> Edit</a>  |
                                                    <a class="Delete fa fa-trash-o" href="javascript:deleteGender('.$row->idGender.');" > Delete</a>
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
</section><!-- /.content -->


