<?php
    session_start();
    if($_SESSION['Permission'] == 1)include_once("navbarHR.php");
    else include_once("navbar.php");
    include_once("dbcon.php");
    //กิจ
    $EMPID = $_SESSION['EMP_ID'];
    $sql = "SELECT  sum(DAY_LEAVE) as nday FROM employee natural left outer join (leaveform natural left outer join leavetype ) where employee.EMP_ID = '$EMPID' and leavetype.QUOTA_TYPE = 2;";
    $result =  $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['nday']== null)
        $ndayE = 0;
    else
        $ndayE = $row['nday'];
    //ป่วย
    $sql = "SELECT  sum(DAY_LEAVE) as nday FROM employee natural left outer join (leaveform natural left outer join leavetype ) where employee.EMP_ID = '$EMPID' and leavetype.QUOTA_TYPE = 1;";
    $result =  $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['nday']== null)
        $ndayS = 0;
    else
        $ndayS = $row['nday'];
    //ผักผ่อน
    $sql = "SELECT  sum(DAY_LEAVE) as nday FROM employee natural left outer join (leaveform natural left outer join leavetype ) where employee.EMP_ID = '$EMPID' and leavetype.QUOTA_TYPE = 3;";
    $result =  $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['nday']== null)
        $ndayH = 0;
    else
        $ndayH = $row['nday'];
    $conn->close();
    $_SESSION['ndayE'] = $ndayE;
    $_SESSION['ndayH'] = $ndayH;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
            background-image: url("Pic/homepic.jpg");
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
 
 
            background-color:rgba(28, 28, 28,1);
 
        }

    </style>
</head>
<body>       
    
    <div class="container-fluid Bg2 " style="min-height:94vh;">

            
        <div class="row" >
            <div class = "col-lg-4"></div>
            <div class = "col-lg-4 text-center " style = "margin-top:15vh; ">
                <div class="card" style = "background-color:rgba(28, 28, 28,0); border-style: none; font-size: 20px;">
                    <div class="card-body" >
                    <h6 class="card text-white "  style = "background-color:rgba(28, 28, 28,0); border-style: none; font-size: 40px;" >Welcome to LeavingSystem</h6>
                    <p class="card-text"></p>
                   
                </div>
                </div>
            </div>                
            <div class = "col-lg-4"></div>        
        </div>
        
        
        <div class="row">
            <div class = "col-lg-2"></div>
            <div class = "col-lg-2 " style = "margin-top:3vh;">
                <div class="card text-left ">
                  <img class="card-img-top" src="https://images.unsplash.com/photo-1440778303588-435521a205bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&h=120&w=180&q=80&a=0.5" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Quota ลาพักผ่อน</h4>
                    <p class="card-text"><?php echo $ndayH?>/30 วัน</p>
                  </div>
                </div>
            </div>
            <div class = "col-lg-2 " style = "margin-top:3vh;">
                <div class="card text-left">
                  <img class="card-img-top" src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&h=120&w=180&q=80" alt="">
                  <div class="card-body">
                    <h4 class="card-title">Quota ลากิจ</h4>
                    <p class="card-text"><?php echo $ndayE?>/14 วัน</p>
                  </div>
                </div>
            </div>
            <div class = "col-lg-2 " style = "margin-top:3vh;">
                <div class="card text-left">
                  <img class="card-img-top" src="https://images.unsplash.com/photo-1521453510357-5c7a77db7074?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&h=120&w=180&q=80" alt="">
                  <div class="card-body">
                    <h4 class="card-title">ลาป่วย</h4>
                    <p class="card-text"><?php echo $ndayS?> วัน</p>
                  </div>
                </div>
            </div>
            <div class = "col-lg-2 " style = "margin-top:3vh;">
                <div class="card text-left">
                  <img class="card-img-top" src="https://images.unsplash.com/photo-1498049860654-af1a5c566876?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="">
                  <div class="card-body">
                    <h4 class="card-title">ขาด</h4>
                    <p class="card-text">not support</p>
                  </div>
                </div>
            </div>
        </div>


    </div>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>
</html>

