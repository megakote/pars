<?php 

namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;
	use \models\dataforparse\yandex as yandex;

	class querys extends system{		
		protected $title = 'Работа со списком запросов';
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		public $i = 0;

		public function action_index(){
			
		}
		public function action_add(){
			$this->ajax = true;
			echo implode(",", $this->db->AddQuerys($_POST["querys"],$_POST["delimiter"]));
		}
		public function action_show(){
			$this->ajax = true;
			echo $this->db->GetCounts('querys');
		}

		public function action_del(){
			$this->ajax = true;
			$this->db->DelQuerys($_POST["id"]);
		}

		//TODO: Добавить функцию удаления дубликатов.

		protected function render($action){
			if (!$this->ajax) {	

				switch($action){
					case 'action_index':
						$inner = view::template('parser/v_querys.php', ['title' => $this->title]);
						break;
					default:
						$inner = '';
				}
				
				$content = view::template('v_main.php', ['title' => $this->title, 'content' => $inner, 'js_vars' => $this->js_vars, 'scripts' => $this->scripts]);
				echo $content;
			}
		}
	}

}