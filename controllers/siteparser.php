<?php 
//Еще на запущен
namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;

	class siteparser extends system{
		protected $title = 'Парсим список url\'ов';
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		public $link = [];
		public $data = [];
		private $stat;
		public $i = 0;

		public function __construct(){
			parent::__construct();
			$this->stat = new stat($this->process_name);
		}

		public function action_index(){
			//Проверяем запущен ли процесс парсинга
			if ($this->stat->isWorked()) {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: stat"); 
				exit(); 
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