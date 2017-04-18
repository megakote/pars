<?php

namespace models{
    class analizator {
    	protected $content; //Cама страница сайта.
    	protected $data = [];

    	public function __construct($data){
    		$this->content = $data;
    		$methods = get_class_methods($this);
    		foreach ($methods as $method) {
    				if ($method == '__construct' || $method == 'getData'){
    						continue;
						}
					$this->$method();
    		}
    	}

    	private function getPhone(){

    	}

    	private function getEmail(){
			$pattern = "/(?:[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])?\.)+[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[A-Za-z0-9-]*[A-Za-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
					//$pattern = "^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$";

					$text = $this->content;
					//filter_var($text, FILTER_VALIDATE_EMAIL)
					preg_match_all($pattern, $text, $result);
					$r = array_unique(array_map(function ($i) { return $i; }, $result));
					array_walk_recursive($r, function ($item, $key) {
							$this->data['email'][] = $item;
					});
			}
			public function getData(){
					return $this->data;
			}
		}
}