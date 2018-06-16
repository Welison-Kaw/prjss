<?php

require_once 'classes/Conexao.php';

class Dispositivo {
	public $id;
	public $hostname;
	public $ip;
	public $tipo;
	public $fabricante;

	public function listar() { 
		$query = "SELECT id as id, hostname as hostname, inet_ntoa(ip) as ip, tipo_id as tipo, fabricante as fabricante FROM DISPOSITIVO";
		$conn = Conn::getConn();
		$result = $conn->query($query);
		$ds = $result->fetchAll();
		/*foreach ($ds as $row) {
			$this->id = $row['id'];
			$this->hostname = $row['hostname'];
			$this->ip = $row['ip'];
			$this->tipo = $row['tipo'];
			$this->fabricante = $row['fabricante'];
		}*/
		return $ds;
	}
}