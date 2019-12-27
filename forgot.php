<?php
require_once 'config.php';
require_once 'session.php';
include_once 'include/header.php';


?>
<html>
    <head>
        <title>Forgot Password</title>
    </head>
    <body>
        <br><br>
        <div class="container">
        <div class="alert alert-dark">
        <form class="form-group" action="forgot.php" method="POST">
            <input type="email" class="form-control" placeholder="Email" name="email"><br>
            <select class="custom-select my-1 mr-sm-2" name="seq">
                    
                    <option value="1">What is your Grandfather Name?</option>
                    <option value="2">What was your first phone number?</option>
                    <option value="3">What was make of your first smartphone?</option>
                    <option value="4">Who was your first bench partner?</option>
                    <option value="5">What was your favourite cartoon series in childhood?</option>
            </select> <br><br>
            <input class="form-control" type="password" placeholder="Answer(Case Sensitive)" name="ans"><br>
            <input class="btn btn-danger" id="register" type="submit" name="Submit"><br>

        </form>
    </div>
    </div>
    </body>
</html>

<?php
if(isset($_POST['Submit'])){
    $seq=$_POST['seq'];
    $ans=md5($_POST['ans']);
    $email=$_POST['email'];

//echo '<br><br>'.$seq.'<br>'.$ans;

    $sql="SELECT * FROM info WHERE email=? AND seq=? AND sans=? LIMIT 1";
    $stmnt=$db->prepare($sql);
    $result=$stmnt->execute([$email,$seq,$ans]);

    if($stmnt->rowCount()>0){
        echo "<script>window.location.replace('passreset.php');</script>";
        $_SESSION['user']=$email;
    }
    else{
        echo 'User Not Found';
    }

}


?>




<?php
echo '<br><br><Br><br><br><br><br>';
require_once 'include/footer.php';

?>