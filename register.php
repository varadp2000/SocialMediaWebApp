<?php
require_once 'config.php';

?>
<?php
if(isset($_POST)){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $no=$_POST['cno'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    
    
        $sql= "INSERT INTO info (fname,lname,pno,email,pass) VALUES(?,?,?,?,?)";
        $stmtinsert= $db->prepare($sql);
        $result= $stmtinsert->execute([$fname,$lname,$no,$email,$pass]);

    if($result){
        echo 'Data Saved';
    }
    else{
        echo 'Error Saving';
    }
    
}

else{
    echo 'No Data';
}
?>