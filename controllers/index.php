<?php 

namespace controllers {
	use \models\view as view;

	class index extends system {

		protected $title = 'Главная страница';
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];

		private function __construct(){
			
		}

		protected function render($action){
			
			$inner = view::template('parser/v_index.php', ['title' => $this->title]);
			$content = view::template('v_main.php', ['title' => $this->title, 'content' => $inner, 'js_vars' => $this->js_vars, 'scripts' => $this->scripts]);
			echo $content;
			
		}
	}
}