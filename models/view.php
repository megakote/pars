<?php

namespace models{
	class view{
		public static function template($filename, $values = []){
			extract($values);// превращает массив в переменные с названием их как ключи массива
			ob_start();
			include ("view/$filename");
			return ob_get_clean();
		}
	}
}
