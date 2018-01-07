<?php
require('config.php');
$sess = new SessionHub('');
$sess->__set('ivan', 'ksk');
print_r($_SESSION['name']);

if($_SESSION['name'] === 'ksk') {
    echo "<br> lognah<br>";
}
else {

    echo"<br>fu<br>";
}

echo $sess->name;

$sess->destroy();
// test print_r($_SESSION['name']);

