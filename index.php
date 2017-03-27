<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	setlocale(LC_ALL, 'ru_RU.UTF8');
	ignore_user_abort(true);
	include_once('config.php');
	include_once('autoload.php');
	
	$p = explode('/', $_GET['q']);
	$params = array();

	foreach($p as $one){
		if($one != '')
			$params[] = $one;
	}

	$c = '\\controllers\\';
	$c .= isset($params[0]) ? $params[0] : 'index';
	
	$action = 'action_';
	$action .= isset($params[1]) ? $params[1] : 'index';
	
	$conrtroller = new $c();   
	$conrtroller->request($action, $params);
