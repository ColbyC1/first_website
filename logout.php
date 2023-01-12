<?php

session_start();
session_destroy();
header("Location: demos.php");
exit;

?>