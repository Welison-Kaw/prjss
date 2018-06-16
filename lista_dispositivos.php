<?php require_once 'cabecalho.php'; ?>

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
			<tr>
				<td><a href="/edita_dispositivo.php"><button class="btn btn-primary">Alterar</button></a></td>
				<td><a href="#"><button class="btn btn-danger">Excluir</button></a></td>
				<td>Hostname 1</td>
				<td>IP 1</td>
				<td>Tipo 1</td>
				<td>Fabricante 1</td>
			</tr>
			<tr>
				<td><a href="/edita_dispositivo.php"><button class="btn btn-primary">Alterar</button></a></td>
				<td><a href="#"><button class="btn btn-danger">Excluir</button></a></td>
				<td>Hostname 2</td>
				<td>IP 2</td>
				<td>Tipo 2</td>
				<td>Fabricante 2</td>
			</tr>
			<tr>
				<td><a href="/edita_dispositivo.php"><button class="btn btn-primary">Alterar</button></a></td>
				<td><a href="#"><button class="btn btn-danger">Excluir</button></a></td>
				<td>Hostname 3</td>
				<td>IP 3</td>
				<td>Tipo 3</td>
				<td>Fabricante 3</td>
			</tr>
		</tbody>
	</table>
	
<?php require_once 'rodape.php'; ?>