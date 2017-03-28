<?php  

namespace models\dataforparse {
	/**
	*  Модель парсинга с яндекса через xml
	*/
	use \models\curl as curl;
	class yandex {
		public $data = '';
		private $c = '';

		protected $page = 0;

		function __construct(){            
            $this->c = curl::app('https://yandex.ru/search')->config_load('trip.cfg');
                             
		}

		public function GetContent($query, $pages=10){

			if(DEBUG){
				return file_get_contents('data/yapost.xml');
			}

			for ($i=0; $pages >= $i; $i++) { 
				$this->data .= $this->c->request('/xml?user='.YA_USER.'&key='.YA_KEY.'&lr=213&query='.urlencode($query).'&lr=38&l10n=ru&sortby=tm.order%3Dascending&filter=none&groupby=attr%3D%22%22.mode%3Dflat.groups-on-page%3D100.docs-in-group%3D1&page='.$this->page);
			}

			return $this->data;

		}
		static function make_hash($str, $salt = '', $l = 8){
		    return hexdec(substr(md5($str . $salt), 0, $l));
		}
	}
}

