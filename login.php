<?php
session_start();
include 'db.php'; 
        if (isset($_POST['password']) && isset($_POST['login'])) {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM `user` WHERE `login`='$login' AND `password`='$password'";
		$result = mysqli_query($link, $query);
		if (mysqli_num_rows($result) == 1) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
		$_SESSION['auth'] = true;
        header('Location:index2.php');
        }else {
                echo "Неверный логин или пароль" . "<br><br>";
            }
		} 
?>
<html>
    <body>
    <form method = "post">
      <input name = "login" type="text"  placeholder="Логин" value="<?= $_POST['login']?>">
      <input name = "password" type="password" placeholder="Пароль" value="<?= $_POST['password']?>" >
      <button type="submit">Войти</button>
      <br><br>
      <a href = "recovery.php">Забыли пароль? Восстановить</a>
    </form>
    </body>
</html>