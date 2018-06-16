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

	public static function selectTipo($tipo_id) {
		$query = "SELECT id, hostname, ip, fabricante from DISPOSITIVO WHERE tipo_id = :tipo_id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':tipo_id', $tipo_id);
		$stmt->execute();
		return $stmt->fetchAll();
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

	public function insert() {
		$query = "INSERT INTO DISPOSITIVO (hostname, ip, tipo_id, fabricante) 
					VALUES (:hostname, inet_aton(:ip), :tipo_id, :fabricante) ";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':hostname',$this->hostname);
		$stmt->bindValue(':ip',$this->ip);
		$stmt->bindValue(':tipo_id',$this->tipo_id);
		$stmt->bindValue(':fabricante',$this->fabricante);
		$stmt->execute();
	}

	public function update() {
		$query = "UPDATE DISPOSITIVO SET
					hostname = :hostname,
					ip = inet_aton(:ip),
					tipo_id = :tipo_id,
					fabricante = :fabricante
				WHERE id = :id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id',$this->id);
		$stmt->bindValue(':hostname',$this->hostname);
		$stmt->bindValue(':ip',$this->ip);
		$stmt->bindValue(':tipo_id',$this->tipo_id);
		$stmt->bindValue(':fabricante',$this->fabricante);
		$stmt->execute();
	}

	public function delete() {
		$query = "DELETE FROM DISPOSITIVO WHERE id = :id";
		$conn = Conn::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
	}
}