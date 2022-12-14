<?php
    session_start();
    $conn = DbConnect();
    $boards = fetchFromDb($conn, "boards", "userId", $_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="style.css"> 
    <title>Board list</title>
</head>
<body>
    <?php
        if(count($boards) != 0){
            foreach($boards as $board){
                $boardData = json_decode($board["contents"]);?>
                <div class="boardListContainer">
                    <h1><?php echo $boardData["title"];?></h1>
                    <p><?php echo $boardData["description"];?></p>
                </div>
            <?php}
        }
    ?>
</body>
</html>