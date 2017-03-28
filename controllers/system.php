<?php

namespace controllers{
	abstract class System{
        protected $db;
        protected $params;

        protected abstract function render($action);
        
        protected function __construct(){
            $this->db = new \models\database();
        }

		public function request($action, $params = []){	
			$this->params = $params;
            $this->$action();
            $this->render($action);
		}
        
        public function __call($name, $params){
            echo '404';
        }
	}
}