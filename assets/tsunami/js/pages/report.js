$(function () {
        
    //Right Menu
    $("a.reports").addClass('active');

    //Initialize Select2 Elements
    $('.select2').select2()

    //Date range picker
    $('#reservation').daterangepicker();
});

/* Load list of devices according to device type */
$('#select-type').on('select2:select', function (e) {
  
    var optionSelected = $("option:selected", this);
    var value= this.value;

    if ( value == "" ) {
      $('#select-device').prop('disabled', true);
      $("#select-device").val('').trigger('change')
    }else{
      $('#select-device').prop('disabled', false);
    }

    if ( value == 'm-series' ) {

      var customerid = $("#select2-customer-email").val();
      var url  = (customerid == "")?"api/v1/devices/m":"api/v1/devices/m/" + customerid;

      console.log("url: " + url);

      $("#select-device").select2({
          ajax: { 
          url: url,
          type: "get",
          dataType: 'json',
          processResults: function (response) {
            var parsed = [];
            console.log(response);
            $.each(response.data, function(i, items){
                parsed.push( {
                    "id": i+1,
                    "text": items.deviceid + " - " + items.devicename
                });
            } );
            console.log(parsed);
          return {
              results: parsed
          };
        },
        cache: true
        }
       });
    } else if ( value == 's-series' ) {

      var customerid = $("#select2-customer-email").val();
      var url  = (customerid == "")?"api/v1/devices/s":"api/v1/devices/s/" + customerid;

      console.log("url: " + url);
        $("#select-device").select2({
          ajax: { 
           url: url,
           type: "get",
           dataType: 'json',
           processResults: function (response) {
            var parsed = [];
            console.log(response);
            $.each(response.data, function(i, items){
                parsed.push( {
                    "id": i+1,
                    "text": items.projectid + " - " + items.displayname
                });
            } );
            console.log(parsed);
           return {
              results: parsed
           };
         },
         cache: true
          }
         }); //end select2
    } // end if 
}); // end on change


$(document).ready(function() {

  /* fullfil user list */
  $('#select-device').prop('disabled', true);

  $.ajax({
    type: "GET",
    url: 'api/v1/users',
    dataType: 'json',
    success: function(response){
      console.log(response.data);
      var opt ="<option value='' selected='selected'></option>"; // Create Element
      $.each(response.data,function(key,val){ // วน Loop array json
          opt+="<option value='"+val['customerid']+"'>"+val['firstname']+ " " + val['firstname']+" - " + val['email'] + "</option>"; // เพิ่ม Option เข้าไปในตัวแปร
      });
      $("#select2-customer-email").html(opt);
    }
  }); // end set prop
}); // end document ready

$("#search_btn").click(function(){
  var deviceStr = $("#select2-select-device-container").text().split(" ");
  var deviceid = deviceStr[0];

  // change format date
  // TODO: find the better way to do this.
  var date = $("#reservation").val();
  var date2 =  date.split("-");
  var fromArr = date2[0].trim().split("/");
  var from = fromArr[2]+"-"+fromArr[0]+"-"+fromArr[1];
  var toArr = date2[1].trim().split("/");
  var to = toArr[2]+"-"+toArr[0]+"-"+toArr[1];

  console.log(date);
  console.log(date2, from, to);

  if( $("#select-type").val() == 's-series' ) {
    
    $("#s_device_table").show();
    $("#m_device_table").hide();
    $('#s_device_table').DataTable().clear().destroy();

    var m_device_table = $('#s_device_table').DataTable({
      ajax: {
          url: "api/v1/reports/s",
          type: "POST",
          data: function ( d ) {
            return JSON.stringify({
              deviceid: deviceid,
              from: from,
              to: to });
            }
      },
      "columns": [
        { "data": "id" },
        { "data": "projectid" },
        { "data": "powergenerated" },
        { "data": "powerconsumed" },
        { "data": "timestamp" },
        { "data": "createdat" }
      ],
      "dom": 'Bfrtip',
      "buttons": [
        {
          extend: 'excelHtml5',
          text:      'Excel',
          className : 'custom-btn',
          filename: function(){
            var d = new Date();
            var n = d.getTime();
            return 'device_mseires' + n;
            },
            attr:  {
                title: 'Excel',
                id: 'excelbutton'
            },
          exportOptions: {
            modifier: {
              page: 'all'
            }
          }
        }, 
        {
            text: 'PDF', 
            className : 'custom-btn-pdf',
            extend: 'pdfHtml5',
            filename: 'dt_custom_pdf',
            attr:  {
                title: 'Pdf',
                id: 'pdfbutton'
            },
         
        }]
      // 'scrollX': true,
      // 'paging'      : true,
      // 'lengthChange': true,
      // 'searching'   : true,
      // 'ordering'    : true,
      // 'info'        : true,
      // 'autoWidth'   : false,
    });
  }else if( $("#select-type").val() == 'm-series' ) {

    $("#s_device_table").hide();
    $("#m_device_table").show();
    $('#m_device_table').DataTable().clear().destroy();

    var m_device_table = $('#m_device_table').DataTable({
      ajax: {
          url: "api/v1/reports/m",
          type: "POST",
          data: function ( d ) {
            return JSON.stringify({
              deviceid: deviceid,
              from: from,
              to: to });
            }
      },
      // "columnDefs": [
      //     {
      //         "targets": [ 5,6,7,8,9 ],
      //         "visible": false,
      //         "searchable": false,
      //         "data": null,
      //         "defaultContent": "<button>Click!</button>"
      //     }
      // ],
      // Example 
      // "id": 107545,
      //         "deviceid": "BBBBBBBBBBBB",
      //         "ownerid": 2106,
      //         "current": 0,
      //         "power": 316.4925,
      //         "voltage": 0,
      //         "phaseshift": 0,
      //         "status": 1,
      //         "timestamp": "2018-01-01 00:00:00.000",
      //         "createdat": "2019-04-21 19:22:57.710"
      "columns": [
          { "data": "id" },
          { "data": "deviceid" },
          { "data": "current" },
          { "data": "power" },
          { "data": "voltage" },
          { "data": "phaseshift" },
          { "data": "status" },
          { "data": "timestamp" },
          { "data": "createdat" }
      ],
      "dom": 'Bfrtip',
      "buttons": [
        {
          extend: 'excelHtml5',
          text:      'Excel',
          className : 'custom-btn',
          filename: function(){
            var d = new Date();
            var n = d.getTime();
            return 'device_mseires' + n;
            },
            attr:  {
                title: 'Excel',
                id: 'excelbutton'
            },
          exportOptions: {
            modifier: {
              page: 'all'
            }
          }
        }, 
      
        {
            text: 'PDF', 
            className : 'custom-btn-pdf',
            extend: 'pdfHtml5',
            filename: 'dt_custom_pdf',
            attr:  {
                title: 'Pdf',
                id: 'pdfbutton'
            },
         
        }]
      // 'scrollX': true,
      // 'paging'      : true,
      // 'lengthChange': true,
      // 'searching'   : true,
      // 'ordering'    : true,
      // 'info'        : true,
      // 'autoWidth'   : false,
    });
  } // end if
  
  document.getElementById("search_btn").disabled = true;
  $("#datatable-graph-card").removeClass("invisible");
  document.getElementById("search_btn").disabled = false;

}); //end click button