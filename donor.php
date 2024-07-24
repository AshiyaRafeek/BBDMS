<?php
$insert=false;
if(isset($_POST['fullname'])){
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server, $username, $password);
if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
//echo "Successfully connecting to database";
$fullname=$_POST['fullname'];
$bloodgroup=$_POST['bloodgroup'];
$country=$_POST['country'];
$state=$_POST['state'];
$district=$_POST['district'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$sql="INSERT INTO `donor`.`donor` (`fullname`, `bloodgroup`, `country`, `state`, `district`, `city`, `gender`, `age`, `email`, `contact`) VALUES ('$fullname', '$bloodgroup', '$country', '$state', '$district', '$city', '$gender', '$age', '$email', '$contact');";
if($con->query($sql) == true){
    //echo "Successfully inserted";
    $insert= true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Registeration</title>
    <link rel="stylesheet" href="donor.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div id="navbar">
            <h3 id="logo">Blood Bank & Donation</h3>
            <a href="./index.html" id="home">Home</a>
            <a href="./why.html">Why Donate Blood</a>
            <a href="./donor.html">Become A Donor</a>
            <a href="./need.html">Need Blood</a>
            <a href="./contact.html">Contact Us</a>
        </div>
    </header>
    <main>
        <h1>
            Blood Donor Registeration
        </h1>
        <?php
        if($insert == True){
            echo "<p class='submitmsg'>SUCCESSFULLY REGISTERED.THANKS FOR THE REGISTRATION</p> ";
        }
        ?>
        <form action="donor.php" method="post" id="form">
        <label for="full name">Full Name<span style="color:red;">*</span></label><br>
        <input type="text" id="full name" name="fullname" class="tags" required><br><br>
        <label for="bloodGroup">Blood Group<span style="color:red;">*</span></label><br>
        <select id="bloodGroup" name="bloodgroup"  class=tags required>
            <option>Select</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br><br>
        <label for="country">Country<span style="color:red;">*</span></label><br>
        <input type="text" id="country" name="country" class="tags" required><br><br>
        <label for="state">State<span style="color:red;">*</span></label><br>
        <input type="text" id="state" name="state" class="tags" required><br><br>
        <label for="district">District<span style="color:red;">*</span></label><br>
        <input type="text" id="district" name="district" class="tags" required><br><br>
        <label for="city">City<span style="color:red;">*</span></label><br>
        <input type="text" id="city" name="city" class="tags" required><br><br> 
        <label for="gender">Gender<span style="color:red;">*</span></label><br>
        <input type="text" id="gender" name="gender" class="tags" required><br><br> 
        <label for="age">Age<span style="color:red;">*</span></label><br>
        <input type="text" id="age" name="age" class="tags" required><br><br> 
        <label for="email">Email<span style="color:red;">*</span></label><br>
        <input type="email" id="email" name="email"  class="tags" required><br><br>
        <label for="contact no.">Contact Number<span style="color:red;">*</span></label><br>
        <input type="tel" id="contact no." name="contact" pattern="[0-9]{10}" class="tags" required><br><br>
        <input type="submit" id="submit" value="Submit"><br><br>
    </form>
</main>
<footer>
    <pre>
        COPYRIGHT &copy; 2024
        Blood Bank & Donation Management
        ALL RIGHTS RESERVED.
    </pre>
</footer>
</body>
</html>
