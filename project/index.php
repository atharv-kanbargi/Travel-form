<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables

    $server = "localhost";
    $username = "root";
    $password = "";

    //create a connection

    //check for connection success

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "success connecting to the db";

    //collect post variables

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    //execute the query

    if($con->query($sql)==true){
        // echo "successfully inserted";
        $insert = true;

        //flag for successful insertion
    }
    else{
        echo "error : $sql <br> $con->error";
    }

    //close the db connection

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to KJSCE travel form</h1>
        <br>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <br>
        <?php
            if($insert == true){
                echo "<p class='SubmitMsg'>Thanks for submitting your form.</p>";
            }
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="age" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">

            <textarea name="desc" id="desc" cols="10" rows="10" placeholder="Enter any other info here">

            </textarea>

            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>