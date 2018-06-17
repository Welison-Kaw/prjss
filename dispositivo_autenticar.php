<?php require_once 'global.php' ?>
<?php
	try {
		$id = $_GET['id'];
		$dispositivo = new Dispositivo($id);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>

<?php require_once 'cabecalho.php' ?>

	<div class="row">
		<div class="col-sm-6">
			<h2>Autenticar Acesso</h2>
		</div>
	</div>
	<form method="post" action="<?= $action ?>">
		<input type="hidden" name="id" value="<?= $dispositivo->getId() ?>">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input name="hostname" class="form-control-plaintext font-weight-bold" id="hostname" type="text" value="<?= $dispositivo->getHostname() ?>" readonly>
				</div>
				<div class="form-group">
					<label for="ip">IP</label>
					<input name="ip" class="form-control-plaintext font-weight-bold" id="ip" type="text" value="<?= $dispositivo->getIp() ?>" readonly>
				</div>

				<div class="form-group">
					<label for="usuario">Usuário</label>
					<input name="usuario" class="form-control" id="usuario" type="text" required autofocus>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input name="senha" class="form-control" id="senha" type="password" required>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-md-6"><input type="submit" class="btn btn-success btn-block" value="Conectar"></div>
						<div class="col-md-6"><a href="/dispositivos.php" class="btn btn-danger btn-block">Cancelar</a></div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php require_once 'rodape.php' ?>