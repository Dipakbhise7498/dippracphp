<?php
include("connection.php");
$id = $_GET['id'];
$query = "delete from emp where id = '$id'";
$data = mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record deleted')</script>";
?>
<meta http-equiv="refresh" content="0;url=http://localhost/php_projects/display.php" />
<?php
}

else
{
    echo "<script>alert('Record not found')</script>";
}
?>
