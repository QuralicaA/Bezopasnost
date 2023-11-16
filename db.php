<?php
  $host = 'localhost'; // имя хоста
  $user = 'root';      // имя пользователя
  $pass = '';          // пароль
  $name = 'ws';      // имя базы данны
  $link = mysqli_connect($host, $user, $pass, $name);
  
  if ($link -> connect_error) {
    die("Ошибка подключения к базе данных: " . $link -> connect_error);
}