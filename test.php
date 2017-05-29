<?php
	include_once('config.php');
	include_once('autoload.php');
	include_once('lib/miscs.php');


$c = new \controllers\siteparser();

$c->startSiteParsing();
