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
    </div>
    
</body>
</html>