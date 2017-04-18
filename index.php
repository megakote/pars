<?php 
	include_once('config.php');
	include_once('autoload.php');
	include_once('lib/miscs.php');
	$p = explode('/', $_GET['q']);
	$params = array();

	foreach($p as $one){
		if($one != '')
			$params[] = $one;
	}

	$c = '\\controllers\\';
	$c .= isset($params[0]) ? $params[0] : 'index';

	$action = "action_";
	$action .= isset($params[1]) ? $params[1] : 'index';

	$conrtroller = new $c();
	$conrtroller->request($action, $params);