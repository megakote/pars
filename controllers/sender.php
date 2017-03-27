<?php

namespace controllers{
    use \models\view as view;

    class sender extends system{
        protected $title = '';
        protected $data = array();
        protected $scripts = array('jquery-1.11.3.min', 'sender');
        protected $js_vars = array();
        
        public function action_index(){
            $this->action_data();
        }
        
        public function action_data(){}
        public function action_one(){}
        
        protected function render($action){
            switch($action){
                case 'action_index':
                case 'action_data':
                    $this->js_vars['data'] = $this->data;
                    $inner = view::template('parser/v_sender.php', array('data' => $this->data, 'title' => $this->title));
                    $content = view::template('v_main.php', array('title' => $this->title, 'content' => $inner, 'js_vars' => $this->js_vars, 'scripts' => $this->scripts));
                    break;
                case 'action_one':
                    $content = $this->data;
                    break;
                default:
                    $content = '';
            }
            
            echo $content;
        }
    }
}