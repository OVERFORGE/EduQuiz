<?php 
include('admin/connection.php');
session_start();
echo $accuracy=$_POST['accuracy'];

$id=$_SESSION['id'];

echo $query="UPDATE `user_stats` SET `accuracy`='$accuracy' WHERE user_id = '$id'";
$result=mysqli_query($conn,$query);

?>