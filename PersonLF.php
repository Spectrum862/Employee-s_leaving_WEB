<?php
    include_once("navbar.php");
    include_once("dbcon.php");
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $query = "";
    $query2 = "";
    mysqli_query($connect, "SET NAMES UTF8");
    $query1 = "SELECT LF_ID,LF_NO,LEA_STAT,LF_CREATE,EMP_ID,EMP_FNAME,EMP_LNAME,LTYPE_DES,LEAVE_BEGIN,LEAVE_END,DAY_LEAVE,LF_DES FROM EMPLOYEE natural left outer join (LEAVEFORM natural left outer join LEAVETYPE) WHERE LF_ID = '41'";
    $result1 = mysqli_query($connect, $query1);
        //echo $query1;
        //$result2 = mysqli_query($connect, $query2);
    $dataRow = "";
    $dataRow2 = "";
    //while ($row1 = mysqli_fetch_array($result1)) {
        //$dataRow = $dataRow . "<h4>Firstname : $row1[]</h4>";
    //}
?>
<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PersonalLF</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    
</head>
    <body>
    <div class="container-fluid Bg2 " style="min-height:94vh;">       
        <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
            <div class = "row">
                <div class = "col"></div>
                <div class = "col"  style = "margin-top:10vh">    
                    <div class="card">
                        <div class = card-body>
                            <h1>Leaveform ID : <?php echo $row1[0]?></h1>
                            <h1>Leaveform No: <?php echo $row1[1]?></h1>
                            <h2>Status : <?php echo $row1[2] ?></h2>
                            <h4>Date created : <?php echo $row1[3] ?></h4>
                            <h4>Employee ID : <?php echo $row1[4] ?></h4> 
                            <h4>---------------------------------</h4> 
                            <ul>
                                <h4>Firstname : <?php echo $row1[5] ?></h4>
                                <h4>Lastname : <?php echo $row1[6] ?></h4>
                                <h4>Leavetype : <?php echo $row1[7]?></h4>
                                <h4>Date begin : <?php echo $row1[8] ?></h4>
                                <h4>Date end : <?php echo $row1[9] ?></h4>
                                <h4>จำนวนวันที่ลา : <?php echo $row1[10] ?></h4>
                                <h4>Description : <?php echo $row1[11] ?></h4>
                            </ul>
                        </div>                                                                           
                    </div>                                                                                   
                    <br><br>
                </div>
                <div class = "col"></div>
            </div>   
        <?php endwhile; ?>
    </div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    </body>
</html>