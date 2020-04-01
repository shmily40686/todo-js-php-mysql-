<?php
    include "db.inc.php";

    $str = $_POST["search"];
    $query = "SELECT * FROM todo WHERE t_name LIKE '%$str%'";
    $res = mysqli_query($connection,$query);
?>

<div>
 <h1>Search Todo</h1>
    <form action="" method="POST">
        <input type="text" name="search" >
        <input type="submit" value="go" >
    </form>
    <ul>
        <?php
              while($row = mysqli_fetch_assoc($res)) {
                  $t_name = $row['t_name'];
        ?>
        <li><?php echo $t_name; ?></li>
        <?php } ?>
    </ul>
    <a href="index.php">back to home</a>
</div>