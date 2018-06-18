<?php require_once 'global.php' ?>

<?php

if ($_POST['texto']) {
	$texto = $_POST['texto'];

	$cesar = "";
	$aes256 = "";
	$camellia = "";

	$c = new Criptografador();
	if ($_POST['criptografar']) {
		$aes256 = $c->criptografar($texto, new AES256());
		$cesar = $c->criptografar($texto, new Cesar());
		$camellia = $c->criptografar($texto, new Camellia());
	} elseif ($_POST['descriptografar']) {
		$aes256 = $c->descriptografar($texto, new AES256());
		$cesar = $c->descriptografar($texto, new Cesar());
		$camellia = $c->descriptografar($texto, new Camellia());
	}
}

?>

<?php require_once 'cabecalho.php' ?>

<form method="post">
	<h2>Criptografia</h2>
	<div class="form-group">
		<label for="texto">Texto</label>
		<textarea rows="3" class="form-control" name="texto" id="texto" autofocus><?= $texto ?></textarea>
	</div>
	<input type="submit" class="btn btn-success col-md-2" value="Criptografar" name="criptografar">
	<input type="submit" class="btn btn-primary col-md-2" value="Descriptografar" name="descriptografar">
</form>

<div class="form-group">
	<label for="texto">Cifra de César</label>
	<textarea rows="3" class="form-control" readonly><?= $cesar ?></textarea>
</div>
<div class="form-group">
	<label for="texto">AES256</label>
	<textarea rows="3" class="form-control" readonly><?= $aes256 ?></textarea>
</div>

<div class="form-group">
	<label for="texto">Camellia</label>
	<textarea rows="3" class="form-control" readonly><?= $camellia ?></textarea>
</div>

<?php require_once 'rodape.php' ?>