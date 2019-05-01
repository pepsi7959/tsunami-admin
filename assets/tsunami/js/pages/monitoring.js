var email = '';
var email = '';
var customerid = '';
$(function () {
    //Right Menu
    $("a.monitoring").addClass('active');

});


$(document).ready(function() {
   //$("#display_btn").attr("disabled", true);
    $('#display_btn').addClass('disabled');
    //Initialize Select2 Elements
    $('.select2').select2()

    //set User dropdown 
    userDropDown();

    //Date range picker
    //Annual Monitoring
    $('#annual-date').datepicker({
        autoclose:true,
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
    }).on('changeDate', function(e) {
        $('#n-year').attr('disabled',false)
        $('#p-year').attr('disabled',false)
        // alert(e.format());
        console.log("email: " + email + " customerid: " + customerid);
        customerid = getCookie("customerid");
        if( customerid != '' ){
            setAnnualChart(customerid, e.format());
        }
    });

   //Monthly Monitoring
    $('#month-date').datepicker({
        autoclose:true,
        format:"mm/yyyy",
        viewMode:"months",
        minViewMode:"months", 
    }).on('changeDate', function(e) {
        $('#n-month').attr('disabled',false)
        $('#p-month').attr('disabled',false)
        // alert(e.format())
        console.log("email: " + email + " customerid: " + customerid);
        customerid = getCookie("customerid");
        var date = e.format().split("/");
        console.log(date)
        if( customerid != '' && date.length == 2 && date[0] != '' && date[1] != ''){            
            setMonthlyChart(customerid, date[1], date[0]);
        }
    });
    $(document).ready(function(){
       
    if($('#month-date').val()==''){
        $('#n-month').attr('disabled',true)
        $('#p-month').attr('disabled',true)
    } 
    if($('#annual-date').val()==''){
        $('#n-year').attr('disabled',true)
        $('#p-year').attr('disabled',true)
    } 
    if($('#day-date').val()==''){
        $('#n-daily').attr('disabled',true)
        $('#p-daily').attr('disabled',true)
    } 
  
    });

    $('#n-month').click(function(){
        var date = $("#month-date").datepicker( 'getDate' );
       
        date.setMonth(date.getMonth() + 1);
        $("#month-date").datepicker("setDate", date);
    });

    $('#p-month').click(function(){
        var date = $("#month-date").datepicker( 'getDate' );
       
        date.setMonth(date.getMonth() - 1);
        $("#month-date").datepicker("setDate", date);
    });

    $('#p-year').click(function(){
       
        var date = $("#annual-date").datepicker( 'getDate' );
      
        date.setFullYear(date.getFullYear() - 1);
        $("#annual-date").datepicker("setDate", date);
    });
    $('#n-year').click(function(){
       
        var date = $("#annual-date").datepicker( 'getDate' );
      
        date.setFullYear(date.getFullYear() + 1);
        $("#annual-date").datepicker("setDate", date);
    });

    $('#p-daily').click(function(){
       
        var date = $("#day-date").datepicker( 'getDate' );
      
        date.setDate(date.getDate() - 1);
        $("#day-date").datepicker("setDate", date);
    });
    $('#n-daily').click(function(){
       
        var date = $("#day-date").datepicker( 'getDate' );
      
        date.setDate(date.getDate() + 1);
        $("#day-date").datepicker("setDate", date);
    });



    //daily Monitoring
    $('#day-date').datepicker({
        autoclose:true,
        format:"dd/mm/yyyy",
    }).on('changeDate', function(e) {
        // alert(e.format());
        $('#n-daily').attr('disabled',false)
        $('#p-daily').attr('disabled',false)
        console.log("email: " + email + " customerid: " + customerid);
        customerid = getCookie("customerid");
        var date = e.format().split("/");
        console.log(date);
        if( customerid != ''  && date.length == 3 && date[0] != '' && date[1] != '' && date[2] != ''){
            setDailyChart(customerid, date[2], date[1], date[0]);
        }
    });

   
    
   

    $('#select2-customer-email').on('select2:select', function (e) {
        console.log($(this).val());
    //    if($(this).val() == ""){
       
    //         $('#display_btn').toggleClass('disabled');
    //    }
        if($("#display_btn").hasClass('disabled')){
         
            $("#display_btn").removeClass('disabled');
        }
       
        console.log(e.params);
        this.email = e.params.data.text;
        this.customerid = e.params.data.id;
        console.log(email);
        console.log(this.customerid);
        document.cookie = "customerid="+e.params.data.id;
    });


    /* Click display button */
    $("#display_btn").click(function(){
       
        // this.disabled = true;
        if( $("#annual-monitoring").hasClass("invisible") == true ){
            $("#annual-monitoring").removeClass("invisible");
            
        }
        if( $("#monthly-monitoring").hasClass("invisible") == true ){
            $("#monthly-monitoring").removeClass("invisible");
        }
        if( $("#daily-monitoring").hasClass("invisible") == true ){
            $("#daily-monitoring").removeClass("invisible");
            
        }
        var dt = new Date();
        customerid = getCookie("customerid");

        if( customerid != "" ){
            setAnnualChart(customerid, "2018");
            //setAnnualChart(customerid, dt.getFullYear());

            setMonthlyChart(customerid, "2018", "01");
            //setMonthlyChart(customerid, dt.getFullYear(), dt.getMonth());

            setDailyChart(customerid, "2018", "01", "01");
            //setDailyChart(customerid, dt.getFullYear(), dt.getMonth(), dt.getDay());

        }

    });

    $('form-control-1').datepicker({
        autoclose: true,
        minViewMode: 1,
        format: 'mm/yyyy'
    }).on('changeDate', function(selected){
            startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        }); 
    
});


