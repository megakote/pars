<?php

namespace models{

		use \models\parser as parser;

    class analizator {
    		protected $header;	// header страницы.
    		protected $content; // body страницы.
    		protected $data = [/*
    				'email' => [],
 						'phone' => []
				*/];

				/**
				* analizator constructor.
				* @param array $data
				*/
				public function __construct($data){
						$this->header = new parser($data['headers']);
    				$this->content = new parser($data['html']);

    				$methods = get_class_methods($this);
    				foreach ($methods as $method) {
    						if ($method == '__construct' || $method == 'getData' || $method == 'validateData'){
    								continue;
								}
								$this->$method();
    				}
    		}

				private function getPhone(){}

				private function getEmail(){
						$body = $this->content;
						$body->def();
						while (true){
								$cur = $body->moveAfter('mailto:');
								if ($cur === -1) {
										break;
								}
								//Выбираем какой символ встречается раньше.
								$pos = min($body->getPos('\''),$body->getPos('"'));
								$email = $body->readToPos($pos);
								if ($email == -1){
										$email = $body->readTo('"');
								}
								$this->data['email'][] = $email;
						}

						$pattern = "/\b([a-z0-9._-]+@[a-z0-9.-]+)\b/i";
						preg_match_all($pattern, trim($body->str), $matches);
						foreach($matches[0] as $key => $val) {
								$email = filter_var($val, FILTER_VALIDATE_EMAIL);
								if($email) {
										$this->data['email'][] = $email;
								}
						}
				}

				/**
				 * Получаем всю собранную инфу.
				 * @return array
				 */
				public function getData(){
						return $this->data;
				}
		}
}