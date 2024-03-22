<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>papu</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
    <div class="box">
    <div class="menu" style="background-color: black; width: 60%; min-height: 50px;  padding:15px">
        <a href="" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Register Form</a> 
        <a href="display.php" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Display Data</a>
        <a href="pagination.php" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Pagination</a>
    </div>
        <div class="heading">
            <h2>Registration FORM</h2>
        </div>

        <div class="form-data">
           <form action="index.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td> <label for="fname">First Name</label></td>
                    <td><input type="text" name="fname" id="fname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="lname">Last Name</label></td>
                    <td><input type="text" name="lname" id="lname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="email">Enter Email</label></td>
                    <td><input type="email" name="email" id="email" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="mob">Enter Mobile</label></td>
                    <td><input type="text" name="mob" id="mob" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="pass">Enter Password</label></td>
                    <td><input type="password" name="pass" id="pass" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="cpass">Enter Confirm Password</label></td>
                    <td><input type="password" name="cpass" id="cpass" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td> <label for="photo">Upload photo</label></td>
                    <td><input type="file" name="uploadfile" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Register" name="register"></td>
                </tr>
            </table>

           </form>
        </div>
    </div>
</body>
</html>

<?php

if($_POST['register'])
{

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photo/".$filename;
    move_uploaded_file($tempname,$folder);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    
    $query = "insert into emp(images, fname, lname, email, mob, pass, cpass) values('$folder','$fname','$lname','$email','$mob','$pass','$cpass')";
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('Data inserted')</script>".mysqli_connect_error();
    }
    else
    {
        echo "<script>alert('Data not inserted')</script>".mysqli_connect_error();
    }
}

?>