<?php 

namespace controllers {
	use \models\view as view;	
	use \models\parser as parser;
	use \models\stat as stat;
	use \models\dataforparse\yandex as yandex;

	class sites extends system{

		private $stat;
		protected $title = 'Парсим список url\'ов';
		protected $length = [];
		protected $scripts = ['jquery-1.11.3.min', 'common'];
		protected $js_vars = [];
		protected $ajax = false;
		public $query = [];
		public $data = [];
		public $process_name = 'links_pars';


		public function __construct(){
			parent::__construct();
            $this->stat = new stat($this->process_name);
		}

		public function action_index(){
		}

		public function action_yandex(){
			if (!$this->stat->isWorked()) {
				$this->ajax = true;
				$c = new yandex();
				while (true) {
					$i = 0;
					$querys = $this->db->GetQuerys(5);

					if (count($querys) == 0) {
						$this->stat->setData('error', 'Кончились поисковые фразы');
						break;
					}

					foreach ($querys as $key => $query) {
						$data = $c->GetContent($query,2);
						$p = parser::app($data);
						$urls = [];
						while (true) {
							$data = $p->subtag_inner('<url', 'url');
							if ($data == -1)
								break;
							
							$data = parse_url($data);
							$hash = make_hash($data['host']);
							$urls = [
									'url'		=> $data['host'], 
									'protocol'	=> $data['scheme'],
									'froms'		=> 'yandex',
									'q_id'		=> $key,
									'hash' 		=> $hash
								];
							$this->db->AddUrls($urls);
							$this->stat->SetData('status', 'on');
							$i++;
						}
						$this->db->SetUsed($query);
						$this->stat->setData('pars_iteration', $i);
					}

					if ($this->stat->needStop()) {
						$this->stat->setData('stop', false);
						$this->stat->setData('error', 'Процесс был остановлен пользователем');
						break;
					}

				}
			}
		}
		public function action_stat(){
			$this->ajax = true;
			//TODO: Проще смержить два массива из stat->getdata и this->data
			$this->data['urls_count'] = $this->db->GetCounts('urls');
			$this->data['i'] = $this->stat->getData('pars_iteration');
			$this->data['worked'] = $this->stat->isWorked();
			$this->data['error'] = $this->stat->getData('error');
		}
		public function action_stop(){
			$this->ajax = true;
			$this->stat->setData('stop',true);
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