<?php

namespace controllers{
    use \models\curl as curl;
    use \models\parser as parser;
    use \models\anticapcha as anticapcha;

    class capcha extends viewer{
        private $spam;
    
        public function __construct(){
            $this->dir = 'capcha';
            $this->js_vars['c'] = $this->dir;
            $this->spam = 10;
        }
    
        public function action_index(){
            $this->title = 'Добавляем комменты';
            $this->length = $this->spam;
        }
        
        public function action_parser($file = '1'){
            $stat = array('all' => $this->spam, 'done' => 0, 'starttime' => time());
            
            $c = curl::app('http://php2')
                             ->headers(1)
                             ->follow(1)
                             ->cookie('1.txt');
                
            $message = array('name' => 'Бот', 'text' => 'Ура!!!!! Ура!!!!! Ура!!!!! Ура!!!!! Ура!!!!!', 'captcha' => '');
            
            for($i = 0; $i < $this->spam; $i++){
                $data = $c->post(false)->request('captcha/index.php');
                $p = parser::app($data['html']);
                $p->moveTo('<img');
                $p->moveAfter('base64,');
                $base64 = $p->readTo('"');
                
                /* 
                    для варианта с файлом под капчу
                    считаваем src
                    обращаемся по src
                    base64_encode к результату
                */
                
                $res = anticapcha::app()->load($base64);
                $message['captcha'] = $res;
                $done = $c->post($message)->request('captcha/index.php'); 
                //file_put_contents('data/c/' . $i . '.html', $done['html']);
                
                $stat['done']++;
                file_put_contents($file, json_encode($stat));
               
               unset($p);
            }
        }
    }
}