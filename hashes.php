<?php require_once 'global.php' ?>
<?php
	$sha512 = " ";
	$hmac = " ";
	$compara = array();

	if ($_POST['texto']) {
		$texto = $_POST['texto'];
		$comparacao = $_POST['comparacao'];
		$sha512 = crypt($texto, '$6$rounds=5000$palimpsest$');
		$hmac = hash_hmac('sha256', $texto, 'kryptos');
		$salt = "Z3OMUWQg2C9dyN0wRpws";
		$blowfish = crypt($texto, '$2a$07$'.$salt.'$');

		if ($comparacao) {
			$compara[0] = array("SHA512", ($comparacao === $sha512));
			$compara[1] = array("HMAC", ($comparacao === $hmac));
			$compara[2] = array("Blowfish", ($comparacao === $blowfish));
		}
	}
?>

<?php require_once 'cabecalho.php' ?>

<h2>Hashes</h2>
<div class="row">
	<div class="col-md-8">
		<form method="post">
			<div class="form-group">
				<label for="texto">Texto</label>
				<textarea rows="3" class="form-control" name="texto" id="texto" autofocus><?= $texto ?></textarea>
			</div>
			<div class="form-group">
				<label for="comparacao">Hash de Comparação</label>
				<textarea rows="3" class="form-control" name="comparacao" id="comparacao" autofocus><?= $comparacao ?></textarea>
			</div>
			<input type="submit" class="btn btn-success col-md-2" value="Criptografar" name="criptografar">
		</form>

		<div class="form-group">
			<label>SHA512</label>
			<textarea rows="3" class="form-control" readonly><?= $sha512 ?></textarea>
		</div>
		<div class="form-group">
			<label>HMAC</label>
			<textarea rows="3" class="form-control" readonly><?= $hmac ?></textarea>
		</div>
		<div class="form-group">
			<label>Blowfish</label>
			<textarea rows="3" class="form-control" readonly><?= $blowfish ?></textarea>
		</div>
	</div>
	<div class="col-md-4">
		<label>Comparação</label>
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Hash Gerado</th>
					<th>Hash do Usuário</th>
				</tr>
			</thead>
			<?php if ($compara): ?>
				<tbody>
					<?php foreach ($compara as $item): ?>
						<tr <?= ($item[1]) ? 'class="table-success"' : "" ?>>
							<td><?= $item[0] ?></td>
							<td><?= ($item[1]) ? 'Igual' : 'Diferente' ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			<?php endif ?>
		</table>
	</div>
</div>

<?php require_once 'rodape.php' ?>