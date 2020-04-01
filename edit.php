
<?php
    include "db.inc.php";
    if(isset($_GET["edit_todo"])) {
        $e_id = $_GET["edit_todo"];
    }

    print_r($_POST);
    if(isset($_POST["edit_todo"])) {
         $e_todo = $_POST['todo'];
         $sql = "UPDATE todo SET t_name = '$e_todo' WHERE t_id = $e_id;";
         $result = mysqli_query($connection,$sql);
        if(!$result) {
            die("failed");
        } else {
            header("Location:index.php?update");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div>   
        <form  action="" method="POST">
            <?php
                $query = "SELECT * FROM todo WHERE t_id = $e_id";
                $res = mysqli_query($connection, $query);
                $data = mysqli_fetch_array($res);
            ?>
            <input type="text" name="todo"  value="<?php echo $data['t_name']; ?>">
            <input type="submit" name="edit_todo" value="edit todo" >
        </form>
    </div>
    
</body>
</html>