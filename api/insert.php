<?php

		echo json_encode(hash('ripemd160', $_POST['password']));
	
?>