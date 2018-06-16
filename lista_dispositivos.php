<html>
<head>
	<title>Listagem de Dispositivos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>SenhaSegura</h1>
		</div>
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
				<button type="button" class="btn btn-primary btn-block">Atualizar</button>
			</div>
		</div>
		<table class="table table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th>Excluir</th>
					<th>Editar</th>
					<th>Hostname</th>
					<th>IP</th>
					<th>Tipo</th>
					<th>Fabricate</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span class="fa fa-trash"></span></td>
					<td><span class="fa fa-edit"></span></td>
					<td>Hostname 1</td>
					<td>IP 1</td>
					<td>Tipo 1</td>
					<td>Fabricante 1</td>
				</tr>
				<tr>
					<td><span class="fa fa-trash"></span></td>
					<td><span class="fa fa-edit"></span></td>
					<td>Hostname 2</td>
					<td>IP 2</td>
					<td>Tipo 2</td>
					<td>Fabricante 2</td>
				</tr>
				<tr>
					<td><span class="fa fa-trash"></span></td>
					<td><span class="fa fa-edit"></span></td>
					<td>Hostname 3</td>
					<td>IP 3</td>
					<td>Tipo 3</td>
					<td>Fabricante 3</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>