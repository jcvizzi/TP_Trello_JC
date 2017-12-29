
<?php
$login = 'membre.txt';
$info = file_get_contents($login);
if(isset($_POST['identifiant'].$_POST['motdepasse'])){
$temperature = $_POST['temperature'];

file_put_contents($login, $info);
}
?>
