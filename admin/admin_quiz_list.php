<?php 
include("connection.php");


$search = '';
$offset = 3; 
$page_id = isset($_GET['page-no']) ? $_GET['page-no'] : 1;
$start_limit = ($page_id - 1) * $offset;


if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $_SESSION['search'] = $search;
} elseif (isset($_SESSION['search'])) {
    $search = $_SESSION['search'];
}

$query = "SELECT * FROM `quiz_list` WHERE `name` LIKE '%$search%' OR `id` LIKE '%$search%' LIMIT $start_limit,$offset";
$resultsearch = mysqli_query($conn, $query);

$count_query = "SELECT COUNT(*) as count FROM `quiz_list` WHERE `name` LIKE '%$search%' OR `id` LIKE '%$search%'";
$count_result = mysqli_query($conn, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$count = $count_row['count'];
$no_pages = ceil($count / $offset);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="statUpdate() " id="<?php echo $page_id; ?>">
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
            <div class="page-menu">
                <div class="page-title-container">
                    <h1>Quiz List</h1>
                </div>
                <div class="search-section">
                    <div class="row">
                        <form method="post" class="search-bar">
                            <input type="text" name="search" id="search" placeholder="Add Your Text" value="<?php echo $search;?>">
                            <button name="submit" class="search-button" id="add-btn" >Search</button>   
                        </form>
                    </div>
                </div>
            </div>
            <div class="export-and-add-section">
                <button class="search-button" id="export-btn" onclick="openPopup()">Import/Export</button>
                <a href="create_quiz.php">Add Quiz</a>

            </div>
            <div class="table-and-pagination">
                <div class="table-container">
                    <table id="class_table">
                        <?php
                        if ($resultsearch && mysqli_num_rows($resultsearch) > 0) {
                            ?>
                            <thead>
                                <th>ID</th>
                                <th>Class Name</th>
                                <th>Class Image</th>
                                <th>DOE</th>
                                <th>ADD QUESTION</th>
                                <th>EDIT QUESTION</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($resultsearch)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><img src="assets/images/<?php echo $row['image']; ?>" width="150px"></td>
                                    <td><?php echo $row['doe']; ?></td>
                                    <td><a href="add_to_quiz.php?quiz_list_id=<?php echo $row['id'];?>"><i class="fa fa-plus" style="font-size:24px"></i></a></td>
                                    <td><a href="add_to_quiz.php?quiz_list_id=<?php echo $row['id'];?>"><i class="fa fa-pencil" style="font-size:24px"></i></a></td>
                                    <td><a href="edit_quiz.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="font-size:24px"></a></td>
                                    <td><a href="process.php?id=<?php echo $row['id']; ?>&mode=delete" onclick="return confirm('Do want to delete?')"><i class="fa fa-trash-o" style="font-size:24px"></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <?php
                        } else {
                            ?>
                            <script>alert("No Result Found")</script>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="page-container">
                    <div class="pagination-contaienr">
                        <div class="page-info-container">
                            <div class="page-info">
                                Showing <?php echo $page_id ?> of <?php echo $no_pages ?> pages
                            </div>
                        </div>
                        <div class="pagination">
                            <a href="?page-no=1<?php echo $search ? '&search=' . $search : ''; ?>">First</a>
                            <?php
                            if ($page_id > 1) {
                                ?>
                                <a href="?page-no=<?php echo $page_id - 1; ?><?php echo $search ? '&search=' . $search : ''; ?>">Previous</a>
                                <?php
                            } else {
                                ?>
                                <a>Previous</a>
                                <?php
                            }

                            for ($counter = 1; $counter <= $no_pages; $counter++) {
                                ?>
                                <!-- <a href="?page-no=<?php echo $counter; ?><?php echo $search ? '&search=' . $search : ''; ?>">
                                    <?php echo $counter; ?>
                                </a> -->
                                <?php
                            }
                            if($page_id>1 && $page_id<$no_pages){
                            ?>
                            <a href="?page-no=<?php echo $page_id - 1; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id - 1; ?></a>
                            <a href="?page-no=<?php echo $page_id ; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id ; ?></a>`
                            <a href="?page-no=<?php echo $page_id + 1; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id + 1; ?></a>

                            <?php
                            }else if($page_id==1){
                                ?>
                                <a href="?page-no=<?php echo $page_id ; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id ; ?></a>`
                                <a href="?page-no=<?php echo $page_id + 1; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id + 1; ?></a>

                                <?php
                            }else if($page_id==$no_pages){
                                ?>
                                <a href="?page-no=<?php echo $page_id - 1; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id - 1; ?></a>
                                <a href="?page-no=<?php echo $page_id ; ?><?php echo $search ? '&search=' . $search : ''; ?>"><?php  echo $page_id ; ?></a>`
                                <?php
                            }


                            if ($page_id < $no_pages) {
                                ?>
                                <a href="?page-no=<?php echo $page_id + 1; ?><?php echo $search ? '&search=' . $search : ''; ?>">Next</a>
                                <?php
                            } else {
                                ?>
                                <a>Next</a>
                                <?php
                            }
                            ?>
                            <a href="?page-no=<?php echo $no_pages; ?><?php echo $search ? '&search=' . $search : ''; ?>">Last</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>