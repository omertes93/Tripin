<?php
    $host = "localhost";
    $user = "omerte_admin";
    $password = "Aa123456";
    $db = "omerte_trip";
    
    $conn = new mysqli($host, $user, $password, $db);
    
    if ($conn -> connection_error) {
        die("Connection failed: ".$conn -> connection_error);
        echo '<script>alert("cant connect to database")</script>';
    }
?>