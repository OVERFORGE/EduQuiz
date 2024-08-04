<?php 
include('connection.php');
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php?msg=out");
}

$query="SELECT * FROM `user_track`";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$userquery="SELECT * FROM `user_stats`";
$userqueryresult=mysqli_query($conn,$userquery);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | EduQuiz</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body onload="statUpdateDashboard() ">
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
            <div class="divider"></div>
            <div class="stat-card-holder">
                <div class="stat-card">
                    <div class="skill">                      
                        <div class="skill-title">Total user Count</div>
                        <div class="stat-value"><?php echo $row['track'] ?></div>    
                    </div>
                </div>
                <div class="stat-card">
                    <div class="skill">                      
                        <div class="skill-title">Total user in 24H</div>
                        <div class="average-score">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-user-stat-holder">
                <div class="table-wrapper">
                    <table id="class_table">
                        <thead>
                            <th>User Name</th>
                            <th>Total Quiz</th>
                            <th>Last Quiz</th>
                            <th>Accuracy</th>
                        </thead>
                        <tbody>
                            <?php while($row=mysqli_fetch_assoc($userqueryresult)){ 
                                $user_id=$row['user_id'];
                                $another_query="SELECT * FROM user_signup WHERE id='$user_id'";
                                $another_query_result=mysqli_query($conn,$another_query);
                                $another_row=mysqli_fetch_assoc($another_query_result);
                                ?>
                                <tr>
                                    <td><?php echo $another_row['name'] ?></td>
                                    <td><?php echo $row['total_quiz'] ?></td>
                                    <td><?php echo $row['last_quiz'] ?></td>
                                    <td><?php echo $row['accuracy'] ?></td>                     
                                </tr>
                            <?php }?>
                        </tbody>

                    </table>
                </div>
                
            </div>
            

            
            
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>