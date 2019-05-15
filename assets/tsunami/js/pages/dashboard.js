$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');
    
    $('.select2').select2()

});

$(document).ready(function() {
    //Total M-devices
    
  if($.cookie('tokenfield')){
    //  $('#data-load').val($.cookie('tokenfield'));
    $('#data-load').val('http://164.115.17.181/netcoretest/Home/About');
   
  }
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
    stop_load = false;  
    console.log('stop');
}

function start_service(){
//$("#load-btn").click(function(){
    stop_load = true;
    var url_text =  $('#data-load').val();
    var arr = url_text.split('/');
    var host_url = arr[2]+':80';
    var Obj = {
        cmd:'start',
        conf: 
          {name: 'service1',
          url:  url_text,
          concurrence : 1,
          host : host_url
          }
        
      };
      var myString = JSON.stringify(Obj);
    
      $.ajax({
        type: "POST",
        url: 'http://122.155.4.135:8090/api/v1/admin/start',
        data: myString,
        dataType: 'json',
        crossOrigin: true,
        success: function(result) {
            console.log(result.data.url);
            var url_metric = result.data.url;
            var param_metric = url_metric +'/metrics';
           
            setInterval( function() { ajaxd(param_metric); }, 2000 );
           
           
        }

    });
    // setInterval(ajaxd(myString), 2000);
    
   // var random = Math.floor((Math.random() * 1000) + 1);
    

    // $.ajax({
    //     type: "GET",
    //     url: 'home/callapi',
    //     dataType: 'json',
       
    //     success: function(result) {
    //         console.log(result.data.rps);
    //         rps = result.data.rps;
    //         numload = parseFloat(rps).toFixed(2);
    //         alert(numload);
    //         $('#speedtest').text(numload);
    //         test_load();
           
    //     }

    // });



    // });


   
///});
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
                            $('#num_' + (i + 1)).text(Math.round(i * 30 * m) * 2);
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