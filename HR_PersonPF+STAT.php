<?php
    $hostname = "127.0.0.1:3306";
    $username = "root";
    $password = "F06245727e";
    $databaseName = "projectest";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    $query = "SELECT * FROM employee WHERE EMP_ID = '1234500001' ";
    $query2 = "SELECT sum(DAY_LEAVE),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'ไม่อนุมัติ'and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'รออนุมัติ'and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'ยกเลิกการลา'and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and year(LEAVE_BEGIN) = '2018')
               FROM LEAVEFORM 
               WHERE EMP_ID = '1234500001' and year(LEAVE_BEGIN) = '2018' ";
    $query3 = "SELECT sum(DAY_LEAVE),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'ไม่อนุมัติ'and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'รออนุมัติ'and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'ยกเลิกการลา'and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and (LTYPE_ID = '11' or LTYPE_ID = '12') and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '13' and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '14' and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'),
                    (SELECT sum(DAY_LEAVE) FROM LEAVEFORM WHERE EMP_ID = '1234500001' and LEA_STAT = 'อนุมัติ' and LTYPE_ID = '21' and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018')
               FROM LEAVEFORM 
               WHERE EMP_ID = '1234500001' and month(LEAVE_BEGIN) = '8' and year(LEAVE_BEGIN) = '2018'";
    mysqli_query($connect, "SET NAMES UTF8");
    $result1 = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query2);
    $result3 = mysqli_query($connect, $query3);
    $dataRow = "";
    while ($row1 = mysqli_fetch_array($result1)) {
        $dataRow = $dataRow . "<h4> ID : $row1[0]</h4><h4> ชื่อ : $row1[1]</h4><h4> นามสกุล : $row1[2]</h4><h4> ตำแหน่ง : $row1[3]</h4><h4> เบอร์โทรศัพท์ : $row1[4]</h4><h4> E-mail : $row1[5]</h4><h4> หน่วยงาน/ภาควิชา : $row1[6]</h4><h4> เพศ : $row1[7]</h4>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile+Status viewer TEST</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <!--test query-->
            <h1>Personal Profile+Status</h1>
            <?php echo $dataRow; ?>                                                                       
        </div>
        <div class = "container-fluid"> <!--for do other-->
            <h1>--------------------------</h1>
            <h1>Yearly Leaving Status (2018)</h1>
            <?php while ($row2 = mysqli_fetch_array($result2)) :; ?>
                <h5> จำนวนวันที่ขอลา : <?php if($row2[0]==NULL){ echo 0;} else {echo $row2[0];} ?> วัน</h5>
                <h5> จำนวนวันลาที่ได้รับอนุมัติแล้ว :  <?php if ($row2[1] == null) { echo 0;} else {echo $row2[1];} ?> วัน</h5>
                <h5> โดยแบ่งเป็น</h5>
                <ul>    
                    <h5> - จำนวนวันที่ลาป่วย : <?php if ($row2[5] == null) {echo 0;} else { echo $row2[5];} ?> วัน</h5>
                    <h5> - จำนวนวันที่ลากิจส่วนตัว : <?php if ($row2[6] == null) { echo 0; } else { echo $row2[6]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาคลอดบุตร : <?php if ($row2[7] == null) { echo 0; } else { echo $row2[7]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาพักผ่อน : <?php if ($row2[8] == null) { echo 0; } else { echo $row2[8]; } ?> วัน</h5>
                </ul>
                <h5> จำนวนวันลาที่ไม่ได้รับอนุมัติ :  <?php if($row2[2]==NULL){ echo 0;} else { echo $row2[2];} ?> วัน</h5>
                <h5> จำนวนวันลาที่รอการอนุมัติ :  <?php if ($row2[3] == null) { echo 0; } else { echo $row2[3];} ?> วัน</h5>
                <h5> จำนวนวันลาที่ยกเลิก :  <?php if ($row2[4] == null) { echo 0;} else { echo $row2[4];} ?> วัน</h5>
                <h5> จำนวนวันที่สามารถขอลาพักผ่อนได้ :  <?php echo 30-$row2[8]; ?> วัน</h5>
            <?php endwhile; ?>
        </div>
        <div class = "container-fluid"> <!--for do other-->
            <h1>--------------------------</h1>
            <h1>Monthly Leaving Status (August 2018)</h1>
            <?php while ($row3 = mysqli_fetch_array($result3)) :; ?>
                <h5> จำนวนวันที่ขอลา : <?php if($row3[0]==NULL){ echo 0;} else {echo $row3[0];} ?> วัน</h5>
                <h5> จำนวนวันลาที่ได้รับอนุมัติแล้ว :  <?php if ($row3[1] == null) { echo 0;} else {echo $row3[1];} ?> วัน</h5>
                <h5> โดยแบ่งเป็น</h5>
                <ul>    
                    <h5> - จำนวนวันที่ลาป่วย : <?php if ($row3[5] == null) {echo 0;} else { echo $row3[5];} ?> วัน</h5>
                    <h5> - จำนวนวันที่ลากิจส่วนตัว : <?php if ($row3[6] == null) { echo 0; } else { echo $row3[6]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาคลอดบุตร : <?php if ($row3[7] == null) { echo 0; } else { echo $row3[7]; } ?> วัน</h5>
                    <h5> - จำนวนวันที่ลาพักผ่อน : <?php if ($row3[8] == null) { echo 0; } else { echo $row3[8]; } ?> วัน</h5>
                </ul>
                <h5> จำนวนวันลาที่ไม่ได้รับอนุมัติ :  <?php if($row3[2]==NULL){ echo 0;} else { echo $row3[2];} ?> วัน</h5>
                <h5> จำนวนวันลาที่รอการอนุมัติ :  <?php if ($row3[3] == null) { echo 0; } else { echo $row3[3];} ?> วัน</h5>
                <h5> จำนวนวันลาที่ยกเลิก :  <?php if ($row3[4] == null) { echo 0;} else { echo $row3[4];} ?> วัน</h5>
                <h5> จำนวนวันที่สามารถขอลาพักผ่อนได้ :  <?php echo 30-$row3[8]; ?> วัน</h5>
            <?php endwhile; ?>
        </div>
        <br><br>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </body>
</html>