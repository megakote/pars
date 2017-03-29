<?php

namespace models{
// TODO: Либо уйти от синглтона, либо организовать нормальную иерархию классов.
	class database {
		public $db;
		public function __construct() {
			$this->db = \models\sql::app();
		}

		//Получаем список запросов
		public function GetQuerys() {
			if(!DEBUG){
				return [
						'Интернет магазин строительных материалов',
						'Интернет магазин цветов',
						'дешевый интернет магазин'
					];
			}

			$q = [];
			$querys = $this->db->select("SELECT val as val FROM querys");
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
	}
}