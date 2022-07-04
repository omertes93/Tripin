<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Trippin</title>

      <!-- stylesheet -->
      <link rel="stylesheet" href="../css/style.css">

      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

      <!-- bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!-- icons -->
      <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

      <!-- for on scroll animations -->
      <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
      <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
      
      
      <!--javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
</head>

<body class="bg-dark">

    <!-- navbar will import to  here -->

    <nav class="nav col-md-12 bg-dark"></nav>

    <!-- navbar ends here -->
    
    <!-- passport enter here -->
       <section class="col-md-12 bg-dark text-light">
        <form action="mytrips-page.php" method="POST" name="myTrips">

            <div class="row flex-nowrap align-items-center">
                <label for="user_passport" class=" form-label">Enter Passport Number</label>
                <input type="text" class="form-control" style="width:50%"  name="user_passport" id="user_passport" required>
                <input type="submit" value="check my trips" class="btn btn-info">
            </div>
        </form>
    </section>

    <!--php part- db and server -->
    <div class="container col-md-12 bg dark ">
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
                $user_passport=$_POST['user_passport']; }
            $sql ="SELECT passport,firstName,lastName,startDate,endDate,vacationGoal,numOfPeople,minPrice,maxPrice,flex,eMail FROM user_request WHERE passport=$user_passport";
            $results = $conn->query($sql);
            if ($results->num_rows>0){
                echo "
                   
                    <div class=' bg-dark'>
                    <table class='table table-hover table-dark'><tr><th>Passport Number</th> 		
                    <th>Name</th><th>Dates</th><th>Price Range</th><th>Flexibility</th><th>Email</th></tr>
                    ";
                while($row=$results->fetch_assoc()){
                            echo "<tr><td>".$row["passport"]."</td>
                            <td>".$row["firstName"]." ".$row["lastName"]."</td>
                            <td>".$row["startDate"]." ".$row["endDate"]."</td>
                            <td>".$row["minPrice"]." ".$row["maxPrice"]."</td>
                            <td>".$row["flex"]."</td>
                            <td>".$row["eMail"]."</td>
                            </tr>";
                }
                echo "</table></div>";
            }
            else{
                echo "<div class='py-5 text-center text-white'>";
                echo "you don't have any bookings yet:(<br/>make the first one today!<br/> </div>";                   
            }
        ?>
    </div>

 

      



     <!-- footer will import to here -->

     <div class="footer col-md-12"> </div>

    <!-- footer ends here -->


<script>

//import components
 $(".nav").load("../includes/navbar2.html");
 $(".footer").load("../includes/footer.html");
 // navigation starts here
$("#toggle").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $("#resize ul li a").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $(".close-btn").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });

$(function () {
  $(document).scroll(function () {
    var $nav = $(".nav");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});



 </script>
</body>
</html>