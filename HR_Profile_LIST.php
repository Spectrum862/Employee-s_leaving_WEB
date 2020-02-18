<?php
    $hostname = "127.0.0.1:3306";
    $username = "root";
    $password = "F06245727e";
    $databaseName = "projectest";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    $query = "";
    $query2 = "";
    mysqli_query($connect, "SET NAMES UTF8");
    $query1 = "SELECT EMP_ID,EMP_FNAME,EMP_LNAME,EMP_POS FROM EMPLOYEE WHERE DEPT_NAME = 'คณิตศาสตร์' ORDER BY EMP_ID";
    $result1 = mysqli_query($connect, $query1);
        //echo $query1;
        //$result2 = mysqli_query($connect, $query2);
    $dataRow = "";
        //while ($row1 = mysqli_fetch_array($result1)) {
        //    $dataRow = $dataRow . "";
        //}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HR Profile list TEST</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Profile list for HR</h1>
            <br><br>
            <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
            <div class="card" style="width: 70rem;">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row1[0]; ?></h4>
                    <h5 class="card-title"><?php echo $row1[1]; ?> <?php echo $row1[2]; ?></h5> <!--EMP_FNAME + EMP_LNAME-->
                    <h6 class="card-subtitle mb-2"><?php echo $row1[3]; ?></h6>
                    <a href="/Project/D4.php" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <br><br>
            <?php endwhile; ?>                                                                    
        </div>                                                                                    
        <br><br>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </body>
</html>