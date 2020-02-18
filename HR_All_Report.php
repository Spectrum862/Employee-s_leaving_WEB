<?php
    $hostname = "127.0.0.1:3306";
    $username = "root";
    $password = "F06245727e";
    $databaseName = "projectest";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    $query = "";
    $query2 = "SELECT count(distinct LEAVEFORM.EMP_ID),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and year(LEAVE_BEGIN) = '2018'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and year(LEAVE_BEGIN) = '2018'),
                    sum(DAY_LEAVE),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and year(LEAVE_BEGIN) = '2018')      
               FROM LEAVEFORM
               WHERE year(LEAVE_BEGIN) = '2018' and LEA_STAT = 'อนุมัติ' ";
    $query3 = "SELECT count(distinct LEAVEFORM.EMP_ID),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT count(distinct EMP_ID) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    sum(DAY_LEAVE),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8')      
               FROM LEAVEFORM
               WHERE year(LEAVE_BEGIN) = '2018' and month(LEAVE_BEGIN) = '8' and LEA_STAT = 'อนุมัติ' ";
    mysqli_query($connect, "SET NAMES UTF8");
    //$result1 = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query2);
    $result3 = mysqli_query($connect, $query3);
    $dataRow = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>All Department Report</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class = "container-fluid"> <!--for do other-->
            <h1>"All Department Report 2018"</h1>
        </div>
        <div class = "container-fluid"> <!--for do other-->
            <h1>--------------------------</h1>
            <h1>Yearly Leaving Report (2018)</h1>
            <?php while ($row2 = mysqli_fetch_array($result2)) :; ?>
                <h5>มีผู้ลางานในปีนี้ทั้งหมด (ทุกประเภท) <?php echo $row2[0]?> คน</h5>
                <ul>    
                    <h5> - มีผู้ลาป่วย : <?php if ($row2[1] == null) {echo 0;} else { echo $row2[1];} ?> คน</h5>
                    <h5> - มีผู้ลากิจส่วนตัว : <?php if ($row2[2] == null) { echo 0; } else { echo $row2[2]; } ?> คน</h5>
                    <h5> - มีผู้ลาคลอดบุตร : <?php if ($row2[3] == null) { echo 0; } else { echo $row2[3]; } ?> คน</h5>
                    <h5> - มีผู้ลาพักผ่อน : <?php if ($row2[4] == null) { echo 0; } else { echo $row2[4]; } ?> คน</h5>
                </ul>
                <h5>จำนวนวันที่ลางานในปีนี้ทั้งหมด <?php echo $row2[5] ?> วัน</h5>
                <h5> โดยแบ่งเป็น</h5>
                <ul>    
                    <h5> - จำนวนวันที่ลาป่วย : <?php if ($row2[6] == null) {echo 0;} else { echo $row2[6];} ?> วัน</h5>
                    <h5> - จำนวนวันที่ลากิจส่วนตัว : <?php if ($row2[7] == null) { echo 0; } else { echo $row2[7]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาคลอดบุตร : <?php if ($row2[8] == null) { echo 0; } else { echo $row2[8]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาพักผ่อน : <?php if ($row2[9] == null) { echo 0; } else { echo $row2[9]; } ?> วัน</h5>
                </ul>
            <?php endwhile; ?>
        </div>
        <div class = "container-fluid"> <!--for do other-->
            <h1>--------------------------</h1>
            <h1>Monthly Leaving Status (August 2018)</h1>
            <?php while ($row3 = mysqli_fetch_array($result3)) :; ?>
                <h5>มีผู้ลางานในเดือนนี้ทั้งหมด (ทุกประเภท) <?php echo $row3[0]?> คน</h5>
                <ul>    
                    <h5> - มีผู้ลาป่วย : <?php if ($row3[1] == null) {echo 0;} else { echo $row3[1];} ?> คน</h5>
                    <h5> - มีผู้ลากิจส่วนตัว : <?php if ($row3[2] == null) { echo 0; } else { echo $row3[2]; } ?> คน</h5>
                    <h5> - มีผู้ลาคลอดบุตร : <?php if ($row3[3] == null) { echo 0; } else { echo $row3[3]; } ?> คน</h5>
                    <h5> - มีผู้ลาพักผ่อน : <?php if ($row3[4] == null) { echo 0; } else { echo $row3[4]; } ?> คน</h5>
                </ul>
                <h5>จำนวนวันที่ลางานในปีนี้ทั้งหมด <?php echo $row2[5] ?> วัน</h5>
                <h5> โดยแบ่งเป็น</h5>
                <ul>    
                    <h5> - จำนวนวันที่ลาป่วย : <?php if ($row3[6] == null) {echo 0;} else { echo $row3[6];} ?> วัน</h5>
                    <h5> - จำนวนวันที่ลากิจส่วนตัว : <?php if ($row3[7] == null) { echo 0; } else { echo $row3[7]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาคลอดบุตร : <?php if ($row3[8] == null) { echo 0; } else { echo $row3[8]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาพักผ่อน : <?php if ($row3[9] == null) { echo 0; } else { echo $row3[9]; } ?> วัน</h5>
                </ul>
            <?php endwhile; ?>
        </div>
        <br><br>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </body>
</html>