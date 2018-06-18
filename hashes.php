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
		if ($comparacao) {
			$compara[0] = ($comparacao == $sha512);
			$compara[1] = ($comparacao == $hmac);
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
					<tr <?= ($compara[0]) ? 'class="table-success"' : "" ?>>
						<td>SHA512</td>
						<td><?= ($compara[0]) ? 'Igual' : 'Diferente' ?></td>
					</tr>
					<tr <?= ($compara[1]) ? 'class="table-success"' : "" ?>>
						<td>HMAC</td>
						<td><?= ($compara[1]) ? 'Igual' : 'Diferente' ?></td>
					</tr>
				</tbody>
			<?php endif ?>
		</table>
	</div>
</div>

<?php require_once 'rodape.php' ?>