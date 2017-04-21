<?php

namespace models{
	class stat {
		private $who;
		private $file = VIEWER_DIR .'stat.txt';
		private $data =[/*
							'status'					=> str,
							'last_mod'				=> int,
							'error'						=> str,
              'stop'						=> bool,
							'pars_iteration'	=> int,
		*/];

        /**
         * Устанавливаем название выполняемого скрипта, по которому будем его идентифицировать в будущем
         * @param string $who
         */
        function __construct($who){
					$this->who = $who;
				}

        /**
         *  Функция записывает данные из $this->data в файл
         */
        private function writeData(){
					$this->data["last_mod"] = time();
					$data[$this->who] = $this->data;
					$f = fopen($this->file, 'w+');
					$data = json_encode($data);
					fwrite($f, $data);
					fclose($f);
				}

        /**
         * Функция считывает данные из файла в $this->data
         */
        private function readData(){
					$data = json_decode(file_get_contents($this->file), true);
					$this->data = $data[$this->who];
				}

        /**
         * Функция обновляет время последней активности last_mod
         */
        private function setUpdate(){
					$this->readData();
					$this->writeData();
				}

        /**
         * Приостанавливает выполнение скрипта на PAUSE_TIME секунд
         */
        private function setPause(){
					$this->setData('status','pause');
					sleep(PAUSE_TIME);
					$this->setData('status','on');
				}

        /**
         * Устанаваливаем значение для текущей задачи
         * @param $key
         * @param $val
         */
        public function setData($key, $val){
					$this->readData();
					$this->data[$key] = $val;
					if ($key == 'error') {
						$this->data['status'] = 'off';
						$this->data["last_mod"] -= TIMEOUT_WORK;
					}
					$this->writeData();
				}

        /**
         * Получаем значение определенной статы или список всех статов со значениями
         * @param $key
         * @return array|mixed
         */
				public function getData($key){
					$this->readData();
					if ($key == 'all') {
						return $this->data;
					}
					return $this->data[$key];
				}

        /**
         * Проверяем работает ли сейчас скрипт в фоне
         * @return bool
         */
				public function isWorked(){
					$this->readData();
					if ((time() - $this->data["last_mod"]) < TIMEOUT_WORK) {
						$this->setData('status','on');
						return true;
					}
					$this->setData('status','off');
					return false;
				}

        /**
         * Проверяем была ли команда на остановку скрипта
         * @return bool
         */
        public function needStop(){
					$this->readData();
					if ($this->data['stop'] === true) {
						return true;
					}
					return false;
				}
		}
}