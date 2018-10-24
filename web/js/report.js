$(document).ready(function () {
    $("button#build_report").click(function() {
        var param = {
            'machine': $('select[name="machine"]').val(),
            'month':$('select[name="month"]').val(),
            'year': $('input[name="year"]').val()
        };
        console.log(param);
        location = "http://machines:81/admin/loading/reports?machine="+param.machine+"&month="+param.month+"&year="+param.year;
    });
});