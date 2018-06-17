<?php require_once 'global.php' ?>
<?php
	try {
		if ($_GET['id']) {
			$id = $_GET['id'];
			$dispositivo = new Dispositivo($id);
			$action = "dispositivo_update.php";
			$titulo  = "Edição de Dispositivos";
		} else {
			$dispositivo = new Dispositivo();
			$action = "dispositivo_insert.php";
			$titulo  = "Inserção de Dispositivos";
		}
		$tipo = Tipo::select();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>

<?php require_once 'cabecalho.php' ?>

	<div class="row">
		<div class="col-sm-6">
			<h2><?= $titulo ?></h2>
		</div>
	</div>
	<form method="post" action="<?= $action ?>">
		<input type="hidden" name="id" value="<?= $dispositivo->getId() ?>">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input name="hostname" class="form-control" id="hostname" placeholder="" type="text" value="<?= $dispositivo->getHostname() ?>" required autofocus>
				</div>
				<div class="form-group">
					<label for="ip">IP</label>
					<input name="ip" class="form-control" id="ip" placeholder="xxx.xxx.xxx.xxx" type="text" value="<?= $dispositivo->getIp() ?>" required pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo</label>
					<select class="form-control" name="tipo_id" required>
						<option value=""></option>
						<?php foreach ($tipo as $row): ?>
							<?php $selected = ($row['id'] == $dispositivo->getTipo_id()) ? 'selected=selected' : ''; ?>
							<option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="fabricante">Fabricante</label>
					<input name="fabricante" class="form-control" id="fabricante" placeholder="Nome do fabricante" type="text" value="<?= $dispositivo->getFabricante() ?>" required>
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