$(function () {

    //Right Menu
    $("a.dashboard").addClass('active');

   

});

$(document).ready(function() {
    //Total M-devices
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this. responseText);
        $("#numOfMDevices").text(json.data.active);
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totalmdevices", true);
    xhttp.send();

    //Total S-Devices
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this.responseText);
        $("#numOfSDevices").text(json.data.active);
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totalsdevices", true);
    xhttp.send();

    //user registrations
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this.responseText);
        $("#numOfUsers").text(json.data.active);
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totaluserregistrations", true);
    xhttp.send();

    //transaction
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this.responseText);
        $("#numOfTransactions").text(json.data.active);
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totaltransactions", true);
    xhttp.send();

    // //Total M-devices per year
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this. responseText);
        var data = json.data;
        setMTotalChart(2018, data);
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totalmperyear", true);
    xhttp.send();

    //Total S-devices per year 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this. responseText);
        var data = json.data;
        setSTotalChart(2016,data)
        }
    };
    xhttp.open("GET", "api/v1/dashboard/totalsperyear", true);
    xhttp.send();

});


function setSTotalChart(point_start, data){
    var colors = ['#48535e', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];
    Highcharts.chart('line-chart', {
        colors: colors,
        chart: {
            backgroundColor:'none' 
        },
        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        yAxis: {
            title: {
                text: 'Number of S-Series'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: point_start
            }
        },
        backgroundColor: null,
        series: [{
            name: 'S-Series',
            data: data
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        },

        credits: {
            enabled: false
        },

        exporting: { enabled: false }
    });
}


function setMTotalChart(point_start, data){
    var colors = ['#ffffff', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];
    Highcharts.chart('m-series-line-chart', {
        colors: colors,
        chart: {
            backgroundColor:'none' 
        },
        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        yAxis: {
            title: {
                text: 'Number of M-Series'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: point_start
            }
        },
        backgroundColor: null,
        series: [{
            name: 'M-Series',
            data: data
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        },

        credits: {
            enabled: false
        },

        exporting: { enabled: false },

    });
}