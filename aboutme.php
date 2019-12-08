<?php
require_once 'session.php';
require_once 'config.php';
include_once 'include/header.php';
echo ' <meta name="viewport" content="width=device-width, initial-scale=1.0">';
?>


<?php

if(isset($_SESSION['user'])){
    $sql= "SELECT * FROM info WHERE email= ? LIMIT 1";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute([$_SESSION['user']]);


    while ($r = $stmtselect->fetch()) {
        echo '<br><br><div class="container">';
        echo '<div class="card">';
        echo '<div class="card-body" >';
        echo '<h1 class="card-title">'.$r['fname'].'   '.$r['lname'].'</h5>';
        echo '<p class="card-text">Email:'.$r['email'].'<br>Contact No:'.$r['pno'].'</p><br></div></div></div>';
    }
    


if(!$stmtselect->rowCount()>0){
    alert('error finding user');
}

}
else{
    header('location:index.php');
}


?>


<?php

include_once 'include/footer.php';
?>