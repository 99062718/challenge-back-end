<?php
    function fetchFromDb($conn, $table, $column, $data){
        $quary = $conn->prepare("SELECT * FROM $table WHERE $column=:data");
        $quary->bindParam(":data", $data);
        $quary->execute();
        return $quary->fetch();
    }
?>