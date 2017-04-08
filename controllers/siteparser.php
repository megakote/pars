<?php 
//Еще на запущен
namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;
	use \models\dataforparse\yandex as yandex;

	class siteparser extends system{
		protected $title = 'Парсим список url\'ов';
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		public $link = [];
		public $data = [];
		public $i = 0;

		public function __construct(){
			parent::__construct();
			
		}

		public function action_index(){
			//Проверяем запущен ли процесс парсинга
			if ($this->stat->isWorked()) {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: stat"); 
				exit(); 
			}

		}

	}
}