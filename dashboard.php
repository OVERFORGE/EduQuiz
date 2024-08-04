<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php?msg=out");
}
include("admin/connection.php");

if(!isset($_COOKIE['visit'])){
    setcookie('visit','yes',time()+(60*60*24));
    $query="UPDATE `user_track` SET track=track+1";
    mysqli_query($conn,$query);
}
$user_id=$_SESSION['id'];
$quiznoquery="SELECT * FROM `user_stats` WHERE user_id='$user_id'";
$quiznoresult=mysqli_query($conn,$quiznoquery);
$quiz_row=mysqli_fetch_assoc($quiznoresult);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz | Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js">        
    </script>
</head>
<body onload="statUpdate() ">
    <div class="main-page-dashboard">
        <div class="side-nav">           
            <ul>
                <div class="logo-container">
                    <img src="admin/assets/images/logo.png" alt="logo"  height="80px" width="200px">
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
                <p>Hello <?php echo $_SESSION['name']?></p>
                <a onclick="profilePopup()"><img src="admin/assets/images/profile_icon.png" width="60px" ></a>
            </div>
            <div class="divider"></div>
            <div id="status">

            </div>
            <h1>User Stats</h1>
            <div class="stat-card-holder">
                <div class="stat-card">
                    <p>Average Quiz Accuracy</p>
                    <div class="skill">
                        
                        <div class="outer">
                            <div class="inner">
                                <div id="number">
                                    <div id="percentage" class="aqa-score">65%</div>
                                    
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                            <defs>
                                <linearGradient id="GradientColor">
                                <stop offset="0%" stop-color="#836953" />
                                <stop offset="100%" stop-color="#4C6444" />
                                </linearGradient>
                            </defs>
                            <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="skill">
                        <div class="skill-title">Total Quiz Attempted</div>
                        <div class="stat-value"><?php if(mysqli_num_rows($quiznoresult)>0){echo $quiz_row['total_quiz'];}else{echo "Nil";} ?></div>
                        
                    </div>
                </div>
                <div class="stat-card">
                    <p>Total Lecture Watched</p>
                    <div class="skill">
                        
                        <div class="outer">
                            <div class="inner">
                                <div id="number">
                                    <div id="percentage">65%</div>
                                    
                                </div>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                            <defs>
                                <linearGradient id="GradientColor">
                                <stop offset="0%" stop-color="#836953" />
                                <stop offset="100%" stop-color="#4C6444" />
                                </linearGradient>
                            </defs>
                            <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <h1>Continue Watching...</h1>
            <div class="yt-card-holder">                
                <div class="yt-card">
                    <div class="yt-card-img"><img src="admin/assets/images/yt-thumbnail.jpg" alt="" width="348px"></div>
                </div>
            </div>
            <div class="divider"></div>
            <?php if(isset($_SESSION['quiz_banner'])){?>
            <h1>Continue The quiz</h1>
            <a href="quiz.php?quiz_id=<?php echo $_SESSION['quiz_dashboard_id']?>">
            <div class="yt-card-holder">
                <div class="yt-card">
                    <div class="yt-card-img"><img src="admin/assets/images/<?php echo $_SESSION['quiz_banner']?>" alt="" width="348px"></div>
                </div>
            </div></a>
            <?php } ?>
            
        </div>
    </div>
    


    <div class="profile">
        <div class="profile-card">
            <div class="close-button" onclick="closePopup();"><i class="fa fa-close" style="font-size:24px"></i></div>
            <h1>PROFILE</h1>
            <div class="profile-img"><img src="admin/assets/images/profile_icon.png" width="100px" alt=""></div>
            <h2>User Credentials</h2>
            <form id="detail-change-form" action="website_process.php">

                <input type="hidden" name="mode" value="signup">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Write your name here.">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Write your Email here.">
                </div>
                <div class="form-group">
                    <label for="name">Old Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Write your Password here.">
                </div>
                <div class="form-group">
                    <label for="name">New Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Write your Password here.">
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Write your Password here.">
                </div>
                <div class="form-group" id="submit">
                    <input type="submit" name="submit" value="Change Credentials">
                </div>
            </form>
        </div>
    </div>
    


</body>
</html>