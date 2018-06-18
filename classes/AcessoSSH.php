<?php

class AcessoSSH {
	private $connection;
	private $result;

	public function getConnection() {
		return $this->connection;
	}

	public function connect($ip) {
		$this->connection = ssh2_connect($ip);
	}

	public function login($login, $pass) {
		return ssh2_auth_password($this->connection, $login, $pass);
	}

	public function exec($command) {
		$stream = ssh2_exec($this->connection, $command);
		stream_set_blocking($stream, true);
		$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
		return str_replace("\n", "<br />", stream_get_contents($stream_out));
	}
}

?>