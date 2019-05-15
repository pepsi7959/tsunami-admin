$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');
    
   

});

$(document).ready(function() {
    //Total M-devices
    
  if($.cookie('tokenfield')){
      $('#data-load').val($.cookie('tokenfield'));
      
  }
  var stop_load = false;
        

});


function ajaxd(){
   
    if(stop_load){
        $.ajax({
            type: "GET",
            url: 'home/callapi',
            dataType: 'json',
        
            success: function(result) {
                console.log(result.data.rps);
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
$("#stop").click(function(){
    stop_load = false;  
    console.log('stop');
});

$("#load").click(function(){
    stop_load = true;
    setInterval(ajaxd, 2000);
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


    // $.getJSON("http://122.155.4.135:8091/api/v1/metrics", function(result){
    //     // $.each(result, function(i, field){
    //     //   $("div").append(field + " ");
    //     // });
    //     console.log(data);
   // });

  
  //  test_load();
   
});
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