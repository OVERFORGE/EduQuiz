<?php 
include('admin/connection.php');

$quiz_id=$_REQUEST['quiz_id'];
$table_name =$_REQUEST['h_name'];
$heading_name = str_replace("_"," ",$table_name);
$heading_name = ucwords($heading_name);
unset($_SESSION['quiz_banner']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="quiz_style.css">
</head>
<body onload="updateScore()">
    <div class="app">
        <h1><?php echo $heading_name?></h1>
        <div class="quiz-answer">
            <h2>Your Score in the Quiz is:</h2>
            <h1 id="quiz-score"> </h1>
        </div>
        <!-- <a id="restart-btn" onclick="localStorage.removeItem('totalQ'); localStorage.removeItem('score');" href="quiz.php?id=<?php echo $quiz_id?>">Restart</a> -->
        <a id="restart-btn" onclick="localStorage.removeItem('totalQ'); localStorage.removeItem('score');" href="dashboard.php?mode=updateScore">Exit</a>
    </div>

    <script src="script.js">
    </script>
</body>
</html>