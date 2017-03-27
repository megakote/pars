<?php
// Класс для работы с сервисом anti-captcha.com
namespace models{
    class anticapcha{
        private static $instance;
        private $timeout = 3;
        private $curl;
        const KEY = '407caa36a3b3662ea59c4d58c6ef32de';
        
        public static function app() {
            if (self::$instance == null) {
                self::$instance = new self();
            }

            return self::$instance;
        }
        
        protected function __construct(){
            $this->c = curl::app('http://anti-captcha.com');
        }
        
        public function load($base64){
            $this->c->post(array('key' => self::KEY, 'method' => 'base64', 'body' => $base64));
            $html = $this->c->request('in.php')['html'];
            
            //file_put_contents('1', $html);
            
            if(strpos($html, 'OK|') === 0){
                $id = substr($html, 3);
                //file_put_contents('2', $id);
                $res = $this->process($id);
                
                if(strpos($res, 'OK|') === 0)
                    return substr($res, 3);
            }
            
            return false;
        }
        
        private function process($id){
            $res = 'CAPCHA_NOT_READY';
            $this->c->post(array('key' => self::KEY, 'action' => 'get', 'id' => $id));
            //file_put_contents('3', json_encode(array('key' => self::KEY, 'action' => 'get', 'id' => $id));
            while($res == 'CAPCHA_NOT_READY'){
                sleep($this->timeout);
                $res = $this->c->request('res.php')['html'];
            }
            
            return $res;
        }
    }
}