<?php
require_once'session.php';
require_once 'config.php';
include_once 'include/header.php'
?>

<?php 
    if(!isset($_SESSION['user'])){
        echo '<script>window.location.replace("login.php");</script>';
    }

    echo $_SESSION['user'].'<br>';

?>


<html>
    <head>
        <title>DashBoard</title>
    </head>
    <body>
        <div class="alert-dark" style="width:40rem">
        <div class="btn btn-group">
        <Button class="btn btn-dark" "><a href="addpost.php">AddPost</a></button><br>
        <Button class="btn btn-dark" "><a href="showpost.php">ShowPosts</a></button><br>
        <Button class="btn btn-dark" "><a href="aboutme.php">AboutMe</a></button>  
        <Button class="btn btn-dark" "><a href="search.php">Search User</a></button>     
        <div style="height:30px;width:100px;">
            <Button class="btn btn-dark" "><a href="index.php?logout=true">LogOut</a></button>
    </div>
    </div>
    </div>
        
    </body>
</html>