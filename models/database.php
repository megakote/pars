<?php

namespace models{
// TODO: Либо уйти от синглтона, либо организовать нормальную иерархию классов.
	class database {
		public $db;
		public function __construct() {
			$this->db = \models\sql::app();
		}

		//Добавляем урлы
		public function AddUrls($urls){
			$this->db->insert('urls', $urls);
		}
		//Получаем количество урлов
		public function GetCounts(){
			return $this->db->select("SELECT count(*) as cnt FROM urls")[0]['cnt'];
		}
		//Получаем список запросов
		public function GetQuerys($count=10) {
			if(DEBUG){
				return [
						'Интернет магазин строительных материалов',
						'Интернет магазин цветов',
						'дешевый интернет магазин'
					];
			}

			$q = [];
			//TODO: нужны тесты
			$querys = $this->db->select('SELECT val as val FROM querys WHERE used != NULL LIMIT ' .$count);
			foreach ($querys as $query) {
				$q[] = $query['val'];
			}
			return $q;
		}
		//Добавляем в базу список запросов
		public function AddQuerys($querys, $delimiter = ',') {

			$querys = explode($delimiter, $querys);
			foreach ($querys as $query) {
				$query = ['val' => $query];
				$this->db->insert('querys', $query);
			}

		}

		public function SetUsed($query){
			$this->db->update('querys', ['used' => true], "query = ".$query)
		}
	}
}