<?php

namespace controllers{
	abstract class System{
        protected $db;
        protected $params;

        protected abstract function render($action);
        
		public function request($action, $params = []){
			$this->db = \models\sql::app();
			$this->params = $params;
            $this->$action();
            $this->render($action);
		}
        
        public function __call($name, $params){
            echo '404';
        }
	}
}