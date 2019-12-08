<?php
require_once 'config.php';
include_once 'include/header.php'
?>


<?php
session_start();
if(isset($_SESSION['user'])){
    $sql= "SELECT * FROM info WHERE email= ? LIMIT 1";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute([$_SESSION['user']]);


    while ($r = $stmtselect->fetch()) {
        echo '<br><br><div class="container">';
        echo '<div class="card" style="width:50rem;">';
        echo '<div class="card-body" >';
        echo '<h1 class="card-title">'.$r['fname'].'   '.$r['lname'].'</h5>';
        echo '<p class="card-text">Email:'.$r['email'].'<br>Contact No:'.$r['pno'].'</p><br></div>';
    }
    


if(!$stmtselect->rowCount()>0){
    alert('error finding user');
}

}
else{
    header('location:index.php');
}


?>