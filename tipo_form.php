<?php require_once 'global.php' ?>
<?php
	try {
		if ($_GET['id']) {
			$id = $_GET['id'];
			$tipo = new Tipo($id);
			$action = "tipo_update.php";
		} else {
			$tipo = new Tipo();
			$action = "tipo_insert.php";
		}

	} catch(Exception $e) {
		echo $e->getMessage();
	}
?>

<?php require_once 'cabecalho.php' ?>

	<div class="row">
		<div class="col-sm-6">
			<h2>Ediçao de Tipo</h2>
		</div>
	</div>
	<form method="post" action="<?= $action ?>">
		<input type="hidden" name="id" value="<?= $tipo->id ?>">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input name="nome" class="form-control" id="nome" placeholder="" type="text" value="<?= $tipo->nome ?>" required>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-6"><input type="submit" class="btn btn-success btn-block" value="Salvar"></div>
						<div class="col-md-6"><a href="/tipos.php" class="btn btn-danger btn-block">Cancelar</a></div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php require_once 'rodape.php' ?>