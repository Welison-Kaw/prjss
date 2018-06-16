<?php

require_once 'classes/Conexao.php';

class Dispositivo {
	public $id;
	public $hostname;
	public $ip;
	public $tipo_id;
	public $fabricante;

	public function __construct($id = false) {
		if ($id) {
			$this->id = $id;
			$this->load();
		}
	}

	public static function select() { 
		$query = "SELECT 
					d.id as id,
					d.hostname as hostname,
					inet_ntoa(d.ip) as ip,
					d.tipo_id as tipo_id,
					t.nome as tipo_nome,
					d.fabricante as fabricante 
				FROM DISPOSITIVO d
				INNER JOIN TIPO t ON d.tipo_id = t.id ";

		$conn = Conn::getConn();
		$result = $conn->query($query);

		$ds = $result->fetchAll();
		return $ds;
	}

	public function load() {
		$query = "SELECT 
					id as id,
					hostname as hostname,
					inet_ntoa(ip) as ip,
					tipo_id as tipo_id,
					fabricante as fabricante 
				FROM DISPOSITIVO
				WHERE id = :id";

		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();

		$row = $stmt->fetch();
		$this->hostname = $row['hostname'];
		$this->ip = $row['ip'];
		$this->tipo_id = $row['tipo_id'];
		$this->fabricante = $row['fabricante'];
	}

	public function update() {

	}

	public function delete() {
		$query = "DELETE FROM DISPOSITIVO WHERE id = :id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
		//echo $query;
	}
}