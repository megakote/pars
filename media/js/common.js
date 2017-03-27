$(document).ready(function() {
    var data1 = _PHP.stat;
    $('#ya_click').click(function() {
        $(this).hide();

        $.get( "/sites/yandex");

        location.href = '/sites/stat';

        $.ajax({
            url: '/sites/stat',
            success: function(data) {
                $('#data pre').html(data);
            }
        });
        return false;
    });
    if (data) {
        setTimeout(function() {window.location.reload();}, 5000);
    }
});
