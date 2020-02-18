
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .Bg{
            background-image: url("Pic/LOGIN.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y:  top;
            background-position-x: left;
            background-attachment: fixed;
        }

        .Bg2{
            background-image: url("Pic/Login.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position-y:  top;
            background-position-x: left;
            background-attachment: fixed;
        }
        .login{
 
            height : 100vh;
            background-color:rgba(23, 40, 45,0.7);
 
        }
        
        .login2{
 
            height : 100vh;
            background-color:rgba(34, 34, 34,0.8);
 
        }

    </style>
</head>
<body>
    
    <div class="container-fluid Bg2 " style="min-height:100vh;">
        <div class="row justify-content-lg-end">
            <div class="col-xs-12 col-lg-3 login2">
                <form  action="" method="POST" style = "margin-top:40vh; margin-left:4vh; margin-right:4vh" >
                        <h2 class="form-signin-heading text-center text-white" >Please sign in</h2>
                        <input style = "margin-top:10px" type="text" id="user_ID" name="user_ID" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" style = "margin-top:10px" id="password" name="password" class="form-control" placeholder="Password" required>
                        <input type="submit" name="submit" value="Sign in " class = "btn btn-lg btn-block text-white " style = "margin-top : 15px;background:#ed8931">
                </form>              
            </div>  
            <div class = "col-lg-2"></div>          
        </div>
    </div>
    
    
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>




</body>
</html>
<?php
    session_start();
    include_once("dbcon.php");
    if(isset($_POST['submit'])){
        $username =  $_POST['user_ID'];
        $password = $conn->real_escape_string($_POST['password']);
        $sql = "SELECT * FROM account NATURAL LEFT OUTER JOIN (employee natural left outer join admin) where account.username = '$username' and account.pass = '$password'";
        $result =  $conn->query($sql);
        echo print_r($result);
        $row = $result->fetch_assoc(); 
        $_SESSION['name'] = $row['EMP_FNAME'];   
        $_SESSION['EMP_ID'] = $row['EMP_ID'];
        $_SESSION['Permission'] = $row['PERMIT_LV'];    
        if($result->num_rows == 1 ){
            $conn->close();
            header('location:home.php');

        }
        else
            echo "<script language='javascript' type='text/javascript' > alert('Username or Password incorrect');</script>";
            $conn->close();

    }

?>

