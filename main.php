<?php
    include "connection.php";
    include "quaries.php";
    $conn = DbConnect();
    var_dump(fetchFromDb($conn, "accounts", "username", $_POST['registerUsername']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="style.css">
    <title>To do list</title>
</head>
<body>
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <h1>LOGIN</h1>
        <label for="loginUsername">Username:</label>
        <input type="input" id="loginUsername" name="loginUsername"><br>
        <label for="loginPassword">Password:</label>
        <input type="input" id="loginPassword" name="loginPassword"><br>
        <input type="submit" name="login" value="login">
    </form>

    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <h1>REGISTER ACCOUNT</h1>
        <label for="registerUsername">Username:</label>
        <input type="input" id="registerUsername" name="registerUsername"><br>
        <label for="registerPassword">Password:</label>
        <input type="input" id="registerPassword" name="registerPassword"><br>
        <input type="submit" name="register" value="register">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $foundEmpty = false;
        foreach($_POST as $key => $value){
            if(empty($_POST[$key])){
                echo "$key is empty! <br>";
                $foundEmpty = true;
            }
        }

        if(!($foundEmpty)){
            if($_POST["register"]){
                $name = $_POST['registerUsername'];
                if(fetchFromDb($conn, "accounts", "username", $_POST['registerUsername'])){
                    echo "$name has already been taken!";
                } else {
                    insertIntoDb($conn, "accounts", [$_POST['registerUsername'], $_POST['registerPassword']]);
                }
            }
        }
    }
    ?>
</body>
</html>
