<Html> <head>
<title>Вывод таблицы</title>
</head>
<body>
<div align=center>
<h2>Обработка таблицы</h2>
</div>
<?php
$servername = "localhost"; // локалхост
$username = "root"; // имя пользователя
$password = "secret"; // пароль если существует
$db=mysqli_connect($servername,$username,$password,'db1');
  
  if (!$db) { echo "Ошибка соединения с mysql"; exit;}
   
   $sql = mysqli_query($db, 'SELECT `id`, `login`, `password`, `sex`, `email`, `country`, `data` FROM `names`');
   $table = "<table border=1 width = '600px' align=center>";
   $i=1;
   
  while ($row = mysqli_fetch_array($sql)) {
  if($i%2==0) $color="#FFFFFF";else $color="#C0C0C0"; 
$i++;
$table .= "<tr BGCOLOR='$color'>";
$table .= "<td >".$row['id']."</td>";
 $table .= "<td >".$row['login']."</td>";
 $table .= "<td >".$row['password']."</td>";
 $table .= "<td >".$row['sex']."</td>";
 $table .= "<td >".$row['email']."</td>";
 $table .= "<td >".$row['country']."</td>";
 $table .= "<td >".$row['data']."</td>";
 $table .= "</tr>";
      }
$table .= "</table>";
        echo $table;
		mysqli_close($db);
  ?>
  <form method="GET" action="drop.php">
  <div align=center>
   <p>Введите номер id записи которую необходимо удалить</p>
  <input type="submit" value="Удалить">
  <input type="text" name="drop1">
  <a href="index.html">Зарегистрироваться</a> 
    </div>
  </form>
 
  </body>
  </html>