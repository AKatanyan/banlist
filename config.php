<?php

// Подключение к БД

   $server = "db4free.net"; // Сервер от БД
   
   $dbuser = "mrswipe"; // Пользователь БД
   
   $dbpass = "D33St67Zx99Fg"; // Пароль от БД
   
   $dbname = "mrswipe"; // Название БД
   
mysql_connect($server, $dbuser, $dbpass);

mysql_select_db($dbname);

?>
