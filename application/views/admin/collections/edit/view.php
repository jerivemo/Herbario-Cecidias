<section class="content-header">
    <h1>Collections<small>Edit</small></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" style="margin-right:0px;margin-left: 0px">
        <div class="box box-solid ">
            <div class="box-header">
                <i class="fa fa-info-circle"></i>
                <h3 id="tittleCollection" class="box-title">Collection <?php echo $collection[0]->collectionNumber;?></h3>
                    <a href="javascript:deleteCollection(<?php echo $collection[0]->idCollection;?>);" style="float:right;margin-top:9px;margin-right:9px;color:#FFF;" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>

            </div><!-- /.box-header -->
            <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Information</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Companions</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Determinators</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Organisms</a></li>
                                    <li><a href="#tab_5" data-toggle="tab">Images</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                        <div class="box-header">
                                                            <h3 class="box-title">General</h3>
                                                        </div>
                                                        <div class="box-body">
                                                        <div id="divCN" class="form-group">
                                                        <label>*Collection Number</label>
                                                        <input id="collectionNumber" type="text" class="form-control" placeholder="" value="<?php echo $collection[0]->collectionNumber;?>" />
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Collection Date</label>
                                                        <input id="collectionDate" type="text" class="form-control" placeholder="" value="<?php echo $collection[0]->collectiondateDate;?>" />
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Determination Date</label>
                                                        <input id="determinationDate" type="text" class="form-control" placeholder="" value="<?php echo $collection[0]->determinationDate;?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Classifier</label>
                                                            <select id="selectClassifiers" class="form-control">
                                                              <?php
                                                                    if (isset($persons)){
                                                                        foreach ($persons as $person => $row) {
                                                                            if ($row->idPerson==$classifier[0]->idPerson)
                                                                            {
                                                                                echo '<option selected value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }else {
                                                                                echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }
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
                                                                            if ($row->idPerson==$collector[0]->idPerson)
                                                                            {
                                                                                echo '<option selected value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }else {
                                                                                echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }
                                                                            }
                                                                        }
                                                              ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Samples</label>
                                                            <div class="checkbox">
                                                                <label><input id="drySample" type="checkbox"
                                                                    <?php if($collection[0]->drySample=="1"){
                                                                        echo "checked";
                                                                        }?> />  Dry Sample</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input id="wetSample" type="checkbox"
                                                                <?php if($collection[0]->wetSample=="1"){
                                                                        echo "checked";
                                                                        }?> />  Wet Sample</label>
                                                            </div>
                                                        </div>
                                                       </div>
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Descriptions</h3>
                                                        </div>
                                                        <div class="box-body">
                                                        <h4>Host:</h4>
                                                        <div class="form-group">
                                                            <label>Spanish Description</label>
                                                            <textarea id="hostSpanish" class="form-control" rows="3" placeholder=""><?php echo $collection[0]->hostDescriptionSpanish;?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>English Description</label>
                                                            <textarea id="hostEnglish" class="form-control" rows="3" placeholder=""> <?php echo $collection[0]->hostDescriptionEnglish;?> </textarea>
                                                        </div>
                                                        <hr>
                                                        <h4>Morphotype:</h4>
                                                        <div class="form-group">
                                                            <label>Spanish Description</label>
                                                            <textarea id="morphotypeSpanish" class="form-control" rows="3" placeholder=""> <?php echo $collection[0]->morphotypeDescriptionSpanish;?> </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>English Description</label>
                                                            <textarea id="morphotypeEnglish" class="form-control" rows="3" placeholder=""> <?php echo $collection[0]->morphotypeDescriptionEnglish;?> </textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Taxonomie</h3>
                                                        </div>
                                                        <div class="box-body">
                                                        <div id="divF" class="form-group">
                                                            <label>*Family</label>
                                                            <select id="selectFamilies" class="form-control">
                                                                  <?php
                                                                        if (isset($families)){
                                                                            foreach ($families as $Family => $row) {
                                                                                if($idGenderFamily[0]->idFamily==$row->idFamily)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idFamily.'">'.$row->familyName.'</option>';
                                                                                }
                                                                                }
                                                                            }
                                                                  ?>
                                                            </select>
                                                        </div>
                                                        <div id="divG" class="form-group">
                                                            <label>*Gender</label>
                                                            <select id="selectGenders" class="form-control">
                                                                <?php
                                                                        if (isset($genders)){
                                                                            foreach ($genders as $gender => $row) {
                                                                                if($idGenderFamily[0]->idGender==$row->idGender)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idGender.'">'.$row->genderName.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idGender.'">'.$row->genderName.'</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div id="divS" class="form-group">
                                                            <label>*Specie</label>
                                                            <select id="selectSpecies" class="form-control">
                                                                    <?php
                                                                        if (isset($species)){
                                                                            foreach ($species as $specie => $row) {
                                                                                if($collection[0]->idSpecies==$row->idSpecies)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idSpecies.'">'.$row->speciesName.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idSpecies.'">'.$row->speciesName.'</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <hr>
                                                        <div id="divGA" class="form-group">
                                                            <label>*Gall</label>
                                                            <select id="selectGalls" class="form-control">
                                                              <?php
                                                                if (isset($galls)){
                                                                  foreach ($galls as $result => $row) {
                                                                           if($collection[0]->idGall==$row->idGall)
                                                                           {
                                                                                echo '<option selected value='.$row->idGall.">".$row->gallName."</option>";
                                                                           }else{
                                                                                echo '<option value='.$row->idGall.">".$row->gallName."</option>";
                                                                           }

                                                                          }
                                                                        }
                                                              ?>
                                                            </select>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="box box-success">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Location</h3>
                                                        </div>
                                                        <div class="box-body">
                                                        <div id="divC" class="form-group">
                                                            <label>*Country</label>
                                                            <select id="selectCountries" class="form-control">
                                                              <?php
                                                                        if (isset($countries)){
                                                                            foreach ($countries as $country => $row) {
                                                                                if($idStateCountry[0]->idCountry==$row->idCountry)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idCountry.'">'.$row->nameCountry.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idCountry.'">'.$row->nameCountry.'</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div id="divST" class="form-group">
                                                            <label>*State</label>
                                                            <select id="selectStates" class="form-control">
                                                                <?php
                                                                        if (isset($states)){
                                                                            foreach ($states as $state => $row) {
                                                                                if($idStateCountry[0]->idState==$row->idState)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idState.'">'.$row->nameState.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idState.'">'.$row->nameState.'</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div id="divCT" class="form-group">
                                                            <label>*City</label>
                                                            <select id="selectCities" class="form-control">
                                                                <?php
                                                                        if (isset($cities)){
                                                                            foreach ($cities as $city => $row) {
                                                                                if($collection[0]->idCity==$row->idCity)
                                                                                {
                                                                                    echo '<option selected value="'.$row->idCity.'">'.$row->nameCity.'</option>';
                                                                                }else{
                                                                                    echo '<option value="'.$row->idCity.'">'.$row->nameCity.'</option>';
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Coordinates</label>
                                                            <input id="coordinates" type="text" class="form-control" placeholder="" value="<?php echo $collection[0]->coordinates;?>" />
                                                        </div>
                                                        <div id="divAT" class="form-group">
                                                            <label>Altitude<small>(measured in meters)</small></label>
                                                            <input id="altitude" type="text" step="any" class="form-control" placeholder="" value="<?php echo $collection[0]->altitude;?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Description (Spanish)</label>
                                                            <textarea id="locationSpanish" class="form-control" rows="3" placeholder=""> <?php echo $collection[0]->locationDescriptionSpanish;?> </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Description (English)</label>
                                                            <textarea id="locationEnglish" class="form-control" rows="3" placeholder=""> <?php echo $collection[0]->locationDescriptionEnglish;?> </textarea>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <div class="box-footer" style="display: -webkit-box;">
                                                <a id="updateCollection" href="javascript:UpdateCollection();" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-edit"></span> Update</a>
                                                <div id="circularG" class="hide circularGp" >
                                                    <div id="circularG_1" class="circularG">
                                                    </div>
                                                    <div id="circularG_2" class="circularG">
                                                    </div>
                                                    <div id="circularG_3" class="circularG">
                                                    </div>
                                                    <div id="circularG_4" class="circularG">
                                                    </div>
                                                    <div id="circularG_5" class="circularG">
                                                    </div>
                                                    <div id="circularG_6" class="circularG">
                                                    </div>
                                                    <div id="circularG_7" class="circularG">
                                                    </div>
                                                    <div id="circularG_8" class="circularG">
                                                    </div>
                                                </div>
                                                <div id="alertSuccess" class="col-md-2 alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert"><strong>Successful!</strong>Collection successfully Edited.</div>
                                                <div id="alertDanger" class="col-md-3 hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"><strong>Error!</strong>Already exists a entry with this name.</div>
                                            </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="row">
                                            <div class="col-md-6">

                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <h3 class="box-title">Companions</h3>
                                                </div>
                                                <div class="box-body">
                                                <div class="input-group">
                                                    <select id="selectCompanions" class="form-control">
                                                    <?php
                                                        if (isset($personsNoCompanions)){
                                                                        foreach ($personsNoCompanions as $person => $row) {
                                                                            echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }
                                                                        }
                                                    ?>
                                                    </select>
                                                    <span class="input-group-btn">
                                                      <button id="addCompanion" class="btn btn-success" type="button">Add</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                                <br>
                                                <div class="input-group">
                                                <div id="alertCompanionSuccess" class=" hide alert  alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert"><strong>Successful!</strong> Companion successfully added.</div>
                                                <div id="alertCompanionDanger" class="alert hide alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"><strong>Error!</strong> Problems adding the companion.</div>
                                                </div>
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
                                                            <?php
                                                                if (isset($companions)){
                                                                    if ($companions!=false){
                                                                    foreach ($companions as $companion => $row) {
                                                                        echo '<tr id="'.$row->idPerson.'"><td>'.$row->personName.'</td><td><a class="Delete fa fa-trash-o btn btn-danger deleteCompanion"> Remove</a></td> </tr>';
                                                                    }
                                                                    }
                                                                }
                                                            ?>
                                                            </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                            </div>
                                            </div>
                                      </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <h3 class="box-title">Determinators</h3>
                                                </div>
                                                <div class="box-body">
                                                <div class="input-group">
                                                <select id="selectDeterminators" class="form-control">
                                                <?php
                                                        if (isset($personsNoDeterminators)){
                                                                        foreach ($personsNoDeterminators as $person => $row) {
                                                                            echo '<option value="'.$row->idPerson.'">'.$row->personName.'</option>';
                                                                            }
                                                                        }
                                                    ?>
                                                </select>
                                                <span class="input-group-btn">
                                                  <button id="addDeterminator" class="btn btn-success" type="button">Add</button>
                                                </span>
                                                </div><!-- /input-group -->
                                                <br>
                                                <div class="input-group">
                                                <div id="alertDeterminatorSuccess" class=" hide alert  alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert"><strong>Successful!</strong> Determinator successfully added.</div>
                                                <div id="alertDeterminatorDanger" class="alert hide alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"><strong>Error!</strong> Problems adding the Determinator.</div>
                                                </div>
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
                                                            <?php
                                                                if (isset($determinators)){
                                                                    if ($determinators!=false){
                                                                    foreach ($determinators as $determinator => $row) {
                                                                        echo '<tr id="'.$row->idPerson.'"><td>'.$row->personName.'</td><td><a class="Delete fa fa-trash-o btn btn-danger deleteDeterminator"> Remove</a></td> </tr>';
                                                                    }
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                              </div>
                                              </div>
                                            </div>

                                            </div>
                                        </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">
                                    <a href="javascript:showAdd();" class="btn btn-primary"><span class="fa fa-bug"></span> New Organism</a>
                                    <br>
                                    <br>
                                    <div id="newOrganism" class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Organism Information</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">

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
                                                </div><!-- /.col-md-6-->
                                                <div class="col-md-6">
                                                    <fieldset><legend>Type:</legend></fieldset>
                                                    <div class="form-group">
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
                                                    </div>
                                                    <fieldset><legend>Material Available:</legend></fieldset>
                                                    <div class="form-group">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer" style="display: -webkit-box;">
                                            <a id="addOrganism" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</a>
                                            <div id="circularG2" class="hide circularGp">
                                                    <div id="circularG_1" class="circularG">
                                                    </div>
                                                    <div id="circularG_2" class="circularG">
                                                    </div>
                                                    <div id="circularG_3" class="circularG">
                                                    </div>
                                                    <div id="circularG_4" class="circularG">
                                                    </div>
                                                    <div id="circularG_5" class="circularG">
                                                    </div>
                                                    <div id="circularG_6" class="circularG">
                                                    </div>
                                                    <div id="circularG_7" class="circularG">
                                                    </div>
                                                    <div id="circularG_8" class="circularG">
                                                    </div>
                                                </div>
                                                <div id="alertOrganismSuccess" class="col-md-2 alert hide alert-success alert-dismissible" style="padding: 6px; margin-bottom: 0px;" role="alert"><strong>Successful!</strong>Organism successfully Added.</div>
                                                <div id="alertOrganismDanger" class="col-md-3 hide alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"><strong>Error!</strong>Problem adding the Organism.</div>
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
                                            <?php
                                                if (isset($organisms)){
                                                    if ($organisms!=false){
                                                        foreach ($organisms as $organism => $row) {
                                                            $var = '<tr id="'.$row->idOrganism.'">';
                                                            if ($row->organismType=="0") {
                                                                $var=$var.'<td>Inductor</td>';
                                                            }else {
                                                                $var=$var.'<td>Associate</td>';
                                                            }
                                                            $var=$var.'<td>'.$row->orderName.'</td>';
                                                            $var=$var.'<td>'.$row->familyName.'</td>';
                                                            $var=$var.'<td>'.$row->genderName.'</td>';
                                                            $var=$var.'<td>'.$row->speciesName.'</td>';

                                                            if ($row->larvae=="0") {
                                                                $var=$var.'<td>No</td>';
                                                            }else {
                                                                $var=$var.'<td>Si</td>';
                                                            }
                                                            if ($row->nymphs=="0") {
                                                                $var=$var.'<td>No</td>';
                                                            }else {
                                                                $var=$var.'<td>Si</td>';
                                                            }
                                                            if ($row->pupae=="0") {
                                                                $var=$var.'<td>No</td>';
                                                            }else {
                                                                $var=$var.'<td>Si</td>';
                                                            }
                                                            if ($row->adult=="0") {
                                                                $var=$var.'<td>No</td>';
                                                            }else {
                                                                $var=$var.'<td>Si</td>';
                                                            }
                                                            $var=$var.'<td><a class="Delete fa fa-trash-o btn btn-danger deleteOrganism"> Remove</a></td> </tr>';
                                                            //$var = 'casas';
                                                            echo $var;

                                                        }
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_5">
                                        <a href="javascript:showAddImage();" class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span> New Image</a>
                                        <br>
                                        <br>
                                        <div id="newImage" class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Upload Images</h3>
                                            </div>
                                            <div class="box-body">
                                                <label>Browse a file</label>
                                                     <form  method="post" accept-charset="utf-8" id="upload-file-form" enctype="multipart/form-data">
                                                    <input class="btn btn-sm btn-default" type="file" name="upload_file1" id="upload_file1"  readonly="true">


                                                <div id="moreImageUpload"></div>
                                                <div style="clear:both;"></div>
                                                <div id="moreImageUploadLink" style="margin-left: 10px;">
                                                <br>
                                                    <a href="javascript:void(0);" id="attachMore" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Attach another file</a>
                                                </div>
                                            </div>
                                            <div class="box-footer" style="display: -webkit-box;">
                                                <input id="submitImages" class="btn btn-success" type="submit" name="file_upload" value="Upload">
                                                </form>
                                            </div>
                                        </div>



                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">List of Collection Images</h3>
                                        </div>
                                        <div class="box-body">
                                        <div id="imagesCollection" class="row" style="margin-right:0px;margin-left:0px;">
                                        <?php
                                                if (isset($images)){
                                                    if ($images!=false){
                                                        foreach ($images as $image => $row) {
                                                            $var = '<div  class="col-xs-3 col-md-2" style="border: 1px solid #ddd;border-radius:5px;margin: 6px;padding: 3px;"><a class="thumbnail" style="padding:0px;margin-bottom:2px;border: 0px;"><img data-src="holder.js/100%x180" alt="100%x180" src="'.base_url().'/images/'.$row->name.'" style="height: 180px; width: 100%; display: block;"><div class="caption" style="text-align: center;"><small>'.$row->name.'</small><a id="btnImage_'.$row->idImage.'"href="javascript:deleteImage('.$row->idImage.',\''.$row->name.'\');" class="btn btn-danger imgCollection" role="button" >Remove</a></div></a></div>';
                                                            echo $var;

                                                        }
                                                    }
                                                }
                                            ?>
                                  </div>
                             </div><!-- /.box-body -->
                            </div>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
            </div>
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
</section>

