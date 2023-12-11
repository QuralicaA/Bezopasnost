<?php
 session_start();
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        echo "Hi $login <br><br>";
    } else {
        echo "Вы не вошли в систему.";
    }
    ?>
<html>
    <body>
    <form action = "out.php" method = "post">
      <button type="submit">Выйти</button>
    </form>
    </body>
</html>