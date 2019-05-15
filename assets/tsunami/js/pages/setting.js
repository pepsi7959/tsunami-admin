
$(function () {
  
    //Initialize Select2 Elements
    $('.select2').select2()

   
    

  })

  $(document).ready(function() {   
    $('#tokenfield').tokenfield()
    
    $("form").submit(function(e) {
        e.preventDefault();
        $('.form-data').text($('#tokenfield').val());
       //tokenfieldtokenfield alert($('#tokenfield').val());

        $.cookie('tokenfield', $('#tokenfield').val());
        //alert($('#tokenfield').val());
        alert($.cookie('tokenfield'));
    });
});