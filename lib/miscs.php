<?php

function v($v){
	echo "<pre>";
	var_dump($v);
	echo "</pre>";
}

function make_hash($str, $salt = '', $l = 8){
	return hexdec(substr(md5($str . $salt), 0, $l));
}