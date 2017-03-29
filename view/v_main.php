<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/media/css/style.css">
	<script>
		_PHP = <?=json_encode($js_vars)?>;
	</script>
	<? foreach($scripts as $script): ?>
		<script src="/media/js/<?=$script?>.js"></script>
	<? endforeach; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 header">
				<div class="header-line">
					<span class="glyphicon glyphicon-globe g-left blue-font"></span>
					<span class="glyphicon glyphicon-home g-right blue-font"></span>
				</div>
			</div>
			<?=$content?>
		</div>
	</div>

</body>
</html>