<?php
require_once 'config.php';
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
    </head>
    <body>
        <form>
            <div class="container" style="width:40rem">
                <div class="alert alert-dark"><h3>Enter Your Info</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" required><br>
                        <input type="Password" id="pass" class='form-control' placeholder="Password" requierd><br>
                        <input type="submit" class="btn btn-dark" name="log" placeholder="Log In" id="login" value="Login">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#login').click(function(e){
            var valid=this.form.checkValidity();
            if(valid){
                var email=$('#email').val();
                var pass=$('#pass').val();

                    e.preventDefault();
                    $.ajax({
                        type:'POST',
                        url:'loginvalid.php',
                        data:{email:email, pass:pass},
                        success:function(data){
                            alert(data);
                            if($.trim(data)==="Successful"){
                                setTimeout('window.location.href= "index.php"',2000)
                            }
                        },
                    });
            }
                else{
                    alert('false');
                }
        });
        
    });
</script>


