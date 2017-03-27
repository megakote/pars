<?php

namespace controllers{
    use \models\curl as curl;

    class towns extends viewer{
        /* public function __construct(){
        } */
    
        public function action_index(){
            $this->title = 'Парсим города';
            $this->length = $this->db->select("SELECT count(*) as cnt FROM towns")[0]['cnt'];
        }
        
        public function action_parser($file = 'test'){
            $headers = array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3'
            );
            
            $c = curl::app('http://www.tripadvisor.ru')
                             ->headers(1)
                             ->referer('http://www.google.com')
                             ->agent('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0')
                             ->add_headers($headers);
            
            $towns = $this->db->select("SELECT * FROM towns");
            $stat = array('all' => count($towns), 'done' => 0, 'starttime' => time());
            
            foreach($towns as $town){
                $res = $c->request('/TypeAheadJson?query='.urlencode($town['name']).'&action=API&startTime=1444180767857&uiOrigin=GEOSCOPE&source=GEOSCOPE&types=geo&neighborhood_geos=false&link_type=geo%2Chotel%2Cvr%2Cattr%2Ceat%2Cflights_to%2Cnbrhd&details=true&max=12');
                file_put_contents('data/b/' . $town['id_town'], $res['html']);
                $stat['done']++;
                // if($stat['done'] % 10 == 0)
                // 
                file_put_contents($file, json_encode($stat));
            }
        }
    }
}