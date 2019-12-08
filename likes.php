<?php
require_once 'config.php';
include_once 'include/header.php'
?>

<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT likes FROM posts WHERE ID = ?";
    $stmtlikes= $db->prepare($sql);
        $stmtlikes->execute([$id]);
        while ($r = $stmtlikes->fetch()){
            echo $r['likes'];
            $likes=$r['likes'];
        }
    $likes++;
    echo '<br>'.$likes;
    $sql="UPDATE posts SET likes=? WHERE ID=?";
    $insert=$db->prepare($sql);
    $result=$insert->execute([$likes,$id]);
    if($result){
        header('Location:addpost.php');
        echo 'Likes Updated Successfully';
    }



}

?>