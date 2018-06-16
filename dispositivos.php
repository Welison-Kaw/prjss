<?php require_once 'global.php' ?>
<?php
	try {
		$list = Dispositivo::select();
	} catch (Exception $e) {
		echo "<h1>$e</h1>";
	}
?>

<?php require_once 'cabecalho.php' ?>

	<?php if ($_SESSION['type'] == 'insert'): ?>
	<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php elseif ($_SESSION['type'] == 'delete'): ?>
	<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php elseif ($_SESSION['type'] == 'delete'): ?>
	<div class="alert alert-primary alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php endif ?>
	<div class="row justify-content-end">
		<div class="col-sm-8">
			<h2>Listagem de Dispositivos</h2>
		</div>
		<div class="col-sm-2">
			<button type="button" class="btn btn-success btn-block">Inserir</button>
		</div>
		<div class="col-sm-2">
			<a href="/dispositivos.php" class="btn btn-primary btn-block">Atualizar</a>
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
			<?php if (count($list) > 0): ?>
				<?php foreach ($list as $row): ?>
					<tr>
						<td><a href="/dispositivo_update.php?id=<?= $row['id'] ?>"><button class="btn btn-primary">Alterar</button></a></td>
						<td><a href="/dispositivo_delete.php?id=<?= $row['id'] ?>"><button class="btn btn-danger">Excluir</button></a></td>
						<td><?= $row['hostname'] ?></td>
						<td><?= $row['ip'] ?></td>
						<td><?= $row['tipo_nome'] ?></td>
						<td><?= $row['fabricante'] ?></td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr><td colspan="6" class="text-center">Nenhum dispositivo cadastrado</td></tr>
			<?php endif ?>
		</tbody>
	</table>

<?php require_once 'rodape.php'; ?>