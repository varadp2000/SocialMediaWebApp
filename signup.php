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
    <body >
    <h1 style="text-decoration:underline;text-shadow: 3px 2px white;font-family:cursive" align="center">Welcome</h1>
        <div class="form-group">
        <div class="alert alert-dark" >
            <form action="signup.php" method="POST">
                <input class="form-control" type="text" id="fname" placeholder="First Name" name="fname" required><br>
                <input class="form-control" type="text" id="lname" placeholder="Last Name" name="lname" required><br>
                <input class="form-control" type="number" id="cno" placeholder="Contact No" name="cno" required><br>
                <input class="form-control" type="email" id="email" placeholder="Email" name="email" required><br>
                <div class="form-inline">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Select Security Question :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select class="custom-select my-1 mr-sm-2" name="seq">
                    
                    <option value="1">What is your Grandfather Name?</option>
                    <option value="2">What was your first phone number?</option>
                    <option value="3">What was make of your first smartphone?</option>
                    <option value="4">Who was your first bench partner?</option>
                    <option value="5">What was your favourite cartoon series in childhood?</option>
                </select> <input class="form-control" type="password" placeholder="Answer" name="ans"></div><br>

                <input class="form-control" type="password" id="pass" placeholder="Password" name="pass" required><br>
                 <input class="btn btn-danger" id="register" type="submit" placeholder="Sign Up" name="Submit">
            </form>
            <br>
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
    $seq=$_POST['seq'];
    $pass=md5($_POST['pass']);
    $sans=md5($_POST['ans']); 
    
        $sql= "INSERT INTO info (fname,lname,pno,email,pass,seq,sans) VALUES(?,?,?,?,?,?,?)";
        $stmtinsert= $db->prepare($sql);
        $result= $stmtinsert->execute([$fname,$lname,$cno,$email,$pass,$seq,$sans]);

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