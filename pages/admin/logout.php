<?php

session_start();

session_destroy();
$_SESSION = null;

header ("Location: ../../login.php");

?>
