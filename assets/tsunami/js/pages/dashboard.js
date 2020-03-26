$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');

    $('.select2').select2()

});

function getShootingIP() {
    return $('#ipshooting').val();
}

function getScheme() {
    return $('#scheme').val();
}

function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
      var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
    });
  }


$(document).ready(function () {

    $('#data-load').val('');
    var stop_load = false;

    $('#header').val(readHeader());
    $('#body').val(readBody());
    $('#data-load').val(readUrl());
    $('#data-concerrence').val(readConcurrence());
    
    const service = readService();

    if( service == null ){
        saveService(uuidv4());
    }

    $("#load-btn").attr("onclick", "").click(function () {

        if (this.value == "Start") {

            if( start_service() != 0 ) {
                return ;
            }

            $(this).prop('value', 'Stop');
            if ($(this).hasClass("btn-success")) {

                $("#load-btn").removeClass("btn-success");
                $(this).addClass("btn-danger");
            }

        } else if (this.value == "Stop") {

            $(this).prop('value', 'Start');
            if ($(this).hasClass("btn-danger")) {
                $("#load-btn").removeClass("btn-danger");
                $(this).addClass("btn-success");
            }
            stop_service();

        }

    });

});


function ajaxd(url_metric, params) {

    if (stop_load) {
        console.log('ajaxd');
        console.log(url_metric);
        $.ajax({
            type: "POST",
            url: url_metric,
            dataType: 'json',
            data: JSON.stringify(params),
            crossOrigin: true,
            success: function (result) {
                rps = result.data.rps;
                numload = parseFloat(rps).toFixed(2);
                console.log(numload);
                $('#speedtest').text(numload);
                updateGage();
            }

        });
    }
}

function stop_service() {

    var IP = getShootingIP();
    var scheme = getScheme();

    var url_stop = scheme + '://' + IP + '/api/v1/stop';

    stop_load = false;
    console.log('stop');

    $.ajax({
        type: "POST",
        url: url_stop,
        data: JSON.stringify({
            cmd: 'stop',
            conf: {
                name: readService()
            }
        }),
        dataType: 'json',
        crossOrigin: true,
        success: function (result) {
            console.log(result);
        }
    });
}

function start_service() {

    var IP = getShootingIP();
    var scheme = getScheme();

    var url_start = scheme + '://' + IP + '/api/v1/start';

    stop_load = true;

    var url_text = $('#data-load').val();
    var type_select = $('#type').find(":selected").val();
    var header_textarea = $('#header').val() == "" ? "{}" : $('#header').val();

    var body_textarea = $('#body').val();
    var header_text = JSON.parse(header_textarea.replace(/\r?\n/g, ''));

    var data_connerrence = 30;

    if ($('#data-concerrence').val() != "") {
        data_connerrence = parseInt($('#data-concerrence').val());
    }

    saveBody(body_textarea);
    saveHeader(header_textarea);
    saveConcurrence(data_connerrence);
    saveUrl(url_text)

    var oc_protocol = "http";
    var oc_port = "80";
    var oc_host = "";
    var oc_path = "/";

    urls = url_text.split(':');
    if (urls.length == 3) {
        /* use custom port http://[host]:[port][/path/...]*/
        oc_protocol = urls[0];

        if (oc_protocol != 'http' && oc_protocol != 'https') {
            alert("กรุณาตรวจสอบ URL ใหม่ รองรับแค่ \"http\" หรือ \"https\" ");
            return -1;
        }

        if (urls[1][0] == '/' && urls[1][1] == '/') {
            oc_host = urls[1].substring(2);
        } else {
            alert("กรุณาตรวจสอบ URL ใหม่, http[s]://<hostname>[:port][/uri...]");
            return -1;
        }
        var port_path = urls[2].split('/', 1); // :port/path1/path2
        if (port_path.length > 1) {
            oc_port = port_path[0];
            oc_path = port_path[1];
        } else {
            oc_port = port_path[0];
        }
    } else if (urls.length == 2) {
        /* use custom port http://[host][/path/...]*/
        oc_protocol = urls[0];
        if (oc_protocol != 'http' && oc_protocol != 'https') {
            alert("กรุณาตรวจสอบ URL ใหม่ รองรับแค่ \"http\" หรือ \"https\" ");
            return -1;
        }

        if (urls[1][0] == '/' && urls[1][1] == '/') {
            host_path = urls[1].substring(2);
            host_path = host_path.split('/', 1);
            if (host_path.lenght > 1) {
                oc_host = host_path[0];
                oc_path = host_path[1];
            } else if (host_path.lenght == 1) {
                oc_host = host_path[0];
            } else {
                alert("กรุณาตรวจสอบ URL ใหม่");
                return -1;
            }
        } else {
            alert("กรุณาตรวจสอบ URL ใหม่");
            return -1;
        }

    } else {
        alert("กรุณาตรวจสอบ URL ใหม่");
        return -1;
    }

    var Obj = {
        cmd: 'start',
        conf: {
            name: readService(),
            host: oc_host,
            port: oc_port,
            path: oc_path,
            protocol: oc_protocol,
            method: type_select,
            concurrence: data_connerrence,
            headers: header_text,
            body: body_textarea
        }
    };

    var myString = JSON.stringify(Obj);

    console.log(myString);

    $.ajax({
        type: "POST",
        url: url_start,
        data: myString,
        contentType: "application/json",
        dataType: 'json',
        crossOrigin: true,
        success: function (result) {
            console.log("start result : " + JSON.stringify(result));
            var url_metrics = scheme + '://' + IP + '/api/v1/metrics';
            setInterval(function () {
                ajaxd(url_metrics, {
                    conf: {
                        name: readService(),
                    }
                });
            }, 2000);
        }

    });
    return 0;
}

function saveHeader(header) {
    localStorage.setItem("hc", header);
}

function readHeader() {
    return localStorage.getItem("hc");
}

function saveBody(body) {
    localStorage.setItem("bc", body);
}

function readBody() {
    return localStorage.getItem("bc");
}

function saveUrl(url) {
    localStorage.setItem("url", url);
}

function readUrl() {
    return localStorage.getItem("url");
}

function saveConcurrence(concurrence) {
    localStorage.setItem("concurrence", concurrence);
}

function readConcurrence() {
    return localStorage.getItem("concurrence");
}

function saveService(service){
    localStorage.setItem("service", service);
}

function readService(){
    return localStorage.getItem("service");
}

function updateGage() {
    var speed = $('#speedtest').text();
    //alert(speed);
    $('#hand').animate({
            textIndent: 0
        }, {
            step: function (now) {
                now = speed;
                $('.meter .num').each(function () {
                    for (var i = 0; i <= 1000; i++) {
                        $('#num_' + (i + 1)).text(i * 30);
                    }
                })
                if ((now / 180) > 1) {
                    var m = now / 180;
                    $('.meter .num').each(function () {
                        for (var i = 0; i <= 6; i++) {
                            var v = Math.round(i * 30 * m) * 2
                            if (v >= 1000 && v < 1000000) {
                                v = (v / 1000).toFixed(1) + "K";
                            } else if (v >= 1000000) {
                                v = (v / 1000000).toFixed(1) + "M";
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
                    step: function (now) {
                        $('#speed').text(Math.round(now * 100) / 100);
                    }
                });
            },
            duration: '1000'
        },
        'linear');
}