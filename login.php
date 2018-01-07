<?php
require('config.php');
$name = $pass = "";
$db = new Database;
$sess = new SessionHub('');
$login = new Login;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $login->clean($_POST["name"]);
    $pass = $login->clean($_POST["pass"]);
    $login->IsLogged($login->clean($name),$login->clean($pass));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>

    <form method="post" action="login.php">
        Име:<br>
        <input type="text" name="name" value=""><br>
        Парола:<br>
        <input type="password" name="pass" value=""><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        $test=$db->prepare('SELECT * FROM pn')->execute();

        while($row=$db->fetchAssoc()){
        echo $row['id'] . "<br />";
        echo $row['pn_name'] . "<br />";
        }
    ?>

</body>

</html>