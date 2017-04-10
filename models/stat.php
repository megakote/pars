<?php

namespace models{
	class stat {
		private $who;
		private $file = VIEWER_DIR .'stat.txt';
		private $data = [];

		function __construct($who){
			$this->who = $who;
		}

		private function writeData(){
			$this->data["last_mod"] = time();
			$data[$this->who] = $this->data;
			$f = fopen($this->file, 'w+');
			$data = json_encode($data);
			fwrite($f, $data);
			fclose($f);
		}

		private function readData(){
			$data = file_get_contents($this->file);
			$this->data = json_decode($data, true)[$this->who];
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
			if ((time() - $this->data["last_mod"]) < TIMEOUT_WORK) {
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