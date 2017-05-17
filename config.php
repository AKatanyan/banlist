<?php

// Подключение к БД

   $server = "localhost"; // Сервер от БД
   
   $dbuser = "admin"; // Пользователь БД
   
   $dbpass = "admin"; // Пароль от БД
   
   $dbname = "server"; // Название БД
   
mysql_connect($server, $dbuser, $dbpass);

mysql_select_db($dbname);

?>
