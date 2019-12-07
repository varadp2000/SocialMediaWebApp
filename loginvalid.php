<?php
require_once 'config.php';
?>

<?php
if(isset($_POST)){
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    

    $sql= "SELECT * FROM info WHERE email= ? AND pass=? LIMIT 1";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute([$email,$pass]);

    if($stmtselect->rowCount()>0){
        echo 'Successful';
    }
    else{
        echo 'Failed';
    }
}


?>