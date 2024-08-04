<?php
include("admin/connection.php");
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php?msg=out");
}

$class_id = isset($_REQUEST['class']) ? $_REQUEST['class'] : null;
$query = "SELECT * FROM `subject`";
if ($class_id) {
    $query .= " WHERE `class_id`=$class_id";
}
$result = mysqli_query($conn, $query);
$no_rows = mysqli_num_rows($result);
$total_no_rows = ceil($no_rows / 3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz | Subject</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-page-dashboard">
        <div class="side-nav">
            <ul>
                <div class="logo-container">
                    <img src="admin/assets/images/logo.png" alt="logo" height="80px" width="200px">
                </div>
                <li><a href="dashboard.php"><img src="admin/assets/images/home_icon.png" alt=""></a><p>Home</p></li>
                <li><a href="subject_page.php"><img src="admin/assets/images/subject_icon.png" alt=""><p></a>Subject</p></li>
                <li><a href="class_page.php"><img src="admin/assets/images/class_icon.png" alt=""><p></a>Class</p></li>
                <li><a href="quiz_page.php"><img src="admin/assets/images/quiz_icon.png" alt=""><p></a>Quiz</p></li>
            </ul>
            <ul>
                <li><a href="logout.php"><img src="admin/assets/images/logout_icon.png" alt=""><p></a>Log Out</p></li>
            </ul>
        </div>
        <div class="main-content" id="main-content">
            <div class="profile-icon">
                <p>Hello User</p>
                <a href=""><img src="admin/assets/images/profile_icon.png" width="60px"></a> 
            </div>
            <div class="divider"></div>
            <h1>Subject List</h1>
            
            <?php
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($counter % 3 == 0) {
                    if ($counter > 0) {
                        echo '</div>'; // Close the previous row
                    }
                    echo '<div class="class-card-holder">'; // Start a new row
                }
                ?>
                <a href="quiz_page.php?subject=<?php echo $row['id']?>">
                    <div class="class-card">
                        <img src="admin/assets/images/<?php echo $row['image']?>" alt="">
                    </div>
                </a>
                <?php
                $counter++;
            }
            if ($counter % 3 != 0) {
                echo '</div>'; // Close the last row if it's not already closed
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>