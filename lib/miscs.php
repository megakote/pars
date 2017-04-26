<?php

/**
 * Выводит оформленный ver_dump
 * @param $array
 */
function v($array){
	echo "<pre>";
	var_dump($array);
	echo "</pre> \n";
}

/**
 * Создаем хэш для строки
 * @param $str
 * @param string $salt
 * @param int $length
 * @return int
 */
function make_hash($str, $salt = '', $length = 8){
	return hexdec(substr(md5($str . $salt), 0, $length));
}