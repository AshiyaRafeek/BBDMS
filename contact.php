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
$contact=$_POST['contact'];
$email=$_POST['email'];
$message=$_POST['message'];
$sql="INSERT INTO `contact`.`contact` (`fullname`, `contact`, `email`, `message`) VALUES ('$fullname', '$contact', '$email', '$message');";
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
    <title>Document</title>
    <link rel="stylesheet" href="contact.css?v=<?php echo time(); ?>">
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
        <?php
        if($insert == True){
            echo "<p class='submitmsg'>RECEIVED YOUR MESSAGE.THANKS FOR CONTACTING US</p> ";
        }
        ?>
        <h2 id="contact">Contact</h2><br>
        <h3 id="send">Send us a Message</h3><br>
        <form action="contact.php" method="post">
            <label for="full name">Full Name<span style="color:red;">*</span></label><br>
            <input type="text" id="full name" name="fullname" class="tags" required><br><br>
            <label for="phone no.">Phone Number<span style="color:red;">*</span></label><br>
            <input type="tel" id="phone no." name="contact" pattern="[0-9]{10}" class="tags"  required><br><br>
            <label for="email">Email Address<span style="color:red;">*</span></label><br>
            <input type="email" id="email" name="email" class="tags"  required><br><br>
            <label for="message">Message<span style="color:red;">*</span></label><br>
            <textarea name="message" rows="6" id="msg" required></textarea><br><br>
            <input type="submit" id="submit" value="Submit"><br><br>
        </form>
        <div id="div2">
            <h2 id="cd">Contact Details</h2><br>
            <h3>Address:</h3>
            <p>Jabalpur, M.P.(482002)</p><br>
            <h3>Contact Number:</h3>
            <p>9546232451</p><br>
            <h3>Email:</h3>
            <b id="eid">bloodbank@gmail.com</b>
        </div>
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