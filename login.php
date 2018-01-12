<?php
require('config.php');
$name = $pass = $errors = "";
$db = new Database;
$sess = new SessionHub('vfu');
$login = new Login;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $login->clean($_POST["name"]);
        $pass = $login->clean($_POST["pass"]);
        $is_logged = $login->IsLogged($login->clean($name),$login->clean($pass));
            if($is_logged == true) {
                $sess->__set('vfu', $name);
                echo "hello, " . $_SESSION["name"];
                echo "<br /><a href='logged.php'>dsa</a>";
            }

            else {
                $errors = "Грешни данни!";
            }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>

<?php if(!empty($errors)): ?>
    <div>Грешни данни!</div>
<?php else: ?>
    <div> Опи</div>
<?php endif ?>

<?php if($_SESSION["name"] == "ksk"): 
header('Location: logged.php');
 ?>
<?php else: ?>
    <form method="post" action="#">
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

<?php endif ?>

</body>

</html>