<center><h1>Парсинг ссылок</h1></center>

<div class="col-xs-12">
		<script>
		$(document).ready(function() {			
			$('#start').click(function() {
				$.ajax({
					url: '/sites/yandex',
					type: 'post',            
					success: function() {						
					}
				});

				location.href = '/sites/stat';
			});
		});
		</script>
		<button type="button" class="btn btn-lg btn-primary" id="start">Начать парсинг</button>	
</div>
