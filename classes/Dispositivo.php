<?php

require_once 'classes/Conexao.php';

class Dispositivo {
	public $id;
	public $hostname;
	public $ip;
	public $tipo;
	public $fabricante;

	public function __construct($id = false) {
		if ($id) {
			$this->id = $id;
			$this->load();
		}
	}

	public static function select() { 
		$query = "SELECT 
					id as id,
					hostname as hostname,
					inet_ntoa(ip) as ip,
					tipo_id as tipo,
					fabricante as fabricante 
				FROM DISPOSITIVO";

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
					tipo_id as tipo,
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
		$this->tipo = $row['tipo'];
		$this->fabricante = $row['fabricante'];
	}
}