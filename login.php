<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz | LogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include("header.php");
    ?>
    <?php 
    if(!empty($_REQUEST['m'])=='s'){
        ?>
        <script>alert("Invalid Username or Password")</script>
        <?php
    }
    if(!empty($_REQUEST['msg'])=='out'){
        ?>
        <script>alert("You are logged out!")</script>
        <?php
    }
    
    ?>
    <div class="main-page">
        
        <div class="signup-img">
            <img src="admin/assets/images/boy_on_book_img.png" alt="quiz" class="img-fluid" width="100%">
        </div>
        <div class="signup-form">
            <form id="signup-form" action="website_process.php">
                <h1 >Log In</h1>
                <input type="hidden" name="mode" value="login">
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Type your Email here.">
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Type your Password here.">
                </div>
                <div class="form-group" id="submit">
                    <input type="submit" name="submit" value="Log In" >
                </div>
            </form>
        </div>
    </div>
</body>
</html>