<?php
	Session_start();
	 session_destroy(); 

	 header('Location: '.FULL_URL.'');
?>