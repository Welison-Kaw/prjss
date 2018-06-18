<?php

class Cesar implements Criptografia {
	private $chave = 3;

	public function criptografar($texto) {
		$ret = "";
		foreach (str_split($texto) as $letra) {
			$letra = chr(ord($letra)+$this->chave);
			$ret .= (ctype_alpha($letra)) ? $letra : chr(ord($letra)-26);
		}
		return $ret;
	}

	public function descriptografar($texto) {
		$ret = "";
		foreach (str_split($texto) as $letra) {
			$letra = chr(ord($letra)-$this->chave);
			$ret .= (ctype_alpha($letra)) ? $letra : chr(ord($letra)+26);
		}
		return $ret;
	}
}

?>