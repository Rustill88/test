<?php
$servername = "localhost"; // локалхост
$username = "root"; // имя пользователя
$password = "secret"; // пароль если существует
$db=mysqli_connect($servername,$username,$password);

  if (!$db) { echo "Ошибка соединения с mysql"; exit;}
  $mysqli=mysqli_select_db($db, 'db1');
  if (!$mysqli) {
//созднаие базы данных если отсутствует
$sql = "CREATE DATABASE db1";
if (mysqli_query($db, $sql)) {echo "Database создана";} 
else {echo "Error не создана: " . mysqli_error($db);}
 mysqli_close($db);
 }  
 
	 //создание таблицы если необходимо
	
	$query ="CREATE TABLE if not exists names
    (
    id int not null auto_increment Primary key ,
    login varchar (10) not null,
    password varchar (15) not null,
    sex varchar (15) not null,
    email varchar (15) not null,
    country varchar (15) not null,
	data text 
    )";
	$link = mysqli_connect($servername, $username, $password,"db1");
   if (mysqli_query($link, $query)) {
	   //Внесение данных в бд
  $login =trim(strip_tags($_POST['login']));
  $password =trim(strip_tags($_POST['password']));
  $sex = trim(strip_tags($_POST["sex"]));
  $email = trim(strip_tags($_POST["email"]));
  $country = trim(strip_tags($_POST["country"]));
  $da =date("Y-n-j");
 
  $request="insert into names (login, password, sex, email, country, data) values ('$login', '$password', '$sex', '$email', '$country', '$da')";
  $result=mysqli_query($db, $request);
  if ($result) {$redicet = $_SERVER['HTTP_REFERER'];
  @header ("Location: $redicet");
   } }else 
	{echo "Ошибка: " . mysqli_error($link);
	 mysqli_close($link);}
 
 ?>