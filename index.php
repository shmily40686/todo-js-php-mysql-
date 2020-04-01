<?php
    include "db.inc.php";

    $query = 'SELECT * FROM todo';
    $res = mysqli_query($connection,$query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $todo = $_POST['todo'];
        $date = date('1 ds F\,Y');
        $sql = "INSERT INTO todo(t_name,t_date) VALUE('$todo','$date');";
        $result = mysqli_query($connection,$sql);
        if(!$result) {
            die("failed");
        } else {
            header("Location:index.php?todo-added");
        }
    }

    if(isset($_GET["delete_todo"])) {
        $id = $_GET["delete_todo"];
        $sql_delete = "DELETE FROM todo WHERE t_id = $id"; 
        $delete_result = mysqli_query($connection,$sql_delete);
         if(!$delete_result) {
            die("failed");
        } else {
            header("Location:index.php?todo-deleted");
        }
    }
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
            <?php
              while($row = mysqli_fetch_assoc($res)) {
                  $t_name = $row['t_name'];
                  $t_id = $row['t_id'];
            ?>
            <li>
                <?php echo $t_name; ?>
                <a href="index.php?delete_todo=<?php echo $t_id; ?>">delete</a>
            </li>
            <?php } ?>
        </ul>
    </div>
    
</body>
</html>