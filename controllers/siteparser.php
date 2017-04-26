<?php 
//Еще на запущен
namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;
	use \models\curl as curl;
	use \models\stat as stat;
	use \models\analizator as analizator;

	class siteparser extends system{
		protected $title = 'Парсим url\'ы';
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		protected $data = [/*
 				$url => [
 					$info => [val1,val2...]
 				]
 		*/]; //Вся собранная информация
		private $stat;
		private $process_name = 'siteparser';
		public $i = 0;

		public function __construct(){
			parent::__construct();
			$this->stat = new stat($this->process_name);
		}

		public function action_index(){
				echo 'index';
			//Проверяем запущен ли процесс парсинга
			if ($this->stat->isWorked()) {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: stat"); 
				exit(); 
			}

			$this->startSiteParsing();
		}
		function startSiteParsing(){
				while (true){
						$urls = $this->db->GetLinks(10);
						if (count($urls) == 0) {
								$this->stat->setData('error', 'Кончились адреса сайтов');
								break;
						}
						foreach ($urls as $url) {
								$c = new curl($url);
								$c->follow(true);
								$data = $c->request("/");
								$anal = new analizator($data);
								$this->data[$url] = $anal->getData();
						}

						v($this->data);
						die("\nthe end\n");
				}
		}
		protected function render($action){
    	if (!$this->ajax) {
	      switch($action){
  		    case 'action_index':
          	$inner = view::template('parser/v_sites.php', ['data' => $this->data, 'title' => $this->title]);
            break;
          default:
            $inner = '';
          }

          $content = view::template('v_main.php', ['title' => $this->title, 'content' => $inner, 'js_vars' => $this->js_vars, 'scripts' => $this->scripts]);
          echo $content;
			} else {
        	echo json_encode($this->data);
			}
		}
	}
}