<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
           border: 1px solid #000;
           width: 70%;
           border-collapse: collapse;
          

        } 
        th{
            border: 1px solid #000;
            padding: 5px;
            background-color: darkcyan;
            color: white;
        }
        tr td{
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
        }
       tr:nth-child(even)
        {
            background-color: darksalmon;
            
        }
    </style>
</head>
<body>
    
</body>
</html>


<?php
include("connection.php");

$query = "select * from emp";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if($total != 0)
{
?>
<center>
    <h2>Employee Data</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Images</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mob</th>
        <th>Password</th>
        <th>Confirm pass</th>
        <th>Operations</th>
    </tr>

   <?php
   while($result = mysqli_fetch_assoc($data))
   {
    echo "<tr>
           <td>".$result['id']."</td>
           <td><img src='".$result['images']."' width='80px' height=''80px'/></td>
           <td>".$result['fname']."</td>
           <td>".$result['lname']."</td>
           <td>".$result['email']."</td>
           <td>".$result['mob']."</td>
           <td>".$result['pass']."</td>
           <td>".$result['cpass']."</td>
           <td><a href='update.php?id=$result[id]'>Update</a>
           <a href='delete.php?id=$result[id]'>Delete</a>
           </td>
          </tr> <br>";
   }

}
else
{
    echo "No record found";
}

?>
</table>
</center>