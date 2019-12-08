<?php
require_once 'config.php';
include_once 'include/header.php';


session_start();
if(isset($_SESSION['user'])){
    header('location:dashboard.php');
}
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="login.php" method="POST">
            <div class="container" style="width:40rem">
                <div class="alert alert-dark"><h3>Enter Your Info</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required><br>
                        <input type="Password" name="pass" class='form-control' placeholder="Password" requierd><br>
                        <input type="submit" class="btn btn-dark" name="log" value="Login">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

<?php
if(isset($_POST['log'])  ){
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    

    $sql= "SELECT * FROM info WHERE email= ? AND pass=? LIMIT 1";
    $stmtselect= $db->prepare($sql);
    $result= $stmtselect->execute([$email,$pass]);

    if($stmtselect->rowCount()>0){
        header("Location: dashboard.php");
        session_start();
        $_SESSION['user']=$email;
        echo 'Successful';

        
    }
    else{
        echo 'Failed';
    }
}


?>





