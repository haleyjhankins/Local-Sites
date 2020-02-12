jQuery(document).ready(function() {



  //startScan  start
  jQuery("#startScan").click(function() {
    console.log("startScan");
    jQuery("#startScanProgress").removeClass("hidden-p");
    jQuery.ajax({
      url: planet_zuda_host,
      type: "POST", //send it through get method
      data: {
        instance_id: jQuery("#instance_id").val(),
        subscrid: jQuery("#subscrid").val(),
        action: 'startScan',
        components: jQuery("#components").val()
      },
      success: function(response) {
        //Do Something
        jQuery("#startScanProgress").addClass("hidden-p");
        alert("Scan created. Give us some time to process your request.");
        var scanId = response.scan_id;
        save_scan_id(scanId);
        //save scan_id

      },
      error: function(xhr) {
        alert(xhr.responseJSON.msg);
        console.log("error");
        console.log(xhr.responseJSON.msg);
      }
    });
  }); //startScan  end
});

function save_scan_id(scan_id) {
  jQuery.ajax({
    url: ajax_object.ajax_url,
    type: "POST", //send it through get method
    data: {
      scan_id: scan_id,
      whatever: 1,
      nonce: ajax_object.nonce,
      action: 'save_scan_id'
    },
    success: function(response) {
      //Do Something
      //alert(response);

      console.log("Scan saved.");
      jQuery("#scan_id").val(response.scan_id);
      var table = jQuery('#table_id');

      if (table) {
        console.log(" table");

        location.reload();
      } else {
        console.log("no table");
        load_scan_results(response.scan_id);
      }


    },
    error: function(xhr) {
      //	alert('Sorry error occured');
      console.log("error");
      console.log(xhr);
    }
  });

}

function load_scan_results(scan_id) {
  jQuery.ajax({
    url: planet_zuda_host,
    type: "POST", //send it through get method
    data: {
      instance_id: jQuery("#instance_id").val(),
      subscrid: jQuery("#subscrid").val(),
      scan_id: scan_id,
      action: 'results'
    },
    success: function(response) {
      //Do Something
      //alert(response);
      var vulnsFound = response.vulns;
      var scan_id = response.scan_id;
      var scan_date = response.scan_date;
      if(scan_id!=null && scan_id.length!=0){
        if(vulnsFound == 0){
            jQuery("#noResFound").removeClass("hidden-p");

            jQuery("#noResFoundText").text("Good news, we have found no vulnerable components on your site! Scan date "+scan_date+" (UTC)")
        }else if (vulnsFound>0){
          jQuery("#lightScanResults").removeClass("hidden-p");
          jQuery("#lightScanResultsText").text('We have found ' + vulnsFound + ' vunlerable components on your wordpess isntance');
          jQuery("#lightScanResultsText2").removeClass("hidden-p");
        }else{
          jQuery("#lightScanResults").removeClass("hidden-p");
          jQuery("#lightScanResultsText").text('It looks like you can activate the premium functions now!');
          jQuery("#lightScanResultsText2").addClass("hidden-p");
        }
      }


      //console.log(vulnsFound);

    },
    error: function(xhr) {
      //	alert('Sorry error occured');
      console.log("error");
      console.log(xhr);
    }
  });
}
