$(document).ready(function() {
    $('.label-status').each(function() {
        var status = $(this).text();
        if (status == 'done') {
            status = "label-success";
        }else if(status=='pending'){
            status = "label-info";
        }else{
            status = "label-danger";
        }
        // console.log(status);
        $(this).addClass(""+status);
    });
});
