<?php

namespace models{

		use \models\parser as parser;

    class analizator {
    		protected $header;	// header страницы.
    		protected $content; // body страницы.
    		protected $data = [/*
    				'emails' => ['xxx@ya.ru','yyy@ya.ru'],
 						'phones' => ['8-999-666-11-11','8-999-222-11-11']
				*/];

				/**
				* analizator constructor.
				* @param array $data
				*/
				public function __construct($data){
						$this->header = new parser($data['header']);
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
						$emails = [];
						$body = $this->content;
						$body->def();
						while (true){
								if ($body->moveTo("mailto:") == -1)
										break;
								$email = $body->readTo("'");
								if ($email == -1){
										$email = $body->readTo("\"");
								}
								$emails[] = $email;
						}
						$pattern = "/(?:[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])?\.)+[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[A-Za-z0-9-]*[A-Za-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
						//$pattern = "^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$";

						$text = $body->str;
						//filter_var($text, FILTER_VALIDATE_EMAIL)
						preg_match_all($pattern, $text, $result);
						$r = array_unique(array_map(function ($i) { return $i; }, $result));
						array_walk_recursive($r, function ($item, $key) {
								$this->data['email'][] = $item;
						});
				}

				/**
				 * Обрабатывает все что есть в $this->data;
				 */
				private function validateData(){

				}
				public function getData(){
						$this->validateData();
						return $this->data;
				}
		}
}