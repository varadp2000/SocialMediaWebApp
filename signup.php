<?php
require_once 'session.php';
require_once 'config.php';
include_once 'include/header.php';


if(isset($_SESSION['user'])){
    echo '<script>window.location.replace("dashboard.php");</script>';
}
?>
<html>
    <head>
        <title>Sign Up</title>   
    </head>
    <body>
        <br><br><br>
        <div class="container">
        <div class="form group">
        <div class="alert alert-dark">
            <form action="signup.php" method="POST">
                <input class="form-control" type="text" id="fname" placeholder="First Name" name="fname" required><br>
                <input class="form-control" type="text" id="lname" placeholder="Last Name" name="lname" required><br>
                <input class="form-control" type="number" id="cno" placeholder="Contact No" name="cno" required><br>
                <input class="form-control" type="email" id="email" placeholder="Email" name="email" required><br>
                <input class="form-control" type="password" id="pass" placeholder="Password" name="pass" required><br>
                 <input class="btn btn-primary" id="register" type="submit" placeholder="Sign Up" name="Submit">
            </form>
        </div>
        </div>
</div>
    </body>
</html>
<?php


if(isset($_POST['Submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $cno=$_POST['cno'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    
    
        $sql= "INSERT INTO info (fname,lname,pno,email,pass) VALUES(?,?,?,?,?)";
        $stmtinsert= $db->prepare($sql);
        $result= $stmtinsert->execute([$fname,$lname,$cno,$email,$pass]);

    if($result){
        echo '<script>window.location.replace("login.php");</script>';
    }
    else{
        echo 'Error Saving';
    }

    
}


?>

<?php

include_once 'include/footer.php';
?>