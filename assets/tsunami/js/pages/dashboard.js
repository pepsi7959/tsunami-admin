$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');

   

});

$(document).ready(function() {
    //Total M-devices
   

});


var speed = $('#speed').text();
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
