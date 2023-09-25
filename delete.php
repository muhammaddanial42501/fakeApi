<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `fakeapii` where id=$id";
        $conn->query($sql);
    }
    header('location:/Api/indexApi.php');
    exit;
?>