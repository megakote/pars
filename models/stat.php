<?php

namespace models{
	class stat {
		private $who;
		private $file = VIEWER_DIR .'stat.txt';
		private $data = [/*
							'status' 	=> str,
							'last_mod'	=> int,
							'error'		=> str,
							'pars_iteration' => int,

						*/];

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
			$data = json_decode(file_get_contents($this->file), true);
			$this->data = $data[$this->who];
		}

		private function setUpdate(){
			$this->readData();
			$this->writeData();
		}
		private function setPause(){
			$this->setData('status','pause');
			sleep(PAUSE_TIME);
			$this->setData('status','on');
		}

		public function setData($key,$val){
			$this->readData();
			$this->data[$key] = $val;
			if ($key == 'error') {
				$this->data['status'] = 'off';
				$this->data["last_mod"] -= TIMEOUT_WORK;
			}
			$this->writeData();
		}

		public function getData($key){
			$this->readData();
			if ($key == 'all') {
				return $this->data;
			}
			return $this->data[$key];
		}

		public function isWorked(){
			$this->readData();
			if ((time() - $this->data["last_mod"]) < TIMEOUT_WORK) {
				$this->setData('status','on');
				return true;
			}
			$this->setData('status','off');
			return false;
		}

		public function needStop(){
			$this->readData();
			if ($this->data['stop'] === true) {
				return true;
			}
			return false;
		}
	}
}