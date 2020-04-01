<?php
    include "db.inc.php";

    $query = 'SELECT * FROM todo';
    $res = mysqli_query($connection,$query)
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Todo app(php)</title>
</head>
<body>
    <div>   
        <form  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <input type="text" name="todo" >
            <input type="submit" value="add todo" >
        </form>
        <ul>
            <?=
              while($row = mysqli_fetch_assoc($res)) {
                  $t_name = $row['t_name'];
              }
            ?>
            <li>eat food</li>
        </ul>
    </div>
    
</body>
</html>