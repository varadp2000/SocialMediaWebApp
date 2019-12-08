<?php
include_once 'session.php';
require_once 'config.php';
include_once 'include/header.php'
?>


<?php
echo '<Head><title>Posts</title></head>';

if(isset($_SESSION['user'])){
    $sql= "SELECT * FROM posts";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute();


    while ($r = $stmtselect->fetch()) {
        echo '<div class="container"><div class="card" style="font-family:Arial Black;aligh:center">';
        echo '<img class="card-img-top" alt="'.$r['email'].'" src="'.$r['image'].'"></img>';
        echo '<div class="card-body" >';
        echo '<div class="alert alert-dark"><h5 class="card-title">'.$r['email'].'</h5>';
        echo '<div class="card-text">Post:<br><p>'.$r['post'].'</p><br>';
        echo '<a class="navbar-brand">'.$r['likes'].' Likes'.'</a><a class="btn btn-dark" href="likes.php?id='.$r['ID'].'">Like</a>   ';
        echo '</div></div></div></div></div><br><br>';
    }
    


if(!$stmtselect->rowCount()>0){
    echo '<div class="container"><div class="alert alert-dark" style="width:50rem">No New Posts</div></div>';
}

}
else{
    echo '<script>window.location.replace("index.php");</script>Failed';
}




include_once 'include/footer.php';
?>