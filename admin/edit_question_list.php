<?php 
include("connection.php");
$id=$_REQUEST['id'];
$quiz_list_id=$_REQUEST['quiz_list_id'];
$query="SELECT * FROM `quiz_list` WHERE id='$quiz_list_id'";
$result=mysqli_query($conn,$query);


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
                <h1 id="add-heading">Add Question</h1>
                <input type="hidden" name="mode" value="add_question">
                <div class="form-group">
                    <label for="name">Quiz Name:</label>
                    <select name="table_name">
                        <?php 
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Question:</label>
                    <input type="text" name="question" placeholder="Enter question" required>
                </div>
                <div class="form-group">
                    <label for="option1">Option 1:</label>
                    <input type="text" name="option1" placeholder="Enter option1">
                    <select name="o1check" id="o1check">
                        <option value="true">True</option>
                        <option value="false" selected>False</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="option2">Option 2:</label>
                    <input type="text" name="option2" placeholder="Enter option2">
                    <select name="o2check" id="o2check">
                        <option value="true">True</option>
                        <option value="false" selected>False</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="option3">Option 3:</label>
                    <input type="text" name="option3" placeholder="Enter option3">
                    <select name="o3check" id="o3check">
                        <option value="true">True</option>
                        <option value="false" selected>False</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="option4">Option 4:</label>
                    <input type="text" name="option4" placeholder="Enter option4">
                    <select name="o4check" id="o4check">
                        <option value="true">True</option>
                        <option value="false" selected>False</option>
                    </select>
                </div>
                <div class="form-group" id="submit">
                    <input type="submit" name="submit" value="Add Question to Quiz">
                </div>
            </form>
        </div>
            
        
    </div>
    <script src="script.js"></script>
</body>
</html>