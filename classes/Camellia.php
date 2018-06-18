<?php

class Camellia implements Criptografia {
	private $salt = "pxLj4jUfKSJ3l0juEZok";
	private $pass = "Ok2oZV8TNGt";
	private $metodo = "CAMELLIA-256-CBC";
	private $ivText = "IYO0U8J1WyTwaHvjYe5X";

	public function criptografar($texto) {
		$texto = $this->salt . $texto;
		$hash = substr(hash('sha256', $this->pass, true), 0, 32);
		$iv = substr(hash('sha256', $this->ivText), 0, 16);
		$cript = base64_encode(openssl_encrypt($texto, $this->metodo, $hash, OPENSSL_RAW_DATA, $iv));
		return $cript;
	}

	public function descriptografar($texto) {
		$hash = substr(hash('sha256', $this->pass, true), 0, 32);
		$iv = substr(hash('sha256', $this->ivText), 0, 16);
		$decript = openssl_decrypt(base64_decode($texto), $this->metodo, $hash, OPENSSL_RAW_DATA, $iv);
		return substr($decript, strlen($this->salt));
	}
}

?>