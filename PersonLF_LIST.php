<?php
    session_start();
    if($_SESSION['Permission'] == 1)include_once("navbarHR.php");
    else include_once("navbar.php");
    include_once("dbcon.php");
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $query = "";
    $query2 = "";
    mysqli_query($connect, "SET NAMES UTF8");
    $EMP_ID = $_SESSION['EMP_ID'];
    $query1 = "SELECT LF_ID,LF_NO,LEAVE_BEGIN,LEAVE_END,LEA_STAT,LTYPE_DES,DAY_LEAVE FROM LEAVEFORM inner join LEAVETYPE WHERE EMP_ID = '$EMP_ID' and LEAVEFORM.LTYPE_ID = LEAVETYPE.LTYPE_ID ORDER BY LF_CREATE ";
    $result1 = mysqli_query($connect, $query1);
    //echo $query1;
    //$result2 = mysqli_query($connect, $query2);
    $dataRow = "";
    //while ($row1 = mysqli_fetch_array($result1)) {
    //    $dataRow = $dataRow . "";
    //}
    // if(isset($_POST['cancle'])){
    //     echo "eee";
    //     $set = $row1[0];
    //     $query1 = "UPDATE LEAVEFORM SET LEA_STAT = 'ยกเลิก' where LF_ID = '$set';";
    //     $result1 = mysqli_query($connect, $query1);
    //     header('location:PersonLF_LIST.php');
    // }
    $i = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaveform_Stat</title>
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
        <div class="container">
            <br><br>
            <?php while ($row1 = mysqli_fetch_array($result1)) :;?>            
            <form action="" method="POST">
                <div class="card" style="width: 70rem;">
                    <div class = "card-header">
                        <h4 class="card-title my-auto"><?php echo $row1[0]; ?> <?php echo $row1[1]; ?></h4> <!--LF_ID + LF_NO-->
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title"><?php echo $row1[4]; ?></h5>
                        <h6 class="card-subtitle mb-2"><?php if($row1[2]!=$row1[3]){ echo $row1[2]; echo " ถึง "; echo $row1[3];} else { echo $row1[2];} ?></h6>
                        <p class="card-text">ลา<?php echo $row1[5]; ?></p>
                        <p class="card-text">จำนวนวันที่ลา :<?php echo $row1[6];?> วัน</p>
                        <a href="#" class="btn btn-primary" name = see>See</a>
                        <button href="#" class="btn" name = "cancle">Cancle</button>
                        <?php                       
                        $LFID[$i] = $row1[0];
                        if(isset($_POST['cancle'])){
                            $query1 = "UPDATE LEAVEFORM set LF_ID = 'ยกเลิก' ";
                            $result1 = mysqli_query($connect, $query1);
                        } 
                        ?>

                    </div>
                </div>
            </form>    
            <br><br>
            
            <?php 
            $i++;
            endwhile; ?>                                                                    
        </div>                                                                                    
        <br><br>
            
        


    </div>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>    
</html>