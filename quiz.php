<?php 
include("admin/connection.php");

if (isset($_REQUEST['quiz_id'])){
    $quiz_id=$_REQUEST['quiz_id'];
};
$list_query = "SELECT * FROM `quiz_list` WHERE `id`='$quiz_id'";
$listresult = mysqli_query($conn,$list_query);
$list_row=mysqli_fetch_assoc($listresult);
$table_name=$list_row['name'];
$all_query = "SELECT * FROM `$table_name`";
$all_query_run = mysqli_query($conn, $all_query);
$count = mysqli_num_rows($all_query_run);
$id= isset($_GET['id'])?$_GET['id'] :1;
$query = "SELECT * FROM `$table_name` WHERE id='$id'";
$result = mysqli_query($conn, $query);
$score;
$heading_name = str_replace("_"," ",$table_name);
$heading_name = ucwords($heading_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="quiz_style.css">
</head>
<body>
    <div class="app">
        <h1><?php echo $heading_name?></h1>
        <div class="quiz">
            <?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <h2 id="question"><?php echo $row['question']?></h2>
            <div class="" id="answer-buttons">
                <button class="btn" id="o1" onclick="checkOption1()"><?php echo $row['option_1']?></button>
                <button class="btn" id="o1check" hidden><?php echo $row['o1check']?></button>
                <button class="btn" id="o2"onclick="checkOption2()"><?php echo $row['option_2']?></button>
                <button class="btn" id="o2check" hidden><?php echo $row['o2check']?></button>
                <button class="btn" id="o3" onclick="checkOption3()"><?php echo $row['option_3']?></button>
                <button class="btn" id="o3check" hidden><?php echo $row['o3check']?></button>
                <button class="btn" id="o4" onclick="checkOption4()"><?php echo $row['option_4']?></button>
                <button class="btn" id="o4check" hidden><?php echo $row['o4check']?></button>
            </div>
            <?php
            }
            ?>
            <a id="next-btn" href="quiz.php?id=<?php 
            if($id++ >$count){
                header('location:quiz_answer.php?quiz_id='.$quiz_id.'&h_name='.$table_name);
            }
            else{
                echo $id++;
            }

            ?>&quiz_id=<?php echo $quiz_id?>">Next</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>