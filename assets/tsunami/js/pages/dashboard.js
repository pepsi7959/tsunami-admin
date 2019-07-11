$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');
    
    $('.select2').select2()

});
function getShootingIP(){
    return IP_SHOOTING = $('#ipshooting').val();
}
$(document).ready(function() {
    //Total M-devices
    //console.log("amazon"+$('#ipshooting').val());

   
    //  $('#data-load').val($.cookie('tokenfield'));
    $('#data-load').val('');
   
  
  var stop_load = false;
  $("#load-btn").attr("onclick", "").click(function () {
        start_service();
        if (this.value == "Start Load Test") {
            
            $(this).prop('value', 'Stop Load Test'); 
        if($(this).hasClass("btn-success")){
            
                $("#load-btn").removeClass("btn-success");
                $(this).addClass("btn-danger");  
        }
                
        }else if (this.value == "Stop Load Test") {
        
            $(this).prop('value', 'Start Load Test');
            if($(this).hasClass("btn-danger")){
                $("#load-btn").removeClass("btn-danger");         
                $(this).addClass("btn-success");   
            }   
            stop_service();
        
        }
    
    });

});


function ajaxd(param_metric){
   
    if(stop_load){
        console.log('ajaxd');
        console.log(param_metric);
        $.ajax({
            type: "GET",
            url: param_metric,
            dataType: 'json',
            crossOrigin: true,
            success: function(result) {
                rps = result.data.rps;
                numload = parseFloat(rps).toFixed(2);
                console.log(numload);
                $('#speedtest').text(numload);
                test_load();
               
            }
    
        });
        // var numload = Math.floor((Math.random() * 1000) + 1);
        // $('#speedtest').text(numload);
        // console.log(numload);
        // test_load();
    }
}
function stop_service(){
    var IP = getShootingIP();
    var url_stop = 'http://'+IP + '/api/v1/admin/stop';

    stop_load = false;  
    console.log('stop');

    $.ajax({
        type: "POST",
        url: url_stop,
        data: JSON.stringify({
            cmd:'stop',
            conf: {
                name: 'service1'
            }
          }),
        dataType: 'json',
        crossOrigin: true,
        success: function(result) {
            console.log(result);
        }
    });
}

function start_service(){
    var IP = getShootingIP();
    var url_start = 'http://'+IP + '/api/v1/admin/start';
  //alert(url_start);
//$("#load-btn").click(function(){
    stop_load = true;
    var url_text =  $('#data-load').val();
    var type_select =  $('#type').find(":selected").val();
    var header_textarea =  $('#header').val() == ""? "{}":$('#header').val();

    var body_textarea =  $('#body').val();

    var header_text = JSON.parse(header_textarea.replace(/\r?\n/g, ''));
   
   
   if($('#data-concerrence').val()== ""){
        var data_connerrence = 100;
   }else{
       var data_connerrence =  parseInt($('#data-concerrence').val());
   }
   
   
    var arr = url_text.split('/');
    var arr_port = url_text.split(':');
    if(arr_port.length == '3'){
        var host_url = arr[2];
    }else{
        var host_url = arr[2]+':80';
    }
   

   
    var Obj = {
        cmd:'start',
        conf: 
          {name: 'service1',
          url:  url_text,
          method: type_select,
          concurrence : data_connerrence,
          host : host_url,
          headers: header_text,
          body:body_textarea
        }
      };
      var myString = JSON.stringify(Obj);
     console.log(myString);
      $.ajax({
        type: "POST",
        url: url_start,
        data: myString,
        dataType: 'json',
        crossOrigin: true,
        success: function(result) {
            console.log(result.data.url);
            var url_metric = result.data.url;
            var param_metric = url_metric +'/metrics';
            console.log("url: "+param_metric);
            setInterval( function() { ajaxd(param_metric); }, 2000 );
           
           
        }

    });
   
}
function test_load(){
var speed = $('#speedtest').text();
//alert(speed);
    $('#hand').animate({ textIndent: 0 }, {
            step: function(now) {
                now = speed;
                $('.meter .num').each(function() {
                    for (var i = 0; i <= 1000; i++) {
                        $('#num_' + (i + 1)).text(i * 30);
                    }
                })
                if ((now / 180) > 1) {
                    var m = now / 180;
                    $('.meter .num').each(function() {
                        for (var i = 0; i <= 6; i++) {
                        		var v = Math.round(i * 30 * m) * 2
                            if( v >= 1000 && v < 1000000){
                            	v = (v/1000).toFixed(1)+"K";
                            }else if( v >= 1000000){
                            	v = (v/1000000).toFixed(1)+"M";
                            }
                            $('#num_' + (i + 1)).text(v);
                        }
                    })
                    $(this).css('-webkit-transform', 'rotate(' + 90 + 'deg)');
                } else {
                    $(this).css('-webkit-transform', 'rotate(' + now + 'deg)');
                }

                $('#speed').prop('Counter', 0).animate({
                    Counter: now
                }, {
                    duration: 2000,
                    easing: 'linear',
                    step: function(now) {
                        $('#speed').text(Math.round(now * 100) / 100);
                    }
                });
            },
            duration: '1000'
        },
    'linear');
    }