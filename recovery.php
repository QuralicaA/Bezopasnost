<?php
session_start();
include 'db.php'; 
if(isset($_POST['name']) &&  isset($_POST['login'])  && isset($_POST['passwordNew'])) {
    $capitalLetter = '/[A-Z]/';
    $quantity = '/\w{8,}/';
    $symbols = '/[!@#$%^&*()\/\<>]/';
    $login = $_POST['login'];
    $passwordNew = $_POST['passwordNew'];
    if (isset($_POST['passwordNew'])) {
            if (preg_match($quantity, $_POST['passwordNew'])) {
                if (preg_match($capitalLetter, $_POST['passwordNew'])) {
                    if (preg_match($symbols, $_POST['passwordNew'])) {
                        $password = md5($password);
                        $query = "SELECT * FROM `user` WHERE `login` = '$login'";
                        $result = mysqli_query($link, $query);
                        if (($result && mysqli_num_rows($result)) < 0) {
                            echo "Логин введён неверно!" . "<br><br>";
                        } else {
                            $UPquery = "UPDATE `user` SET `password` = '[passwordNew]'  WHERE `login` = '[login]'";
                            $UPresult = mysqli_query($link, $UPquery);
                            if ($UPresult) {
                                $_SESSION['login'] = $login;
                                $_SESSION['passwordNew'] = $password;
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
      <input name = "login" type="text"  placeholder="Логин" value="<?= $_POST['login']?>">
      <input name = "passwordNew" type="password" placeholder="Новый пароль" value="<?= $_POST['passwordNew']?>" >
      <button type="submit">Войти</button>
    </form>
    </body>
</html>