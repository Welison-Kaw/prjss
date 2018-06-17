<?php require_once 'global.php' ?>
<?php
	$user = $_POST['usuario'];
	$pass = $_POST['senha'];
	$ip = $_POST['ip'];
	$comando = $_POST['comando'];
?>

<?php require_once 'cabecalho.php' ?>

<form class="form" method="post">
	<input type="hidden" name="usuario" value="<?= $user ?>">
	<input type="hidden" name="senha" value="<?= $pass ?>">
	<input type="hidden" name="ip" value="<?= $ip ?>">
	<div class="form-group">
		<label for="comando">Comando</label>
		<input type="text" class="form-control" name="comando" id="comando" autofocus>
	</div>
	<input type="submit" class="btn btn-success col-md-2" value="Enviar">
</form>
<pre class="text-white bg-dark p-3">
<?php
	/*$user = "kaw";
	$pass = "welison01";
	$ip = "192.168.0.12";*/

	$ssh = new AcessoSSH();
	//echo "connect <br />";

	$ssh->connect($ip);
	if ($ssh->login($user, $pass)) {
		echo "$ ";
		if ($comando) {
			echo $comando . "<br />";
			echo $ssh->exec($comando);
		}
		/*echo "<hr>Foi</hr>";
		$ssh->exec('pwd');
		echo "<hr>" . $ssh->lastResult();
		$ssh->exec('cd /home');
		echo "<hr>" . $ssh->lastResult();
		$ssh->exec('pwd');
		echo "<hr>" . $ssh->lastResult();
		$ssh->exec('ls -l');
		echo "<hr>" . $ssh->lastResult();*/
	} else {
		die('Falha de autenticaçao');
	}
?>
</pre>

<?php require_once 'rodape.php' ?>