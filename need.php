<?php
$servername="localhost";
$username="root";
$password="";
$database="donor";
$conn=mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Sorry we failed to connect: " . mysqli_connect_error());
}
else{
    //echo "Successfully connecting to database<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="need.css?v=<?php echo time(); ?>">
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
        <h2>Need Blood</h2>
        <br>
        <form method="post">
            <label for="bloodgroup">Blood Group<span style="color:red;">*</span></label><br>
            <select id="bloodGroup" name="search" placeholder="Select" class="tag" required>
                    <option>Select</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select><br>
                <button name="submit">Search</button>
        </form>
        <div>
            <table>
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $sql="select * from `donor` where bloodgroup='$search'";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0){
                            echo '<thead>
                            <tr>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>BLOOD GROUP</th>
                            <th>COUNTRY</th>
                            <th>STATE</th>
                            <th>DISTRICT</th>
                            <th>CITY</th>
                            <th>GENDER</th>
                            <th>AGE</th>
                            <th>EMAIL</th>
                            <th>PHONE NO.</th>
                            </tr>
                            </thead>
                            ';
                            while($row=mysqli_fetch_assoc($result)){
                                echo '<tbody>
                                <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['fullname'].'</td>
                                <td>'.$row['bloodgroup'].'</td>
                                <td>'.$row['country'].'</td>
                                <td>'.$row['state'].'</td>
                                <td>'.$row['district'].'</td>
                                <td>'.$row['city'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['age'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['contact'].'</td>
                                </tr>
                                </tbody>
                                ';
                            }
                        }
                        else{
                            echo '<h2 id="msg">Blood Group Not Found</h2>';
                        }
                    }
                }
                ?>
            </table>
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