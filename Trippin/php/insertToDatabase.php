<DOCTYPE html>
<html lang=eng>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/style.css">
    
    
    
    
    
</head>
<body class="yournext">
    <div class="col-md-2"></div>
    <div id="welcome" class="bg-dark text-white col-md-8 text-center">
    <h1><u>Let's sum up your desired vacation</u></h1>
    <br>
    <p id="wp"></p>
    <p id="pp"></p>
    <p id="mp"></p>
    <p id="fp"></p>
    <br>
    <p>Anyway, Enjoy Your Vacation!</p>
    </div>



<?php
         $host = "localhost";
         $user = "omerte_admin";
         $password = "Aa123456";
         $db = "omerte_trip";
         
         $conn = new mysqli($host, $user, $password, $db);
         
         if ($conn -> connection_error) {
             die("Connection failed: ".$conn -> connection_error);
             echo '<script>alert("cannot connect to database")</script>';
         }
		
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            $passport = $_POST['passport'];
            $goal = $_POST['goal'];
            $email = $_POST['email'];
            $start_date=$_POST['SD'];
            $end_date=$_POST['ED'];
            $flexible=$_POST['flexible'];
            $Min_price=$_POST['Min_Price'];
            $Max_price=$_POST['Max_Price'];
            $numOfPeople=$_POST['NumOfPepole'];

        }

		$sql = "INSERT INTO user_request (passport, firstName, lastName, startDate, endDate, vacationGoal, numOfPeople, minPrice, maxPrice, flex, eMail) VALUES ('$passport','$first_name',
			'$last_name','$start_date','$end_date','$goal','$numOfPeople','$Min_price','$Max_price','$flexible','$email')";
		
		if(mysqli_query($conn, $sql)){
            $result = $conn->query($sql);
            echo '<script>alert("Your request has been recieved. We will contact you soon. Thanks")</script>';
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
       
       <script>
            let Min_Price = <?php echo json_encode($Min_price);?>;
            var numOfPeople = <?php echo json_encode($numOfPeople);?>;
            var flexible = <?php echo json_encode($flexible);?>;
            var first_name = <?php echo json_encode($first_name);?>;
            var last_name = <?php echo json_encode($last_name);?>;
            
            document.getElementById("wp").innerHTML= " hello " + first_name +" "+ last_name + " while we planing your dream trip  we want to tell you that your trip is going to be: " ;
            
            if(numOfPeople=="2"){
                 document.getElementById("pp").innerHTML= " A GREAT romantic gataway!";
            }
            
             if(numOfPeople!="2" && numOfPeople!="1" ){
                 document.getElementById("pp").innerHTML= " Family trip? or maybe, bachelor party? doesn't matter, the more the merrier";
            }
            if ("Min_Price" >= "2000"){
               document.getElementById("mp").innerHTML = "We go BIG! luxury vacation it is";
            }
            
           
             if (flexible == "Fully Flexible"){
                document.getElementById("fp").innerHTML = "Living on the edge, ah? noice";
            }  
               
               
            
            
       
       
            window.setTimeout(function(){window.location.replace('../index.html')},7000);
         
        </script>
        </body>
        </html>