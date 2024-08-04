<?php 

include("admin/connection.php");
session_start();


if($_REQUEST['mode']=='signup'){
    echo $name=$_REQUEST['name'];
    echo $email=$_REQUEST['email'];
    echo $password=$_REQUEST['password'];
    echo $dob = $_REQUEST['dob'];
    echo $query= "INSERT INTO `user_signup`(`name`, `email`, `password`, `dob`) VALUES ('$name','$email','$password','$dob')";
    echo $result = mysqli_query($conn,$query);
    header('location:index.php');
}

if($_REQUEST['mode']=='login'){
    echo $email=$_REQUEST['email'];
    echo $password=$_REQUEST['password'];
    $query = "SELECT * FROM `user_signup` WHERE `email`='$email' AND `password`='$password'";
    $querysql=mysqli_query($conn,$query);  
    $result = mysqli_fetch_assoc($querysql); 
    $num=mysqli_num_rows($querysql);

    $_SESSION['name']=$result['name'];
    $_SESSION['email']=$result['email'];
    $_SESSION['password']=$result['password'];
    $_SESSION['id']=$result['id'];  


    if($num==1){
        header("location:dashboard.php");


    }
    else{
        echo "Invalid Email or Password";
        header('location:login.php?m=s');
    }


}

if($_REQUEST['mode']=='set_quiz_banner'){
    $email=$_REQUEST['email'];
    $quiz_id=$_REQUEST['quiz_id'];
    $query="SELECT * FROM `quiz_list` WHERE `id`='$quiz_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['quiz_banner']=$row['image'];
    $_SESSION['quiz_dashboard_id']=$row['id'];
    $quiz_name=$row['name'];

    $user_id=$_SESSION['id'];

    echo $accuracy=$_REQUEST['accuracy'];
    $userquery="SELECT * FROM `user_stats` WHERE `user_id`='$user_id'";
    $userresult=mysqli_query($conn,$userquery);
    if(mysqli_num_rows($userresult)==0){
        $userinsertquery="INSERT INTO `user_stats`(`user_id`, `total_quiz`,`last_quiz`) VALUES ('$user_id','1','$quiz_name')";
        $insertresult=mysqli_query($conn,$userinsertquery);
    }else{
        $updatequery="UPDATE `user_stats` SET total_quiz=total_quiz+1,`last_quiz`='$quiz_name' WHERE user_id = '$user_id'";
        $updateresult=mysqli_query($conn,$updatequery);
    }


    header("location:quiz.php?quiz_id=".$quiz_id);
}
?>