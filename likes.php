<?php
require_once 'session.php';
require_once 'config.php';
include_once 'include/header.php';
?>

<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT likes FROM posts WHERE ID = ?";
    $stmtlikes= $db->prepare($sql);
        $stmtlikes->execute([$id]);
        while ($r = $stmtlikes->fetch()){
            $likes=$r['likes'];
        }
    $likes++;
    $sql="UPDATE posts SET likes=? WHERE ID=?";
    $insert=$db->prepare($sql);
    $result=$insert->execute([$likes,$id]);
    if($result){
        echo '<script>window.location.replace("addpost.php");</script>';
        echo 'Likes Updated Successfully';
    }



}

?>