<?php
require('config.php');
$sess = new SessionHub('');
//$name = $_POST['name'];
//$_SESSION['name'] = $name;
//$sess->__set('vfu', 'ksk');
//$sess->destroy();
print_r($_SESSION);

if($_SESSION['name'] === 'ksk') {
   
    echo "<br> lognah<br>";
}
else {

    echo"<br>fu<br>";
    
}

echo "<br />";
echo $sess->name;

//$sess->destroy(); 
//print_r($_SESSION['name']);

