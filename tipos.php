<?php require_once 'global.php' ?>
<?php
	try {
		$list = Tipo::select();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>

<?php require_once 'cabecalho.php' ?>

	<?php if ($_SESSION['type'] == 'insert'): ?>
	<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php elseif ($_SESSION['type'] == 'delete'): ?>
	<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php elseif ($_SESSION['type'] == 'update'): ?>
	<div class="alert alert-primary alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php elseif ($_SESSION['type'] == 'warning'): ?>
	<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $_SESSION['message'] ?></div>
	<?php endif ?>
	<div class="row justify-content-end">
		<div class="col-sm-8">
			<h2>Listagem de Dispositivos</h2>
		</div>
		<div class="col-sm-2">
			<a href="/tipo_form.php" class="btn btn-success btn-block">Inserir</a>
		</div>
		<div class="col-sm-2">
			<a href="/tipos.php" class="btn btn-primary btn-block">Atualizar</a>
		</div>
	</div>
	<table class="table table-hover">
		<thead class="thead-light">
			<tr>
				<th></th>
				<th></th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($list) > 0): ?>
				<?php foreach ($list as $row): ?>
					<tr>
						<td><a href="/tipo_form.php?id=<?= $row['id'] ?>"><button class="btn btn-primary">Alterar</button></a></td>
						<td><a href="/tipo_delete.php?id=<?= $row['id'] ?>"><button class="btn btn-danger">Excluir</button></a></td>
						<td><?= $row['nome'] ?></td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr><td colspan="6" class="text-center">Nenhum tipo cadastrado</td></tr>
			<?php endif ?>
		</tbody>
	</table>

<?php require_once 'rodape.php'; ?>