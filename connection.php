<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "fakeapi";  
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);

// Check connection
// if (mysqli_connect_error()) {
//     die("Database connection failed: " . mysqli_connect_error());
//   }

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
