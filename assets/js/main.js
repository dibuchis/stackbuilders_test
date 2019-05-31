$(".mark-day").click(function(){
    $(".mark-day").addClass('alert-secondary');
    $(".mark-day").removeClass('btn-primary');
    var day = $( this ).attr('data-day');
    $("#input-dia").val(day);
    $(".mark-day-" + day).removeClass('alert-secondary');
    $(".mark-day-" + day).addClass('btn-primary');
});
$("#datetimepicker12").on("dp.change", function(e){
    $("#input-hora").val(e.date.hour() + ":" + e.date.minutes());
});
$("#consultar").click(function(){
$.ajax({
        method : 'post',
        url : 'app/ajax.php',
        data : { fn : 'consulta', placa : $("#input-placa").val() , dia : $("#input-dia").val(), hora : $("#input-hora").val() },
        success : function(data) {
            var res = JSON.parse(data);
            console.log(data);
            // return 0;
            Swal.fire({
                title: res.title,
                type: res.status,
                text: res.msg
            });
        }
    });
});