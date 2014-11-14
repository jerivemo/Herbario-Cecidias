<section class="content-header">
    <h1>Collections<small>Add New</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row" style="margin-right:0px;margin-left: 0px">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">New Collection</h3>
                                </div><!-- /.box-header -->
                              <div class="box-body">
<div id="rootwizard">
          <div class="navbar">
            <div class="navbar-inner">
              <div class="">
          <ul>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab1" data-toggle="tab">General Information</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab2" data-toggle="tab">Taxonomie</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab3" data-toggle="tab">Location</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab4" data-toggle="tab">Descriptions</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab5" data-toggle="tab">Collecting Information</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab6" data-toggle="tab">Associated organisms</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab7" data-toggle="tab">Images</a></li>
            <li><a style="margin: 8px;border-radius:4px;font-family:monospace;font-weight:bold;padding: 5px;" href="#tab8" data-toggle="tab">Resumen</a></li>
          </ul>
           </div>
            </div>
          </div>
          <div id="bar" class="progress progress-striped active">
            <div class="progress-bar" role="progressbar"
        aria-valuemin="0" aria-valuemax="100"
       style="width: 0%">
          </div>


  </div>
  <hr>

          <div class="tab-content">
              <div class="tab-pane" id="tab1">
                    <form role="form">
                      <!-- text input -->
                      <div class="form-group">
                        <label>*Collection Number</label>
                        <input id="collectionNumber" type="text" class="form-control" placeholder=""/>
                      </div>
                      <div class="form-group">
                        <label>Collection Date</label>
                        <input id="collectionDate" type="text" class="form-control" placeholder=""/>
                      </div>
                      <div class="form-group">
                        <label>Determination Date</label>
                        <input id="determinationDate" type="text" class="form-control" placeholder=""/>
                      </div>
                      <div class="form-group">
                           <label>Samples</label>
                          <div class="checkbox">
                            <label><input id="drySample" type="checkbox"/>  Dry Sample</label>
                          </div>
                          <div class="checkbox">
                            <label><input id="wetSample" type="checkbox"/>  Wet Sample</label>
                          </div>
                       </div>
                    </form>
                    *:<small>Required</small>

              </div>
              <div class="tab-pane" id="tab2">
                      <div class="form-group">
                        <label>*Family</label>
                        <select id="selectFamilies" class="form-control">
                          <?php
                                if (isset($families)){
                                    foreach ($families as $Family => $row) {
                                        echo '<option value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                        }
                                    }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>*Gender</label>
                        <select id="selectGenders" class="form-control"></select>
                      </div>
                      <div class="form-group">
                        <label>*Specie</label>
                        <select id="selectSpecies" class="form-control"></select>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label>*Gall</label>
                        <select id="selectGalls" class="form-control">
                          <?php
                            if (isset($galls)){
                              foreach ($galls as $result => $row) {
                                       echo '<option value='.$row->idGall.">".$row->gallName."</option>";
                                      }
                                    }
                          ?>
                        </select>
                      </div>
                    *:<small>Required</small>
              </div>
              <div class="tab-pane" id="tab3">
                                   <form role="form">
                      <!-- text input -->
                      <div class="form-group">
                        <label>*Country</label>
                        <select id="selectCountries" class="form-control">
                          <?php
                                    if (isset($countries)){
                                        foreach ($countries as $country => $row) {
                                            echo '<option value="'.$row->idCountry.'">'.$row->nameCountry.'</option>';
                                        }
                                    }
                                ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>*State</label>
                        <select id="selectStates" class="form-control"></select>
                      </div>
                      <div class="form-group">
                        <label>*City</label>
                        <select id="selectCities" class="form-control"></select>
                      </div>
                      <div class="form-group">
                        <label>Coordinates</label>
                        <input id="coordinates" type="text" class="form-control" placeholder=""/>
                      </div>
                      <div class="form-group">
                        <label>Altitude<small>(measured in meters)</small></label>
                        <input id="altitude" type="text" step="any" class="form-control" placeholder=""/>
                      </div>
                      <div class="form-group">
                        <label>Location Description (Spanish)</label>
                        <textarea id="locationSpanish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>Location Description (English)</label>
                        <textarea id="locationEnglish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </form>
                    *:<small>Required</small>
              </div>
            <div class="tab-pane" id="tab4">
                      <form role="form">
                      <h4>Host:</h4>
                      <div class="form-group">
                        <label>Spanish Description</label>
                        <textarea id="hostSpanish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>English Description</label>
                        <textarea id="hostEnglish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                      <hr>
                      <h4>Morphotype:</h4>
                      <div class="form-group">
                        <label>Spanish Description</label>
                        <textarea id="morphotypeSpanish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                      <div class="form-group">
                        <label>English Description</label>
                        <textarea id="morphotypeEnglish" class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </form>
              </div>
            <div class="tab-pane" id="tab5">
                <div class="form-group">
                        <label>Classifier</label>
                        <select id="selectClassifiers" class="form-control">
                          <?php
                                if (isset($persons)){
                                    foreach ($persons as $person => $row) {
                                        echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                        }
                                    }
                          ?>
                        </select>
                </div>
                <div class="form-group">
                        <label>Collector</label>
                        <select id="selectCollectors" class="form-control">
                        <?php
                          if (isset($persons)){
                                    foreach ($persons as $person => $row) {
                                        echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                        }
                                    }
                          ?>
                        </select>
                </div>

                <div class="row">
                  <div class="col-md-6">
                      <h3>Companions</h3>
                      <div class="input-group">
                        <select id="selectCompanions" class="form-control">
                         <?php
                            if (isset($persons)){
                                    foreach ($persons as $person => $row) {
                                        echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                        }
                                    }
                          ?>
                        </select>
                        <span class="input-group-btn">
                          <button id="addCompanion" class="btn btn-default" type="button">Add</button>
                        </span>
                    </div><!-- /input-group -->
                    <br>
                    <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading">List of Companions</div>
                          <table id="tableCompanions" class="table">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <h3>Determinators</h3>
                      <div class="input-group">
                        <select id="selectDeterminators" class="form-control">
                          <?php
                           if (isset($persons)){
                                    foreach ($persons as $person => $row) {
                                        echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                        }
                                    }
                          ?>
                        </select>
                        <span class="input-group-btn">
                          <button id="addDeterminator" class="btn btn-default" type="button">Add</button>
                        </span>
                    </div><!-- /input-group -->
                    <br>
                    <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading">List of Determinators</div>
                          <table id="tableDeterminators" class="table">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                      </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane" id="tab6">
                <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Add Organism</h3>
                                </div>
                 <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                        <legend>Taxonomie Information:</legend>
                        <div class="form-group">
                            <label>Order</label>
                            <select id="selectOrgOrders" class="form-control">
                              <?php
                                    if (isset($orders)){
                                        foreach ($orders as $order => $row) {
                                            echo '<option value="'.$row->idOrder.'">'.$row->orderName.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                          </div>
                        <div class="form-group">
                            <label>Family</label>
                            <select id="selectOrgFamilies" class="form-control"></select>
                          </div>
                          <div class="form-group">
                            <label>Gender</label>
                            <select id="selectOrgGenders" class="form-control"></select>
                          </div>
                          <div class="form-group">
                            <label>Specie</label>
                            <select id="selectOrgSpecies" class="form-control"></select>
                          </div>
                          </fieldset>
                    </div>
                    <div class="col-md-6">
                          <div class="form-group">
                                            <fieldset>
                                           <legend>Type:</legend>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsType" id="optionsType1" value="0" checked>
                                                    Inductor
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsType" id="optionsType2" value="1">
                                                    Associate
                                                </label>
                                            </div>
                                              </fieldset>
                          </div>
                          <div class="form-group">
                           <fieldset>
                            <legend>Material Available:</legend>
                              <div class="checkbox">
                                <label><input id="checkboxLarvae" type="checkbox"/>   Larvae</label>
                              </div>
                              <div class="checkbox">
                                <label><input id="checkboxNymphs" type="checkbox"/>   Nymphs</label>
                              </div>
                              <div class="checkbox">
                                <label><input id="checkboxPupae" type="checkbox"/>   Pupae</label>
                              </div>
                              <div class="checkbox">
                                <label><input id="checkboxAdult" type="checkbox"/>   Adult</label>
                              </div>
                              </fieldset>
                          </div>

                      </div>
                  </div>
                  </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <a id="addOrganism" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</a>
                                    </div>
                            </div>


                   <div class="panel panel-default">
                              <div class="panel-heading">List of Organism</div>
                              <table id="tableOrganism" class="table">
                                      <thead>
                                        <tr>
                                          <th>Type</th>
                                          <th>Order</th>
                                          <th>Family</th>
                                          <th>Gender</th>
                                          <th>Specie</th>
                                          <th>Larvae</th>
                                          <th>Nymphs</th>
                                          <th>Pupae</th>
                                          <th>Adult</th>
                                          <th>Actions</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                          </div>

            </div>
            <div class="tab-pane" id="tab7">
              <form  method="post" accept-charset="utf-8" id="upload-file-form" enctype="multipart/form-data">
                <div id="newImage" class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Collection Images</h3>
                  </div>
                  <div class="box-body">
                    <label>Browse a file</label>

                    <input class="btn btn-sm btn-default" type="file" name="upload_file1" id="upload_file1"  readonly="true">
                    <div id="moreImageUpload"></div>
                    <div style="clear:both;"></div>
                    <div id="moreImageUploadLink" style="margin-left: 10px;">
                      <br>
                      <a href="javascript:void(0);" id="attachMore" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Attach another file</a>
                    </div>
                  </div>
                 <!--  <div class="box-footer" style="display: -webkit-box;">
                    <input id="submitImages" class="btn btn-success" type="submit" name="file_upload" value="Upload">
                  </div>
                  -->
                </div>
                </form>
            </div>


            <div class="tab-pane" id="tab8">
                <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-info"></i>
                                    <h3 class="box-title">Collection Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <dl class="dl-horizontal">
                                        <dt>Collection Number</dt>
                                        <dd id="rsCN"></dd>
                                        <dt>Collection Date</dt>
                                        <dd id="rsCD"></dd>
                                        <dt>Determination Date</dt>
                                        <dd id="rsDA"></dd>
                                        <dt>Dry Sample</dt>
                                        <dd id="rsDS"></dd>
                                        <dt>Wet Sample</dt>
                                        <dd id="rsWS" ></dd>
                                        <dt>Gall</dt>
                                        <dd id="rsG"></dd>
                                        <dt>Family</dt>
                                        <dd id="rsF"></dd>
                                        <dt>Gender</dt>
                                        <dd id="rsGD" ></dd>
                                        <dt >Specie</dt>
                                        <dd id="rsS" ></dd>
                                        <dt>Country</dt>
                                        <dd id="rsC"></dd>
                                        <dt>State</dt>
                                        <dd id="rsST"></dd>
                                        <dt>City</dt>
                                        <dd id="rsCT"></dd>
                                        <dt>Coordinates</dt>
                                        <dd id="rsCord"></dd>
                                        <dt>Altitude</dt>
                                        <dd id="rsAT"></dd>
                                        <dt>Location Description (Spanish)</dt>
                                        <dd id="rsLS"></dd>
                                        <dt>Location Description (English)</dt>
                                        <dd id="rsLE"></dd>

                                        <dt>Host Description (Spanish)</dt>
                                        <dd id="rsHS"></dd>
                                        <dt>Host Description (English)</dt>
                                        <dd id="rsHE"></dd>

                                        <dt>Morphotype Description (Spanish)</dt>
                                        <dd id="rsMS"></dd>
                                        <dt>Morphotype Description (English)</dt>
                                        <dd id="rsME"></dd>

                                        <dt>Classifier</dt>
                                        <dd id="rsCF"></dd>
                                        <dt>Collector</dt>
                                        <dd id="rsCL"></dd>
                                        <dt>Companions</dt>
                                        <dd id="rsCP"></dd>
                                        <dt>Determinators</dt>
                                        <dd id="rsDE"></dd>
                                        <dt>Organisms</dt>
                                        <div id="rsOG">
                                              <dd>Type:ssss | Order:wwww | Gender: dfdfd | Pupae: NO | Adult: SI</dd>
                                              <dd id="">Type:ssss | Order:rrrr | Gender: dfffr | Pupae: SI | Adult: NO</dd>
                                        </div>



                                    </dl>
                                </div><!-- /.box-body -->
                            </div>

            </div>
            <ul class="pager wizard">
              <li class="previous first" style="display:none;"><a href="#">First</a></li>
              <li class="previous"><a href="#">Previous</a></li>
              <li class="next last" style="display:none;"><a href="#">Last</a></li>
              <li class="next"><a href="#">Next</a></li>
              <li class="next finish btn-success" style="display:none;"><a class="btn btn-success" href="javascript:createCollection();">Create</a></li>
            </ul>
          </div>
        </div>
    </div>
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
</section><!-- /.content -->

     <!-- Modal -->


