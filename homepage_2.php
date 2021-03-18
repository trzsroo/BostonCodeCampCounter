<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
    echo $_SESSION["loggedin"];
}

require_once "phpscripts/dbconnect.php";

$sql = "SELECT account_type FROM users WHERE id = '".$_SESSION["id"]."'";
$result = $link->query($sql);
$row = mysqli_fetch_row($result);
$msg="";
$msg2 = "";
if($row[0] == "teacher"){
    $msg = "<a class=\"active\" href=\"create_course.php\">Create Course</a>";
    $msg2 = "<a class=\"active\" href=\"manage_courses.php\">Manage Owned Courses</a>";
}
else{
    $msg = "";
    $msg2 = "";
}

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="stylesheets/homepage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="scripts/homepage.js"></script>
  </head>
  <body>
    <div class="top_bar">
      <a class="active" href="homepage.php">Home</a>
      <span><?php echo $msg ?></span>
      <a class="active" href="add_course.php">Register Course</a>
      <a class="active" href="remove_course.php">De-Register Course</a>
      <span><?php echo $msg2 ?></span>
      <a href="phpscripts/logout.php">Logout <i><?php echo htmlspecialchars($_SESSION["username"]); ?></i></a>
    </div>
    
    <div id="courses">

    </div>
    <script type="text/javascript">
        getCourses();
    </script>
  </body>
</html>