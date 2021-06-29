<?php
	session_start();
	session_unset();//to remove all stored values
	session_destroy();
	header("location:login.php");
?>