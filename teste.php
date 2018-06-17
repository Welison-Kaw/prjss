<?php

require_once 'global.php';

echo "<h1>TESTE</h1>";

$teste = new AcessoSSH();
echo "connect ";

$teste->connect('192.168.0.12');

//if (ssh2_auth_password($teste->getConnection(), 'kaw', 'welison01')) {
if ($teste->login('kaw', 'welison01')) {
  echo "Authentication Successful!\n";

  $teste->exec('pwd');
  //$stderr_stream = ssh2_fetch_stream($s, SSH2_STREAM_STDERR);
  echo "<hr>";
  echo $teste->lastResult();
} else {
  die('Authentication Failed...');
}

echo " <hr>fim";

?>