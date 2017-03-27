<?php

namespace controllers{
	use \models\view as view;

	class viewer extends system{
		protected $title = '';
		protected $length = array();
		protected $scripts = array('jquery-1.11.3.min', 'viewer');
		protected $js_vars = array();
		protected $dir = 'noname';
		
		public function __construct(){
		   $tmp = explode('\\', get_class($this));
		   $this->dir = $tmp[count($tmp) - 1];
		   $this->js_vars['c'] = $this->dir;
		}
		
		public function action_index(){}
		public function action_parser($file = 'test'){}
		
		public function action_process(){
			$file = VIEWER_DIR . $this->dir . '/' . $this->params[2];
			
			if($this->params[2] == '' || !file_exists($file))
				die('404');
			
			set_time_limit(0);
			$this->action_parser($file);
		}
		
		public function action_token(){
			$folder = VIEWER_DIR . $this->dir;
			
			if(!is_dir($folder))
				mkdir($folder, 0777);
		
			$token = md5(uniqid(rand(),1));
			$path = $folder . '/' . $token;
			
			while(file_exists($path))
				$path = $folder . '/' . $token;
			
			$stat = array('all' => '?', 'done' => '0', 'starttime' => time());
			file_put_contents($path, json_encode($stat));
			die($token);
		}
		
		public function action_stat(){
			$file = VIEWER_DIR . $this->dir . '/' . $this->params[2];
			
			if($this->params[2] == '' || !file_exists($file))
				die('404');
			
			$this->title = 'Парсинг: ' . $this->params[2];
			$this->js_vars['token'] = $this->params[2];
			$this->data = json_decode(file_get_contents($file), true);
		}
		
		public function action_ajaxstat(){
			$file = VIEWER_DIR . $this->dir . '/' . $this->params[2];
			
			if($this->params[2] == '' || !file_exists($file))
				$res = array('err' => '404');

			$res = file_get_contents($file);
			die($res);
		}
		
		public function action_ajaxstop(){
			//
		}
		
		protected function render($action){
			switch($action){
				case 'action_index':
					$inner = view::template('parser/v_viewer_index.php', array('length' => $this->length, 'title' => $this->title));
					break;
				case 'action_stat':
					$inner = view::template('parser/v_viewer_stat.php', array('data' => $this->data, 'title' => $this->title));
					break;
				default:
					$content = '';
			}
			
			$content = view::template('v_main.php', array('title' => $this->title, 'content' => $inner, 'js_vars' => $this->js_vars, 'scripts' => $this->scripts));
			echo $content;
		}
	}
}