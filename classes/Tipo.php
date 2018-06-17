<?php

require_once 'classes/Conexao.php';

class Tipo {
	public $id;
	public $nome;
	public $dispositivos;

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
		$query = "SELECT 
					id as id,
					nome as nome
				FROM TIPO
				WHERE id = :id";

		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();

		$row = $stmt->fetch();
		$this->nome = $row['nome'];
	}

	public function insert() {
		$query = "INSERT TIPO (nome) VALUES (:nome)";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->execute();
	}

	public function update() {
		$query = "UPDATE TIPO SET nome = :nome WHERE id = :id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->execute();
	}

	public function delete() {
		$query = "DELETE FROM TIPO WHERE id = :id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
	}

	public function selectDispositivos() {
		$this->dispositivos = Dispositivo::selectTipo($this->id);
	}
}

?>