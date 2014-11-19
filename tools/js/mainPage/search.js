function goToCollection(){
  if (isNaN($('#goCollection').val())){

  }else if ($('#goCollection').val() % 1 != 0){

  }else if ( ($('#goCollection').val()>0 ) && ( $('#goCollection').val()<( collections.length+2) ) && ( $('#goCollection').val()-1!=current)){
    current=$('#goCollection').val()-1;
    changeCollection(collections[current].idCollection);
}
}


function goBackCollection(){
  if (current-1>=0){
    current-=1;
    changeCollection(collections[current].idCollection);
}
}


function goNextCollection(){
  if ((current+1)<collections.length){
    current+=1;
    changeCollection(collections[current]['idCollection']);
  }
}

function changeCollection(idCollection){
        var info = {'idCollection':idCollection};
        $.ajax({
            url: site_url+'index.php/main/getCollection/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    if(data!=false){
                      $('#currentResult').html(current+1);
                      $('#family').html(data.collectionInfo.family[0].familyName);
                      $('#gender').html(data.collectionInfo.gender[0].genderName);
                      $('#specie').html(data.collectionInfo.specie[0].speciesName);
                      $('#gallName').html(data.collectionInfo.gall[0].gallName);

                      $('#country').html(data.collectionInfo.country[0].nameCountry);
                      $('#state').html(data.collectionInfo.state[0].nameState);
                      $('#city').html(data.collectionInfo.city[0].nameCity);


                      if (data.collectionInfo.classifier==false){
                        $('#classifier').html("");
                      }else {
                        $('#classifier').html(data.collectionInfo.classifier[0].personName);
                      }

                      if (data.collectionInfo.collector==false){
                        $('#collector').html("");
                      }else {
                        $('#collector').html(data.collectionInfo.collector[0].personName);
                      }



                      $('#collectionNumber').html(data.collectionInfo.collection[0].collectionNumber);
                      $('#colectDate').html(data.collectionInfo.collection[0].collectiondateDate);
                      $('#determinationDate').html(data.collectionInfo.collection[0].determinationDate);

                      $('#coordinates').html(data.collectionInfo.collection[0].coordinates);
                      $('#altitude').html(data.collectionInfo.collection[0].altitude);
                      $('#hostDescription').html(data.collectionInfo.collection[0].hostDescriptionEnglish);
                      $('#locationDescription').html(data.collectionInfo.collection[0].locationDescriptionEnglish);
                      $('#morphotypeDescription').html(data.collectionInfo.collection[0].morphotypeDescriptionEnglish);

                      if (data.collectionInfo.companions==false){
                        $('#companions').html('<dd style="text-align: left;"></dd>');
                      }else {
                        var comp = "";
                        for (var i = 0; i < data.collectionInfo.companions.length; i++) {
                          comp+='<dd style="text-align: left;">'+data.collectionInfo.companions[i].personName+'</dd>';
                        }
                        $('#companions').html(comp);
                      }

                      if (data.collectionInfo.determinators==false){
                        $('#determinators').html('<dd style="text-align: left;"></dd>');
                      }else {
                        var det = "";
                        for (var i = 0; i < data.collectionInfo.determinators.length; i++) {
                          det+='<dd style="text-align: left;">'+data.collectionInfo.determinators[i].personName+'</dd>';
                        }
                        $('#determinators').html(det);
                      }

                      if (data.collectionInfo.images==false){

                        var img = '<div id="coin-slider"><img src="'+site_url+'tools/img/no_disponible.jpg"></div>';

                        $('#imagesContainer').html(img);
                        $('#coin-slider').coinslider({ width:500,height:395,effect: 'straight',navigation:true});
                      }else {
                        var img2 = '<div id="coin-slider">';
                        for (var i = 0; i < data.collectionInfo.images.length; i++) {
                          img2+='<a href="'+site_url+'images/'+data.collectionInfo.images[i].name+'">';
                          img2+='<img src="'+site_url+'images/'+data.collectionInfo.images[i].name+'">';
                          img2+='</a>';
                        }
                        img2+='</div>';
                        $('#imagesContainer').html(img2);
                        $('#coin-slider').coinslider({ width:500,height:430,effect: 'straight',navigation:true});
                      }

                      if (data.collectionInfo.organisms==false){
                        $('#listOrganism').html('<h5>Not organisms Associated</h5>');
                      }else {
                        var org = "";
                        for (var i = 0; i < data.collectionInfo.organisms.length; i++) {
                          org+='<div class="row" style="border: 3px;border-style: groove;border-color: #fff;margin-bottom: 15px;"><div class=" col-md-6"><br>';
                        if (data.collectionInfo.organisms[i].organismType=="0") {
                            org+='<h5>Insect Inductor</h5>';
                        }else {
                            org+='<h5>Insect Associate</h5>';
                        }
                        org+='<hr><dl class="dl-horizontal">';
                        org+='<dt>Order</dt><dd style="text-align: left;" >'+data.collectionInfo.organisms[i].orderName+'</dd>';
                        org+='<dt>Family</dt><dd style="text-align: left;" >'+data.collectionInfo.organisms[i].familyName+'</dd>';
                        org+='<dt>Gender</dt><dd style="text-align: left;" >'+data.collectionInfo.organisms[i].genderName+'</dd>';
                        org+='<dt>Specie</dt><dd style="text-align: left;" >'+data.collectionInfo.organisms[i].speciesName+'</dd>';
                        org+='</dl></div><div class=" col-md-6"><br><h5>Material Available</h5><hr><dl class="dl-horizontal">';
                        org+='<dt>Larvae</dt>';
                        if (data.collectionInfo.organisms[i].larvae=="0") {
                            org+='<dd style="text-align: left;" >NO</dd>';
                        }else {
                            org+='<dd style="text-align: left;" >YES</dd>';
                        }
                        org+='<dt>Nymphs</dt>';
                        if (data.collectionInfo.organisms[i].nymphs=="0") {
                            org+='<dd style="text-align: left;" >NO</dd>';
                        }else {
                            org+='<dd style="text-align: left;" >YES</dd>';
                        }
                        org+='<dt>Pupae</dt>';
                        if (data.collectionInfo.organisms[i].pupae=="0") {
                            org+='<dd style="text-align: left;" >NO</dd>';
                        }else {
                            org+='<dd style="text-align: left;" >YES</dd>';
                        }
                        org+='<dt>Adult</dt>';
                        if (data.collectionInfo.organisms[i].adult=="0") {
                            org+='<dd style="text-align: left;" >NO</dd>';
                        }else {
                            org+='<dd style="text-align: left;" >YES</dd>';
                        }
                        org+='</dl></div></div>';


                        }
                        $('#listOrganism').html(org);
                      }

                      var mapProp = {center:new google.maps.LatLng(data.collectionInfo.coordinates.latitud,data.collectionInfo.coordinates.longitud),zoom:10,mapTypeId:google.maps.MapTypeId.HYBRID};

                      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                      var myLatlng = new google.maps.LatLng(data.collectionInfo.coordinates.latitud,data.collectionInfo.coordinates.longitud );
                      var marker = new google.maps.Marker({position: myLatlng,map: map,title: ""});




                    }else {

                    }
                  }
                });
      }
