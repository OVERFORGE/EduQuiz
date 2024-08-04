<?php 
include("connection.php");

$classquery="SELECT * FROM `class`";
$classresult=mysqli_query($conn,$classquery);

$subjectquery="SELECT * FROM `subject`";
$subjectresult=mysqli_query($conn,$subjectquery);

session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php?msg=out");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | EduQuiz</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body onload="statUpdate() ">
    <div class="main-page-dashboard">
        <div class="side-nav">           
            <ul>
                <div class="logo-container">
                    <img src="assets/images/logo.png" alt="logo"  height="80px" width="200px">
                </div>
                <li><a href="admin_dashboard.php"><img src="assets/images/home_icon.png" alt=""></a><p>Dashboard</p></li>
                <li><a href="admin_subject_list.php"><img src="assets/images/subject_icon.png" alt=""><p></a>Subject</p></li>
                <li><a href="admin_class_list.php"><img src="assets/images/class_icon.png" alt=""><p></a>Class</p></li>
                <li><a href="admin_quiz_list.php"><img src="assets/images/quiz_icon.png" alt=""><p></a>Quiz</p></li>
                <li><a href="user_list.php"><img src="assets/images/user_img.png" alt=""><p></a>User</p></li>
            </ul>
            <ul>
                <li><a href="logout.php"><img src="assets/images/logout_icon.png" alt=""><p></a>Log Out</p></li>
            </ul>
        </div>
        <div class="main-content" id="main-content">
            <div class="profile-icon">
                <p>Hello Admin</p>
                <a href=""><img src="assets/images/profile_icon.png" width="60px"></a> 
            </div>
            
            
            
            <form  id="signup-form" action="process.php" method="post" enctype="multipart/form-data">
                <h1 id="add-heading">Create Quiz</h1>
                <input type="hidden" name="mode" value="create_quiz" >
                <div class="form-group">
                    <label for="name">Quiz Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Quiz Name" required>
                </div>
                <div class="form-group">
                    <label for="image">UPLOAD QUIZ BANNER:</label>
                    <input type="file" id="img-input" name="image" required>
                </div>
                <div class="form-group">
                    <label for="class">Select Class:</label>
                    <select name="class" id="class">
                        <?php
                        while($classrow=mysqli_fetch_array($classresult))
                        {?>
                        <option value="<?php echo $classrow['id']?>"><?php echo $classrow['class_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Select Subject:</label>
                    <select name="subject" id="subject">
                        <?php 
                        while($subjectrow=mysqli_fetch_assoc($subjectresult)){
                        ?>
                        <option value="<?php echo $subjectrow['id']?>"><?php echo $subjectrow['subject_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" id="submit">
                    <input type="submit" name="submit" value="Create Quiz">
                </div>
            </form>
        </div>
            
        
    </div>
    <script src="script.js"></script>
</body>
</html>