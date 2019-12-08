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
    <body>
        <br><br>
        <div align="center">
        <div class="alert-dark" align="center">
            <button class="btn btn-dark" type="button"><a class="btn btn-dark" href="signup.php">Sign Up</a></button>
            <button class="btn btn-dark" type="button"><a class="btn btn-dark" href="login.php">Login</a></Button>
        </div>
</div>

    </body>
</html>


<?php

include_once 'include/footer.php';
?>