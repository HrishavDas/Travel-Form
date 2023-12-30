<?php
$insert = false;
if(isset($_POST['name'])){
   $server = "localhost";
   $username = "root";  // MySQL username
   $password = "";     // MySQL password

   $con = mysqli_connect($server, $username,  $password);

   if(!$con){
    die("connection to this database failed". mysqli_connect_error());
   }
   


   $name = $_POST['name'];
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc= $_POST['desc'];

   $sql = "INSERT INTO `triip`.`users` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES('$name', '$age', '$gender', '$email', ' $phone', '$desc',  current_timestamp());";
   

   if($con->query($sql) == true){
      $insert = true;
   }
   else{
      echo "Error: $sql <br> $con->error";
   }

   $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to travel from</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="bg" src="bg.webp" alt="">
    <div class="container">
        <h1>Welcome to IIT kharagpur US trip form</h1>
        <p>Enter your details confirm your participation in the trip</p>
        <?php
            if($insert == true){
            echo "<p class='submitMsg'> Thanks for Submitting your form. We are happy to see you joining US trip </p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="text" name="email" id="email" placeholder="Enter Your Email">
            <input type="text" name="phone" id="" placeholder="Enter Your Phone">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Information"></textarea>

            <button class="btn">Submit</button>
            
        </form>
    </div>
    </body>
</html>