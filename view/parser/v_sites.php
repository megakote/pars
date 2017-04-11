<center><h1>Парсинг ссылок</h1></center>
<div id="stat-app" class="start-btn col-md-12 text-center">
    <p>Парсинг сейчас: <span class="worked"></span></p>    
    <p>Сайтов в базе: <span class="count-all"></span></p>    
    <p>Произведено итераций за сеанс: <span class="iterations"></span></p>    
	<div id="work_place">
		<button type="button" class="btn btn-lg btn-primary" id="cancel" style="display: none;">Остановить парсинг</button>
		<div class="welldone" style="display: none;">
			<p>Закончил с ошибкой: <span class="error"></span></p>
			<button type="button" class="btn btn-lg btn-primary" id="start">Начать парсинг</button>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	//setTimeout(function() {window.location.reload();}, 1000);
	var worked;
	function ajaxgo(){
		
			$.ajax({
				url: '/sites/stat',
				type: 'post',
				success: function(stat) {
					stat = JSON.parse(stat);
					if (stat.worked) {
						$('.worked').html('Работает');
						$('#cancel').show();
						$('.welldone').hide();
						worked = true;
						console.log('From worked true - ' + worked);
					} else {
						worked = false;
						console.log('From worked false - ' + worked);
						$('.worked').html('Остановлен');
						$('.error').html(stat.error);
						$('.welldone').show();
						$('#cancel').hide();
					}
					$('.count-all').html(stat.urls_count);
					$('.iterations').html(stat.i);

					console.log(stat);

				}
			});
		
	}
	ajaxgo();
	$('#cancel').click(function() {
		$.ajax({
			url: '/sites/stop',
			type: 'post',            
			success: function(data) {
				$('#cancel').attr('disabled', 'disabled');
				$('#cancel').html('Парсинг остановлен');
			}
		});
		return false;
	});
	$('#start').click(function() {
		$.ajax({
			url: '/sites/yandex',
			type: 'post',
			success: function() {}
			
		});
			ajaxgo();
		var interval = setInterval(function(){
			ajaxgo();
			if (worked === false) {
				clearInterval(interval);
				console.log('From interval - ' + worked);
			}
		}, 1000);
		return false;
	});
});
</script>