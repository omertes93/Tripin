<DOCTYPE html>
<html lang=eng>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<\head>
<body>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_passport=$_REQUEST['user_passport']; }
    $sql ="SELECT passport,firstName,lastName,startDate,endDate,vacationGoal,numOfPeople,minPrice,maxPrice,flex,eMail FROM user_request WHERE passport=$user_passport";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
        echo "<br> passport: " . $row["passport"]. " Name: " . $row["firstName"]. " " .$row["lastName"]. "dates: " .$row["startDate"]. " " .$row["endDate"]. "price range: " .$row["minPrice"]. " " .$row["maxPrice"]. "goal: " .$row["vacationGoal"]. "mail: " .$row["eMail"]. "number of travellers: " .$row["numOfPeople"]. "flexibilty level: " .$row["flex"]."<br>";
        }
    } else {
        echo "0 results";
        }
    $conn->close();
?>
      <\body>
        <\html>