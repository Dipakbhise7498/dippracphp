<?php
include("connection.php");
$id = $_GET['id'];
$query = "select * from emp where id ='$id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../php_projects/css/style.css">
</head>
<body>
    
    <div class="box">
    <div class="menu" style="background-color: black; width: 60%; min-height: 50px; padding:15px">
        <a href="index.php" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Register Form</a> 
        <a href="display.php" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Display Data</a>
    </div>
        <div class="heading">
            <h2>Update Details</h2>
        </div>

        <div class="form-data">
           <form action="#" method="post">
            <table>
                <tr>
                    <td> <label for="fname">First Name</label></td>
                    <td><input type="text" name="fname" value="<?php echo $result['fname'] ?>" id="fname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="lname">Last Name</label></td>
                    <td><input type="text" name="lname" value="<?php echo $result['lname'] ?>" id="lname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="email">Enter Email</label></td>
                    <td><input type="email" name="email" value="<?php echo $result['email'] ?>" id="email" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="mob">Enter Mobile</label></td>
                    <td><input type="text" name="mob" id="mob" value="<?php echo $result['mob'] ?>" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="pass">Enter Password</label></td>
                    <td><input type="password" name="pass" value="<?php echo $result['pass'] ?>" id="pass" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="cpass">Enter Confirm Password</label></td>
                    <td><input type="password" value="<?php echo $result['cpass'] ?>" name="cpass" id="cpass" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="photo">Upload photo</label></td>
                    <td><input type="file" name="uploadfile" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Update Details" name="update"></td>
                </tr>
            </table>

           </form>
        </div>
    </div>
</body>
</html>

<?php

if($_POST['update'])
{
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photo/".$filename;
    move_uploaded_file($tempname,$folder);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    

    $query = "update emp set fname='$fname',lname='$lname',email='$email',mob='$mob',pass='$pass',cpass='$cpass' where id = '$id'";

    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('one record updated')</script>";
    }
    else
    {
        echo "<script>alert('Not found')</script>".mysqli_connect_error();
    }
}

?>