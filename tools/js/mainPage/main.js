$(document).ready(function() {
        //$('#dataTableSpecies').dataTable();
        $( "#families" ).change(function() {setGenders()});
        $( "#genders" ).change(function() {setSpecies()});


        $( "#orgOrders" ).change(function() {setOrgFamilies()});
        $( "#orgFamilies" ).change(function() {setOrgGenders()});
        $( "#orgGenders" ).change(function() {setOrgSpecies()});

    });


/**
     * [setGenders Show the availables Species for the Family selected]
     */
    function setGenders(){
      var id = $("#families").val();
      if (id =="na"){
         $('#genders').html('<option value="na">Choose one:</option>');

      }else if (id !=null){
        $('#genders').html('<option>Loading ...</option>');
        $('#genders').attr('disabled', 'disabled');
        var info = {'idFamily':id}
        $.ajax({
            url: site_url+'index.php/gender/getGenders/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    options += '<option value="na">Choose one:</option>';
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idGender+'>'+data[i].genderName+'</option>';
                      }
                      $('#genders').html(options);
                      $('#genders').removeAttr('disabled');

                    }else {
                      $('#genders').html('<option value="na">Choose one:</option>');
                      $('#genders').removeAttr('disabled');
                    }
                  }
                });
      }
    }


    function setSpecies(){
      var id = $("#genders").val();
      if (id =="na"){
         $('#species').html('<option value="na">Choose one:</option>');
      }else if (id !=null){
        $('#species').html('<option>Loading ...</option>');
        $('#species').attr('disabled', 'disabled');
        var info = {'idGender':id}
        $.ajax({
            url: site_url+'index.php/species/getSpecies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    options += '<option value="na">Choose one:</option>';
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idSpecies+'>'+data[i].speciesName+'</option>';
                      }
                      $('#species').html(options);
                      $('#species').removeAttr('disabled');

                    }else {
                      $('#species').html('<option value="na">Choose one:</option>');
                      $('#species').removeAttr('disabled');
                    }
                  }
                });
      }
    }

    function setOrgFamilies(){
      var id = $("#orgOrders").val();
      if (id =="na"){
         $('#orgFamilies').html('<option value="na">Choose one:</option>');
      }else if (id !=null){
        $('#orgFamilies').html('<option>Loading ...</option>');
        $('#orgFamilies').attr('disabled', 'disabled');
        var info = {'idOrder':id}
        $.ajax({
            url: site_url+'index.php/organismfamily/getFamilies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    options +='<option value="na">Choose one:</option>';
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idFamily+'>'+data[i].familyName+'</option>';
                      }
                      $('#orgFamilies').html(options);
                      $('#orgFamilies').removeAttr('disabled');

                    }else {
                      $('#orgFamilies').html('<option value="na">Choose one:</option>');
                      $('#orgFamilies').removeAttr('disabled');

                    }
                  }
                });
      }
    }

        /**
     * [setFamilies Show the availables Families for the Order selected in the addSpecies time ]
     */
    function setOrgGenders(){
      var id = $("#orgFamilies").val();
      if (id =="na"){
         $('#orgGenders').html('<option value="na">Choose one:</option>');
      }else if (id !=null){
        $('#orgGenders').html('<option>Loading ...</option>');
        $('#orgGenders').attr('disabled', 'disabled');
        var info = {'idFamily':id}
        $.ajax({
            url: site_url+'index.php/organismgender/getGenders/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    options +='<option value="na">Choose one:</option>';
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idGender+'>'+data[i].genderName+'</option>';
                      }
                      $('#orgGenders').html(options);
                      $('#orgGenders').removeAttr('disabled');
                      setOrgSpecies();
                    }else {
                      $('#orgGenders').html('<option value="na">Choose one:</option>');
                      $('#orgGenders').removeAttr('disabled');
                    }
                  }
                });
      }
    }


    function setOrgSpecies(){
      var id = $("#orgGenders").val();
      if (id =="na"){
         $('#orgSpecies').html('<option value="na">Choose one:</option>');
      }else if (id !=null){
        $('#orgSpecies').html('<option>Loading ...</option>');
        $('#orgSpecies').attr('disabled', 'disabled');
        var info = {'idGender':id}
        $.ajax({
            url: site_url+'index.php/organismspecies/getSpecies/',
            type:'POST',
            dataType: "json",
            data:info,
            success: function(data){
                    var options ="";
                    options +='<option value="na">Choose one:</option>';
                    if(data!=false){
                      for (var i = 0; i < data.length; i++){
                        options += '<option value='+data[i].idSpecies+'>'+data[i].speciesName+'</option>';
                      }
                      $('#orgSpecies').html(options);
                      $('#orgSpecies').removeAttr('disabled');
                    }else {
                      $('#orgSpecies').html('<option value="na">Choose one:</option>');
                      $('#orgSpecies').removeAttr('disabled');
                    }
                  }
                });
      }
    }