<?php

class Ssh {
	public function connect() {
		return ssh2_connect();
	}
}

?>