function setAnnualChart(customerid, year) {

    var colors = ['#62c2cc', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        if( $("#annual-monitoring").hasClass("collapsed-card") == true ){
            $("#annual-monitoring").removeClass("collapsed-card");
        }

        var json = JSON.parse(this. responseText);
        if ( json != null && json['success'] == true) {
            data = json['data'];
            Highcharts.chart('container-annual-mon', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Annual consumptions'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true,
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Energy Consumption (kWh)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} kWh</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                credits: {
                    enabled: false
                },
                colors: colors,
                series: data
            });
        
        }
    }
    };
    xhttp.open("GET", "api/v1/mon/year/"+customerid+"/"+year, true);
    xhttp.send();
 }


function setMonthlyChart(customerid, year, month){
    
    var colors = ['#62c2cc', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        if( $("#monthly-monitoring").hasClass("collapsed-card") == true ){
            $("#monthly-monitoring").removeClass("collapsed-card");
        }

        var json = JSON.parse(this. responseText);
        if ( json != null && json['success'] == true) {
            data = json['data'];
            Highcharts.chart('container-monthly-mon', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'monthly consumptions'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    min:1,
                    max:31
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Energy Consumption (kWh)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} kWh</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                credits: {
                    enabled: false
                },
                colors: colors,
                series: data
            });
        }
    }
    };
    xhttp.open("GET", "api/v1/mon/month/"+customerid+"/"+year+"/"+month, true);
    xhttp.send();
    
}


function setDailyChart(customerid, year, month, day){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this. responseText);
        if ( json != null && json['success'] == true) {

            if( $("#daily-monitoring").hasClass("collapsed-card") == true ){
                $("#daily-monitoring").removeClass("collapsed-card");
            }

            data = json['data'];
            console.log("set daily chart");
            var colors = ['#62c2cc', '#ffdd00', '#fdb813', '#f17022', '#48535e', '#f15c80'];
            Highcharts.chart('container-daily-mon', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'daily consumptions'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    min:0,
                    max:23,
                    categories: ['device']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Energy Consumption (kWh)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} kWh</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                credits: {
                    enabled: false
                },
                colors: colors,
                series: data
            });
        }
    }
    };
    xhttp.open("GET", "api/v1/mon/day/"+customerid+"/"+year+"/"+month+"/"+day, true);
    xhttp.send();
}


function setTotalAnnualChart(data){

}

function userDropDown() {
    var users = [];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(this. responseText);
        json.data.forEach(user => {
            users.push({
                id: user.customerid,
                text: user.firstname + " " + user.lastname + " <"+ user.email + ">"
            });
            
        });
        $( "#select2-customer-email" ).select2({
            data: users
        });
        }
    };
    xhttp.open("GET", "api/v1/users", true);
    xhttp.send();
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }