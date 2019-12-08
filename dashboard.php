<?php
require_once'session.php';
require_once 'config.php';
include_once 'include/header.php'
?>

<?php 
    if(!isset($_SESSION['user'])){
        echo '<script>window.location.replace("login.php");</script>';
    }

    echo '<br><br><div class="container"><h2 class="navbar-brand">UserName: '.$_SESSION['user'].'</h2><br>';

?>



<html>
    <head>
        <title>DashBoard</title>
    </head>
    <body>
        <br><br><br>
        
        <div class="alert-dark">
            <div class="container" style="text-align:center">
        <div class="btn-group-vertical" style="display:inlint-block">
            
        <Button class="btn btn-secondary"><a class="btn btn-secondary" href="addpost.php">AddPost</a></button>
        <Button class="btn btn-dark" "><a class="btn btn-dark" href="showpost.php">ShowPosts</a></button>
        <Button class="btn btn-primary" "><a class="btn btn-primary" href="aboutme.php">AboutMe</a></button>
        <Button class="btn btn-info" "><a class="btn btn-info" href="search.php">Search User</a></button>   
        <Button class="btn btn-danger" "><a class="btn btn-danger" href="index.php?logout=true">LogOut</a></button>
</div>
    </div>
    </div>
</div> <br><br>
    </body>
</html>

<?php
echo '<div class="container"><a class="navbar-brand">Your Posts:<br></a></div';

if(isset($_SESSION['user'])){
    $sql= "SELECT * FROM posts WHERE email=?";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute([$_SESSION['user']]);


    while ($r = $stmtselect->fetch()) {
        echo '<div class="container"><div class="card" style="font-family:Arial Black;aligh:center">';
        echo '<img class="card-img-top" alt="'.$r['email'].'" src="'.$r['image'].'"></img>';
        echo '<div class="card-body" >';
        echo '<div class="alert alert-dark"><h5 class="card-title">'.$r['email'].'</h5>';
        echo '<div class="card-text">Post:<br><p>'.$r['post'].'</p><br>';
        echo '<a class="navbar-brand">'.$r['likes'].' Likes'.'</a>   ';
        echo '</div></div></div></div></div></div><br><br><br><br>';
    }
    


if(!$stmtselect->rowCount()>0){
    echo '<div class="container"><div class="alert alert-dark" >No New Posts</div></div>';
}

}
else{
    echo '<script>window.location.replace("index.php");</script>Failed';
}

?>


<?php

include_once 'include/footer.php';
?>