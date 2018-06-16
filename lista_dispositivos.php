<?php require_once 'global.php' ?>
<?php
	try {
		$dispositivo = new Dispositivo();
		$list = $dispositivo->select();
		//$list = Dipositivo::select();
	} catch (Exception $e) {
		echo "<h1>$e</h1>";
	}
?>

<?php require_once 'cabecalho.php' ?>

	<div class="alert alert-success">Inserido com sucesso!</div>
	<div class="alert alert-danger">Excluído com sucesso!</div>
	<div class="alert alert-primary">Alterado com sucesso!</div>
	<div class="row justify-content-end">
		<div class="col-sm-8">
			<h2>Listagem de Dispositivos</h2>
		</div>
		<div class="col-sm-2">
			<button type="button" class="btn btn-success btn-block">Inserir</button>
		</div>
		<div class="col-sm-2">
			<a href="/lista_dispositivos.php" class="btn btn-primary btn-block">Atualizar</a>
		</div>
	</div>
	<table class="table table-hover">
		<thead class="thead-light">
			<tr>
				<th></th>
				<th></th>
				<th>Hostname</th>
				<th>IP</th>
				<th>Tipo</th>
				<th>Fabricate</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list as $row): ?>
				<tr>
					<td><a href="/edita_dispositivo.php?id=<?= $row['id'] ?>"><button class="btn btn-primary">Alterar</button></a></td>
					<td><a href="#"><button class="btn btn-danger">Excluir</button></a></td>
					<td><?= $row['hostname'] ?></td>
					<td><?= $row['ip'] ?></td>
					<td><?= $row['tipo'] ?></td>
					<td><?= $row['fabricante'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

<?php require_once 'rodape.php'; ?>