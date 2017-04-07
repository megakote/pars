<center><h2>Статистика парсинга</h2></center>
<div id="stat-app" class="start-btn col-md-12 text-center">
    <p>Парсинг сейчас: <span class="count-all"><?=$data['worked'] ? 'Работает' : 'Не работает' ;?></span></p>    
    <p>Сайтов в базе: <span class="count-all"><?=$data['urls_count']?></span></p>    
    <p>Произведено итераций за сеанс: <span class="count-all"><?=$data['i']?></span></p>    


    <?if ($data['worked']):?>
		<script>
		$(document).ready(function() {
			//setTimeout(function() {window.location.reload();}, 1000);
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
		});
		</script>
		<button type="button" class="btn btn-lg btn-primary" id="cancel">Остановить парсинг</button>
	<?endif;?>
</div>

