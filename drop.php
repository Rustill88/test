<?php
$servername = "localhost"; // локалхост
$username = "root"; // имя пользователя
$password = "secret"; // пароль если существует
$db=mysqli_connect($servername,$username,$password,'db1');
if (!$db) { echo "Ошибка соединения с mysql"; exit;}
    $id = $_GET["drop1"];
    $query = "DELETE FROM names WHERE id='$id'";
    if (mysqli_query($db,$query)) {
$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");} 
else {echo "Error: " . mysqli_error($db);}
 mysqli_close($db)
  ?>