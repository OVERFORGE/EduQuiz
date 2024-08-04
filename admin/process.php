<?php 
include("connection.php");
session_start();
$today=date("mjYHis");
if($_REQUEST['mode']=='add_question'){
    echo $question=$_REQUEST['question'];
    echo $option1=$_REQUEST['option1'];
    echo $o1check = $_REQUEST['o1check'];
    echo $option2=$_REQUEST['option2'];
    echo $o2check = $_REQUEST['o2check'];
    echo $option3=$_REQUEST['option3'];
    echo $o3check = $_REQUEST['o3check'];
    echo $option4=$_REQUEST['option4'];
    echo $o4check = $_REQUEST['o4check'];
    echo $table_name = $_REQUEST['table_name'];


    echo $query = "INSERT INTO 
                `$table_name`(`question`, `option_1`, `o1check`, `option_2`, `o2check`, `option_3`, `o3check`, `option_4`, `o4check`) 
                VALUES ('$question','$option1','$o1check','$option2','$o2check','$option3','$o3check','$option4','$o4check')";
    echo $result = mysqli_query($conn,$query);

    header('location:add_to_quiz.php');
};

if($_REQUEST['mode']=='add_class'){
    echo $class=$_REQUEST['name'];

    echo $tempname = $_FILES["image"]["tmp_name"];
    echo $image=$_FILES["image"]["name"];
    echo $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    echo $image_name=$today.".".$image_ext;
    echo $folder = "./assets/images/".$image_name;
    print_r($folder);
    move_uploaded_file($tempname,$folder);

    $query="INSERT INTO `class`(`class_name`, `class_img`) VALUES ('$class','$image_name')";
    $result = mysqli_query($conn,$query);
    header("location:add_to_class.php");
}

if($_REQUEST['mode']=='edit_class'){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    echo $tempname = $_FILES["image"]["tmp_name"];
    echo $image=$_FILES["image"]["name"];
    echo $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    echo $image_name=$today.".".$image_ext;
    echo $folder = "./assets/images/".$image_name;
    move_uploaded_file($tempname,$folder);

    if(!empty($image_name)){
        echo $query="UPDATE `class` SET `class_name`='$name',`class_img`='$image_name' WHERE `id`='$id'";
        echo $result = mysqli_query($conn,$query);
    }else{
       echo $query="UPDATE `class` SET `class_name`='$name' WHERE `id`='$id'";
       echo $result = mysqli_query($conn,$query);
    }
    header('location:admin_class_list.php');
}


if($_REQUEST['mode']=='add_subject'){
    echo $subject=$_REQUEST['name'];
    echo $tempname = $_FILES["image"]["tmp_name"];
    echo $image=$_FILES["image"]["name"];
    echo $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    echo $image_name=$today.".".$image_ext;
    echo $folder = "./assets/images/".$image_name;
    print_r($folder);
    move_uploaded_file($tempname,$folder);
    echo $class=$_REQUEST['class'];

    $query="INSERT INTO `subject`(`subject_name`, `image`, `class_id`) VALUES ('$subject','$image_name','$class')";
    $result = mysqli_query($conn,$query);
    header("location:add_to_subject.php");
}

if($_REQUEST['mode']=='create_quiz'){
    echo $name = $_REQUEST['name'];
    echo $subject=$_REQUEST['subject'];
    echo $class=$_REQUEST['class'];

    echo $tempname = $_FILES["image"]["tmp_name"];
    echo $image=$_FILES["image"]["name"];
    echo $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    echo $image_name=$today.".".$image_ext;
    echo $folder = "./assets/images/".$image_name;
    print_r($folder);
    move_uploaded_file($tempname,$folder);

    $query="INSERT INTO `quiz_list`(`name`, `image`, `subject`, `class`) VALUES ('$name','$image_name','$subject','$class')";
    $result = mysqli_query($conn,$query);


    $create_query="CREATE TABLE `$name` (`id` INT PRIMARY KEY AUTO_INCREMENT, `question` VARCHAR(255) , `option_1` VARCHAR(255), `o1check` VARCHAR(255), `option_2` VARCHAR(255), `o2check` VARCHAR(255),`option_3` VARCHAR(255), `o3check` VARCHAR(255),`option_4` VARCHAR(255), `o4check` VARCHAR(255))";
    $create_result = mysqli_query($conn,$create_query);

    header("location:create_quiz.php");


}

if($_REQUEST['mode']=='admin_login'){
    echo $email=$_REQUEST['email'];
    echo $password=$_REQUEST['password'];
    $query = "SELECT * FROM `admin_user` WHERE `email`='$email' AND `password`='$password'";
    $querysql=mysqli_query($conn,$query);  
    $result = mysqli_fetch_assoc($querysql); 
    $num=mysqli_num_rows($querysql);

    $_SESSION['name']=$result['name'];
    $_SESSION['email']=$result['email'];
    $_SESSION['password']=$result['password'];
    $_SESSION['id']=$result['id'];  


    if($num==1){
        header("location:admin_dashboard.php");


    }
    else{
        echo "Invalid Email or Password";
        header('location:login.php?m=s');
    }
}
?>