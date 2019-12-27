<?php
include_once 'session.php';
require_once 'config.php';
include_once 'include/header.php';




?>

<?php

if(isset($_SESSION['user'])){
    echo '<script>window.location.replace("dashboard.php");</script>';
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION);
    echo '<script>window.location.replace("index.php");</script>';
}

?>

<?php
$sql= "SELECT * FROM posts";
$stmtselect= $db->prepare($sql);
$result= $stmtselect->execute();







?>



<html>
    <head>
        <title>Welcome</title>
    </head>
    <body id="body">
        <br><br>
        <div class="container">
        <h1 style="text-decoration:underline;text-shadow: 3px 2px white;font-family:cursive" align="center">Welcome to MySocialApp</h1>
        <div class="container">
        <div align="center">
        <img class="container" src="include/connect.jpg"></img> 
        </div><br>
        <div align="center" class="sm-4" style="top:0">
        <div class="btn-group">
            <button class="btn btn-dark" type="button"><a class="btn btn-dark" href="signup.php">Sign Up</a></button>
            <button class="btn btn-dark" type="button"><a class="btn btn-dark" href="login.php">Login</a></Button>
        </div>
        </div>
</div>
</div>
<br><br>
    </body>
</html>


<?php

include_once 'include/footer.php';
?>