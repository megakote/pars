<?if ($title) {?>
<center><h1><?=$title?></h1></center>
<?}?>


<div class="col-xs-12">
    <table class="table table-striped" style="width: 300px; margin: 20px auto;">
 		<tbody>
 			<tr>
 				<td>Количество элементов в базе</td>
 				<td><span class="count"></span></td>
 			</tr>
 		</tbody>
	</table>
</div>
<div class="col-sm-4 col-sm-push-4" style="text-align: center;">
<style type="text/css">
	.btn {
		width: 100%;
		margin-top: 10px;
	}
</style>
<form name="querys">
	<legend>Добавить поисковые фразы</legend>
	<label>Выберите разделитель
		<select name="delimiter">
				<option value=";" selected>( ; ) Точка с запятой</option>
				<option value=",">( , ) Запятая</option>
		</select>
	</label>
	<textarea name="querys" rows="10" style="width: 100%;margin: 10px 0;"></textarea>
	<button type="submit" class="btn">Подтвердить</button>
	<button id="cancel" data-value="20" class="btn" style="display: none;">Отменить</button>
</form>

</div>
<div class="col-xs-12">
<div id="data">
	<pre></pre>
</div>
</div>
<script>
function GetCount() {
	$.ajax({
		url: '/querys/show',
		success: function(data) {
		    $('.count').html(data);
		}
	});
}
$(document).ready(function() {
	GetCount();
	$('form[name="querys"]').submit(function() {
		$.ajax({
			url: '/querys/add',
			type: 'post',
            data: $(this).serialize(),
			success: function(data) {
				if (data) {
					$('textarea').val('');				
					$('#cancel').show('400');
					$("#cancel").attr("data-value", data);
				    $('#data pre').html(data);
				    GetCount();
				}
			}
		});
		return false;
	});
	$('#cancel').click(function() {
		$.ajax({
			url: '/querys/del',
			type: 'post',
            data: {id:$("#cancel").attr("data-value")},
			success: function(data) {
				$('textarea').val('');
				$('#cancel').hide();
			    $('#data pre').html(data);			    
			    GetCount();
			}
		});
		return false;
	});
});
</script>
