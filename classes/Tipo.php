<?php

require_once 'classes/Conexao.php';

class Tipo {
	public $id;
	public $nome;

	public function __construct($id = false) {
		if ($id) {
			$this->id = $id;
			$this->load();
		}
	}

	public static function select() {
		$query = "SELECT 
					id as id,
					nome as nome
				FROM TIPO";

		$conn = Conn::getConn();
		$result = $conn->query($query);

		$ds = $result->fetchAll();
		return $ds;
	}

	public function load() {

	}
}

?>