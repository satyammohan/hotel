$(function() {
    jQuery.browser={};
    jQuery.browser.msie=false; 
    jQuery.browser.version=0;
    if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ 
        jQuery.browser.msie=true;
        jQuery.browser.version=RegExp.$1;
    }
    $(".print").click( function() {
        $('.print_content').jqprint();
        return false;
    });
    $(".excel").click( function () {
        flname = $("#excelfile").val() ? $("#excelfile").val() : "accounts";
        $("#report").table2excel({
            exclude: ".noExl",
            name: "Worksheet",
            filename: flname
        });
    });
});
function tbl_handler() {
    $('#dataTable').DataTable();
}
$(document).ready(function() {
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal( { show:true } );
        });
    });
    tbl_handler();
});
function update_status(tbl, id, row_status, list_status) {
    let url = "index.php?module=" + tbl + "&func=update_flag&table=" + tbl + "&id=" + id + "&row_status=" + row_status + "&list_status=" + list_status;
    window.location.href = url;
}
function cancelthis(msg, url, id) {
    if (confirm(msg)) {
        $.post(url, { id:id, ce:0 }, function(res) {
            $(".modal-body").html(res);
            $('#myModal').modal('show');
        });
    }
}