<?php
require_once 'config.php';
include_once 'include/header.php';
include_once 'showpost.php';
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


