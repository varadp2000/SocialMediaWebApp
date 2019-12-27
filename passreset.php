<?php
require_once 'config.php';
require_once 'session.php';
include_once 'include/header.php';
$email=$_SESSION['user'];
session_destroy();
        unset($_SESSION['user']);

?>
<html>
    <head>
        <title>Reset Password</title>
    </head>
    
    <body>
        <div class= "container">
        <div class="alert alert-dark">
        <form class="form-group" action="passreset.php" method="POST">
            <input type="password" class="form-control" name="pass" placeholder="Enter New Password" required><br>
            <input type="submit" class="btn btn-primary" name="submit" required><br>
        </form>
    </div>
    </div>
    </body>
</html>


<?php
echo "<a class='form-control'>Reset password for ".$email.".</a>";
if(isset($_POST['submit'])){
    $pass=md5($_POST['pass']);

    $sql= "UPDATE info SET pass = ? WHERE email=?";
    $stmt=$db->prepare($sql);
    $result = $stmt->execute([$pass,$email]);
    if($result){
        echo "Password Update Successful";
        echo "<script>window.location.replace('login.php');</script>";
    }
    else{
        echo 'Password Update failed';
    }
}



?>

<?php
echo '<br><br><br><br><br><br><br><Br><br><br><Br><br><nr><br><br>';
require_once 'include/footer.php';

?>