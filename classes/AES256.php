<?php

class AES256 implements Criptografia {
	private $salt = "huPKSUUj1345lMeSWPWE";
	private $pass = "r5V0hv9n31Q";
	private $metodo = "AES-256-CBC";
	private $ivText = "s45Rkg8AFD3uy5R8ctbC";

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