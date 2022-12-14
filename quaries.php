<?php
    function fetchFromDb($conn, $table, $column, $data){
        $quary = $conn->prepare("SELECT * FROM $table WHERE $column=:data");
        $quary->bindParam(":data", $data);
        $quary->execute();
        return $quary->fetchAll();
    }

    function insertIntoDb($conn, $table, $data){
        $quary = $conn->prepare("INSERT INTO $table VALUES (:data1, :data2)");
        $quary->bindParam(":data1", $data[0]);
        $quary->bindParam(":data2", $data[1]);
        $quary->execute();
    }
?>