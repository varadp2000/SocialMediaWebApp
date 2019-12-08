<?php
require_once 'session.php';
require_once 'config.php';
include_once 'include/header.php';
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

?>

<html>
    <head>
        <title>Add Post</title>
    </head>
    <body>
        <br><br>
        <div class="container">
            <form action="addpost.php" method="POST" enctype="multipart/form-data">
                <textarea class="form-control" name="post" rows="10" column="10" placeholder="Write Something..."></textarea><br>
                <input class="form-control" type="file" name="file" placeholder="Add Image" ></input><br>
                <input class="btn btn-dark" type="submit" name="submit">
            </form>
        </div>
    </body>
</html>


<?php


if(isset($_POST['submit'])){
    $file_name=$_FILES["file"]["name"];
    $file_tem_loc=$_FILES["file"]["tmp_name"];
    $file_store="uploads/".$file_name;
    echo '<br>'.$file_name.'  '.$file_store. '  '.$file_tem_loc. '  <br><br>';
    if(move_uploaded_file($file_tem_loc,$file_store)){
        echo 'Successful';
    }
    else{
        echo 'failed';
    }
    
    $post=$_POST['post'];
    $email=$_SESSION['user'];
    $sql= "INSERT INTO posts (email,post,image) VALUES(?,?,?)";
        $stmtinsert= $db->prepare($sql);
        $result= $stmtinsert->execute([$email,$post,$file_store]);
        

        echo("<meta http-equiv='refresh' content='1'>");

        
    }




?>

<?php
require_once 'include/footer.php';

?>


