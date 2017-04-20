<?php
	include_once('config.php');
	include_once('autoload.php');
	include_once('lib/miscs.php');


//	$c = new \models\curl('https://www.mamba.ru/ru/');
//	$c->follow(true);
//	for ($i = 0; $i < 99; $i++){
//			$content = $c->request("search.phtml?ia=M&lf=F&af=18&at=78&p=a&t=z&s_c=3159_4052_0_0&form=1&offset=$i*24");
//			file_put_contents("log/$i.html", $content);
//	}

$c = new \controllers\siteparser();
$c->action_index();