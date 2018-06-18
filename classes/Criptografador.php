<?php

class Criptografador {
	public function criptografar($texto, Criptografia $criptografia) {
		return $criptografia->criptografar($texto);
	}

	public function descriptografar($texto, Criptografia $criptografia) {
		return $criptografia->descriptografar($texto);
	}
}

?>