$(function(){
    var data = _PHP.data;
    var c = _PHP.c;
    
    var l = data.length;
    var done = 0;
    var $progress = $('#progress');
    var $progressBar = $('.progress-bar');
    var $logo = $('.logo img');
    var $log = $('#log');


    $('#start').click(function(){
        $(this).hide();
        request();
    });

    function request(){
        if(data.length == 0)
            return;

        var elem = data.shift();

         $.ajax({
            url: '/' + c + '/one',
            type: 'post',
            data: elem,
            cache: false,
            success: function(msg){
                done++;
                progressBar(false, msg);
                request();
            },
            error: function(){
                progressBar(true);
            }
         });
     }

     function progressBar(err, msg) {
        var percent = ((100 / l) * done).toFixed(2) + '%';

        if(err) {
            $progressBar.removeClass('progress-bar-success active').addClass('progress-bar-danger');
            return;
        }

        if(done == l) {
            $progressBar.removeClass('active progress-bar-striped');
        }

        $progress.html(done);
        $progressBar.css('width', percent);
        $logo.css('left', percent);
        $progressBar.html(percent);
        $log.append('<div>' + done + ': '+ msg + '</div>').scrollTop($log.prop('scrollHeight'));
     }

});