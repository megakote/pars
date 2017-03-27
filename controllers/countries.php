<?php

namespace controllers{
    use \models\curl as curl;

    class countries extends sender{
        public function action_data(){
            $this->title = 'Парсим города';
            $this->data = $this->db->select("SELECT * FROM towns");
            $this->js_vars['c'] = 'countries'; // __CLASS__
        }
        
        public function action_one(){
            $headers = array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3'
            );
            
            $c = curl::app('http://www.tripadvisor.ru')
                             ->headers(1)
                             ->referer('http://www.google.com')
                             ->agent('Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0')
                             ->add_headers($headers);
            
            $res = $c->request('/TypeAheadJson?query='.urlencode($_POST['name']).'&action=API&startTime=1444180767857&uiOrigin=GEOSCOPE&source=GEOSCOPE&types=geo&neighborhood_geos=false&link_type=geo%2Chotel%2Cvr%2Cattr%2Ceat%2Cflights_to%2Cnbrhd&details=true&max=12');
            file_put_contents('data/a/' . $_POST['id_town'], $res['html']);
            $this->data = $_POST['name'];
        }
    }
}