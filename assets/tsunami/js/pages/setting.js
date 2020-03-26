$('#tokenfield').tokenfield();

$(document).ready(function () {

});

$("#submit").attr("onclick", "").click(function () {

    $.ajax({
        type: "POST",
        url: 'setting/UpdateIP',
        dataType: 'json',
        data: {
            listip: $('#tokenfield').val()
        },
        success: function (result) {

            console.log(result.status);
            if (result.status === 'fail') {
                alert('fail');
            }
            if (result.status === 'success') {
                alert('success');
            }
        }

    });

});