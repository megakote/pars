<?php

namespace controllers{
	abstract class System{
        public $db;
        protected $params;
        public $stat; 

        protected abstract function render($action);
        
        public function __construct(){
            $this->db = new \models\database();
            $this->stat = \models\stat::app();
        }

		public function request($action, $params = []){	
			$this->params = $params;
            $this->$action();
            $this->render($action);
		}
        
        public function __call($name, $params){
            echo "Не найден вызов метода '$name' "
             . implode(', ', $params). "\n";
        }
	}
}