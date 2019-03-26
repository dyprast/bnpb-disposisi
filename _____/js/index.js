$('#deleteCModal').on('show.bs.modal', function(e) {
    $(this).find('#conf_delete').attr('href', $(e.relatedTarget).data('uri'));
});
var date = new Date;
var year = date.getFullYear();
$('#year').html(year);

$.ajax({
    url: "app/__API/cp_pusdatinmas.php",
    success:function(res){
        if (res) {
            $('#pusdatinmas').empty();
            $('#pusdatinmas').html(res);
        }
    }
});