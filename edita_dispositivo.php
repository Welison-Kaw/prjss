<?php require_once("cabecalho.php"); ?>
	<form method="post">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input name="hostname" class="form-control" id="hostname" placeholder="" type="text">
				</div>
				<div class="form-group">
					<label for="ip">IP</label>
					<input name="ip" class="form-control" id="ip" placeholder="xxx.xxx.xxx.xxx" type="text">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo</label>
					<input name="tipo" class="form-control" id="tipo" placeholder="" type="text">
				</div>
				<div class="form-group">
					<label for="fabricante">Fabricante</label>
					<input name="fabricante" class="form-control" id="fabricante" placeholder="Nome do fabricante" type="text">
				</div>
				<input type="submit" class="btn btn-success btn-block" value="Salvar">
			</div>
		</div>
	</form>

<?php require_once("rodape.php"); ?>