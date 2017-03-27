<?php

namespace controllers{
    use \models\curl as curl;

    class countries1 extends sender{
        public function action_data(){
            $this->title = 'Парсим города 1';
            $this->data = $this->db->select("SELECT * FROM towns");
            $this->js_vars['c'] = 'countries1';
        }
        
        public function action_one(){
            $this->data = $_POST['name'];
        }
    }
}