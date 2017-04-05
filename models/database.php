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
		public function GetCounts($from){
			return $this->db->select("SELECT count(*) as cnt FROM $from")[0]['cnt'];
		}
		//Получаем список запросов
		public function GetQuerys($count=false) {
			if(!DEBUG){
				return [
						'Интернет магазин строительных материалов',
						'Интернет магазин цветов',
						'дешевый интернет магазин'
					];
			}

			$q = [];
			if ($count) {
				$querys = $this->db->select('SELECT val as val FROM querys WHERE used IS NULL LIMIT ' .$count);
			} else {
				$querys = $this->db->select('SELECT val as val FROM querys WHERE used IS NULL');
			}
			
			foreach ($querys as $query) {
				$q[] = $query['val'];
			}
			return $q;
		}
		//Добавляем в базу список запросов
		public function AddQuerys($querys, $delimiter = ',') {

			$querys = explode($delimiter, $querys);
			$q = [];
			foreach ($querys as $query) {
				if ($query == ''){
					continue;
				}
				$query = ['val' => $query];
				$q[] = $this->db->insert('querys', $query);
			}

			return $q;
		}
		//Удаляем записи по ИД
		public function DelQuerys($id){
			$id = explode(',', $id);
			foreach ($id as $id) {
				$this->db->delete('querys', 'id = '.$id);
			}
		}
		public function SetUsed($query){
			$this->db->update('querys', ['used' => true], "query = ".$query);
		}
	}
}