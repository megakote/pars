<?php

namespace models{
	class stat {
		private $file = VIEWER_DIR .'stat.txt';
		private $data = [];
		private static $instance;

		public static function app() {
			if (self::$instance == null) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct(){
			$this->setData('stop', false);
		}

		private function writeData(){
			$this->data['last_mod'] = time();
			$f = fopen($this->file, 'w+');
			$data = json_encode($this->data);
			fwrite($f, $data);
			fclose($f);
		}

		private function readData(){
			$data = file_get_contents($this->file);
			$this->data = json_decode($data, true);			
		}

		private function setUpdate(){
			$this->readData();			
			$this->writeData();
		}

		public function setData($key,$val){
			$this->readData();
			$this->data[$key] = $val;			
			$this->writeData();
		}

		public function getData($key){
			$this->readData();
			return $this->data[$key];
		}

		public function isWorked(){
			$this->readData();
			if ((time() - $this->data['last_mod']) < TIMEOUT_WORK) {
				return true;
			}
			return false;
		}

		public function needStop(){
			$this->readData();
			return $this->data['stop'];
		}
	}
}