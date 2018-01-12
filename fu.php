<?php
require('config.php');
$sess = new SessionHub('name');
print_r($_SESSION["name"]);
?>