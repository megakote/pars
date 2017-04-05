<?php 

namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;
	use \models\dataforparse\yandex as yandex;

	class sites extends system{

		protected $title = 'Парсим список url\'ов';
		protected $length = [];
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		public $query = [];
		public $data = [];
		public $i = 0;

		public function __construct(){
			parent::__construct();
			
		}

		public function action_index(){
			
		}

		public function action_yandex(){
			$this->ajax = true;
			$c = new yandex();
			while (true) {
				$query = $this->db->GetQuerys(5);
				foreach ($query as $query) {
					$data = $c->GetContent($query,2);
					$p = parser::app($data);
					$urls = [];
					$this->db->SetUsed($query);
					while (true) {
						$data = $p->subtag_inner('<url', 'url');
						if ($data == -1)
							break;
						
						$data = parse_url($data);
						$hash = $c::make_hash($data['host']);
						$urls = [
								'url'		=> $data['host'], 
								'protocol'	=> $data['scheme'], 
								'hash' 		=> $hash
							];
						$this->db->AddUrls($urls);
						$this->i++;
						if ($this->i > 10) {
							die();
						}
					}
				}
			}
		}
		public function action_stat(){
			$this->data['urls_count'] = $this->db->GetCounts('urls');
			$this->data['i'] = $this->i;
		}
		protected function render($action){
			if (!$this->ajax) {

				switch($action){
					case 'action_index':
						$inner = view::template('parser/v_sites.php', ['length' => $this->length, 'title' => $this->title]);
						break;
					case 'action_querys':
						$inner = view::template('parser/v_querys.php', ['title' => $this->title]);
						break;
					case 'action_stat':
						$inner = view::template('parser/v_viewer_stat.php', ['data' => $this->data, 'title' => $this->title]);
						$this->js_vars = ['stat' => false];
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