$(function(){
    var c = _PHP.c;
    var token = _PHP.token;
    
    // + страница stat
    if($('#stat-app').length > 0){
        var $progress = $('#progress');
        var $progressBar = $('.progress-bar');
        var $count_all = $('.count-all');
        var $count_done = $('.count-done');
    
        var timer = setInterval(function(){
            $.get('/' + c + '/ajaxstat/' + token, {}, function(data){
                if(data.all == data.done) {
                    $progressBar.removeClass('active progress-bar-striped');
                    clearInterval(timer);
                }

                $count_all.html(data.all);
                $count_done.html(data.done);
                
                var percent = ((100 / data.all) * data.done).toFixed(2) + '%';
                $progress.html(data.done);
                $progressBar.css('width', percent);
                $progressBar.html(percent);
            }, 'json');
        }, 1000);
    }
    // - страница index
    else{
        $('#start').click(function(){
            $(this).hide();
            
            $.get('/' + c + '/token', {}, function(data){
                $.get('/' + c + '/process/' + data, {});
                
                setTimeout(function(){
                    document.location.href = '/' + c + '/stat/' + data;
                }, 1000);  
            });
        });
    }
});