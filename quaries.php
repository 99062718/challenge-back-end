<?php
    function checkInDB($conn, $table, $column, $data){
        $quary = $conn->prepare("SELECT $column FROM $table WHERE $column=:data");
        $quary->bindParam(":data", $data);
        $quary->execute();
        $result = $quary->fetch();
        return count($result) == 1;
    }
?>