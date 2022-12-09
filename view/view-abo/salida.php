<?php
	/* Se destruye la variable sessión */
	session_start();
	session_destroy();
	/** Se envia al login */
	header("Location: ../../index.php");
?>