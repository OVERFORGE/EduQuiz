<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuiz | Learn | Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include("header.php");
    ?>
    <div class="main-page">
        
        <div class="signup-img">
            <img src="admin/assets/images/boy_on_book_img.png" alt="quiz" class="img-fluid" width="100%">
        </div>
        <div class="signup-form">
            <form id="signup-form" action="website_process.php">
                <h1 >Sign Up</h1>
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
                    <label for="name">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Write your Password here.">
                </div>
                <div class="form-group">
                    <label for="name">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" class="form-control" >
                </div>
                <div class="form-group" id="submit">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
</body>
</html>