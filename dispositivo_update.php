<?php require_once 'global.php' ?>
<?php
	try {
		$id = $_GET['id'];
		$dispositivo = new Dispositivo($id);
		$tipo = Tipo::select();
	} catch (Exception $e) {
		echo "<h1>$e</h1>";
	}
?>

<?php require_once 'cabecalho.php' ?>

	<div class="row">
		<div class="col-sm-6">
			<h2>Ediçao de Dispositivo</h2>
		</div>
	</div>
	<form method="post">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input name="hostname" class="form-control" id="hostname" placeholder="" type="text" value="<?= $dispositivo->hostname ?>">
				</div>
				<div class="form-group">
					<label for="ip">IP</label>
					<input name="ip" class="form-control" id="ip" placeholder="xxx.xxx.xxx.xxx" type="text" value="<?= $dispositivo->ip ?>">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo</label>
					<select class="form-control" name="tipo_id">
						<option value=""></option>
						<?php foreach ($tipo as $row): ?>
							<?php $selected = ($row['id'] == $dispositivo->tipo_id) ? 'selected=selected' : ''; ?>
							<option <?= $selected ?> ><?= $row['nome'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="fabricante">Fabricante</label>
					<input name="fabricante" class="form-control" id="fabricante" placeholder="Nome do fabricante" type="text" value="<?= $dispositivo->fabricante ?>">
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-6"><input type="submit" class="btn btn-success btn-block" value="Salvar"></div>
						<div class="col-md-6"><a href="/dispositivos.php" class="btn btn-danger btn-block">Cancelar</a></div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php require_once 'rodape.php' ?>