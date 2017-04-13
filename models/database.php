<?php

namespace models{

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
				$querys = $this->db->select('SELECT val,id FROM querys WHERE used IS NULL LIMIT ' .$count);
			} else {
				$querys = $this->db->select('SELECT val,id FROM querys WHERE used IS NULL');
			}
			foreach ($querys as $query) {
				$q[$query['id']] = $query['val'];
			}
			return $q;

		}
		//Добавляем в базу список запросов, возвращаем айдишники этих запросов в базе. 
		public function AddQuerys($querys, $delimiter = ',') {

			$querys = explode($delimiter, $querys);
			$q = [];
			foreach ($querys as $query) {
				if ($query == ''){
					continue;
				}
				$arr = [];
				$arr['val'] = trim($query);
				$arr['hash'] = make_hash(trim($query));

				$q[] = $this->db->insert('querys', $arr);
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
		//Помечаем запрос как использованный (used)
		public function SetUsed($query){
			$this->db->update('querys', ['used' => 1], "querys.val = \"$query\"");
		}
		//Получаем список урлов
		public function GetQuerys($count=false) {
			if(!DEBUG){
				return [
						'ya.ru',
						'google.com',
						'lol.ru'
					];
			}

			$q = [];
			if ($count) {
				$querys = $this->db->select('SELECT url FROM urls WHERE used IS NULL LIMIT ' .$count);
			} else {
				$querys = $this->db->select('SELECT url FROM urls WHERE used IS NULL');
			}
			foreach ($querys as $query) {
				$q[] = $query['val'];
			}
			return $q;
		}
	}
}