<?php
        //connect data base

        if
         (isset($_POST))
        {
          session_start();
            //var_dump($_POST);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "employee";
            $a = strval($_POST['User_name']);
            $b = strval($_POST['User_email']);
            $c = strval($_POST['User_password']);
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `users` (`User_name`, `User_password`, `User_email`) VALUES ('$a', '$b', '$c')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }
            
            $conn = null;
          
        //   if($User_password == $User_password2)
        //   {
        //     //create database
        //     $User_password = md5($User_password);
        //     $sql = " INSERT INTO users(User_name,User_email,User_password ) VALUES ('$User_name' , '$User_email' , '$User_password')";
        //     mysqli_query($db,$sql);
        //     $_SESSION['massage'] = "you are now login";
        //     $_SESSION['User_name'] = $User_name;
        //     header("location: home.php");
        //   }else
        //   {
        //     $_SESSION['massage'] = "The two password do not match";
        //   }
        }
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Register</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link href="css/bootstrap.min.css" rel="stylesheet"> 
            <script src="js/bootstrap.min.js"></script>
            <link href="signin.css" rel="stylesheet">
        </head>
        <body>
        <div class="container">
        <div class="jumbotron">
            <div class="row">
                    <div class="card">
                        <form class="form-signin" action="register.php" method="post">
                            <div class="jumbotron">
                                <div class="bg-regis">
                                <div class="card-header text-center">
                                    <h2 class="form-signin-heading">LEAVE FORM</h2>
                                    <hr class="my-4">
                                </div>
                                </div>
                            </div>    
                                <div class="form-group row">     
                                    <label for="firstname" class="col-sm-2 "><h4>ชื่อ</h4></label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="User name" required autofocus>
                                        </div>
                                    <label for="firstname" class="col-sm-2 "><h4>นามสกุล</h4></label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="Last name" required autofocus>
                                        </div>
                                </div>

                                 <div class="form-group row">     
                                    <label for="firstname" class="col-sm-2 "><h4>ประเภทบุคลากร</h4></label>
                                        <div class="col-sm-3">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="  " required autofocus>    
                                        </div>
                                    <label for="firstname" class="col-sm-2 "><h4>ตำเเหน่ง</h4></label>
                                        <div class="col-sm-3 ">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder=" " required autofocus>
                                        </div>
                                </div>

                                 <div class="form-group row">      
                                    <label for="firstname" class="col-sm-2 "><h4>มีความประสงค์ลา</h4></label>
                                            <div class="col-sm-5">
                                                <label><input type="radio" name="optradio"checked>ลากิจ</label>
                                                <label><input type="radio" name="optradio"checked>ลาป่วย</label>
                                                <label><input type="radio" name="optradio" checked>ลาป่วย  (มีใบรับรองเเพทย์)</label>
                                                <label><input type="radio" name="optradio" checked>ลาคลอด</label>
                                            </div>   
                                </div>

                                <div class="form-group row">        
                                    <label for="firstname" class="col-sm-2 "><h4>ตั้งเเต่วันที่</h4></label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="DD/MM/YYYY" required autofocus>
                                        </div>
                                    <label for="firstname" class="col-sm-2 "><h4>ถึงวันที่</h4> </label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="DD/MM/YYYY" required autofocus>
                                        </div>

                                </div><div class="form-group row">        
                                    <label for="firstname" class="col-sm-2 "><h4>ตั้งเเต่เวลา</h4></label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="user_Name" class="form-control" placeholder="start time" required autofocus>
                                        </div>
                                    <label for="firstname" class="col-sm-2 "><h4>ถึงเวลา</h4> </label>
                                        <div class="col-sm-4">
                                            <input type="text" id="firstname" name="e" class="form-control" placeholder="end time" required autofocus>
                                        </div>
                                </div>

                                 <div class="form-group row">        
                                    <label for="firstname" classuser_Nam="col-sm-2 "><h4>เนื่องจาก</h4></label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                                                                    
                                <div class="container ">
                                    <div class="form-signin box ">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                </div>         
                        </form>
                    </div>
            </div>
        </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>