<?php
session_start();
include 'db.php'; 
if(isset($_POST['name']) &&  isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $capitalLetter = '/[A-Z]/';
    $quantity = '/\w{8,}/';
    $symbols = '/[!@#$%^&*()\/\<>]/';
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password == $password2) {
            if (preg_match($quantity, $_POST['password'])) {
                if (preg_match($capitalLetter, $_POST['password'])) {
                    if (preg_match($symbols, $_POST['password'])) {
                        $password = md5($password);
                        $query = "SELECT * FROM `user` WHERE `login` = '$login'";
                        $result = mysqli_query($link, $query);
                        if (($result && mysqli_num_rows($result)) > 0) {
                            echo "Пользователь с именем '$login' уже существует!" . "<br><br>";
                        } else {
                            $INquery = "INSERT INTO `user` (`name`, `login`, `password`) VALUES ('$name', '$login','$password')";
                            $INresult = mysqli_query($link, $INquery);
                            if ($INresult) {
                                $_SESSION['login'] = $login;
                                $_SESSION['password '] = $password;
                                $_SESSION['name'] = $name;
                                $_SESSION['auth'] = true;
                                header('Location:index2.php');
                            } else {
                                echo "Ошибка при регистрации пользователя!"  . mysqli_error($link) . "<br><br>";
                            }
                        }
                    } else {
                        echo "Пароль должен содержать хотя бы один символ" . "<br><br>";
                    }
                } else {
                    echo "Пароль должен содержать хотя бы одну заглавную букву" . "<br><br>";
                }
            } else {
                echo "Длинна пароля должна быть больше 8" . "<br><br>";
            }
        } 
    } else {
        echo "Пароли должны совпадать!" . "<br><br>";
    }
     mysqli_close($link);
?>
<html>
    <body>
    <form method = "post">
      <input name = "name" type="text"  placeholder="Имя" value="<?= $_POST['name']?>">
      <input name = "login" type="text"  placeholder="Логин" value="<?= $_POST['login']?>">
      <input name = "password" type="password" placeholder="Пароль" value="<?= $_POST['password']?>" >
      <input name = "password2" type="password" placeholder="Повторите пароль" value="<?= $_POST['password2']?>" >
      <button type="submit">Войти</button>
    </form>
    </body>
</html>