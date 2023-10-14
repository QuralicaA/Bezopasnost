<?php
    include 'orm/db.php'; 
    $result = $link->query('SELECT * FROM tegs');
    while ($row = mysqli_fetch_array($result)) {
       echo $row['name'];
    }
?>
<html>
    <body>
    </body>
</html>
