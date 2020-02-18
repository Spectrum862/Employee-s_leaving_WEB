<?php
    session_start();
    if($_SESSION['Permission'] == 1)include_once("navbarHR.php");
    else include_once("navbar.php");
    include_once("dbcon.php");
    if(isset($_POST['submit'])){
        $date1=date_create($_POST['datestart']);
        $date2=date_create($_POST['dateend']);
        $datestart = date("Y-m-d", strtotime($_POST['datestart']) );
        $dateend = date("Y-m-d", strtotime($_POST['dateend']) );
        $empid = $_SESSION['EMP_ID'];
        $lftype = $_POST['lftype'];
        $lfstat = "รออนุมัติ";
        $datecreate = date('Y-m-d');
        $des = $_POST['des'];

        // date calculator-------------------------------------------------------------------------------------------------
        function CheckPublicHoliday($strChkDate)
	{
        $servername = "127.0.0.1:3306";
        $username = "root";
        $password = "F06245727e";
        $dbname = "projectest";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        mysqli_set_charset($conn,"utf8");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  
    
		$sql = "SELECT * FROM public_holiday WHERE PublicHoliday = '$strChkDate' ";
		$result = $conn->query($sql);
		if($result->num_rows == 1)
		{
            $conn->close();
            return true;           
		}
		else
		{
            $conn->close();
            return false;
		}
	}
 
	$strStartDate = $datestart;
	$strEndDate = $dateend;
	
	$intWorkDay = 0;
	$intHoliday = 0;
	$intPublicHoliday = 0;
	$intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1; 

	while (strtotime($strStartDate) <= strtotime($strEndDate)) {
		
		$DayOfWeek = date("w", strtotime($strStartDate));
		if($DayOfWeek == 0 or $DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
		{
			$intHoliday++;
			//echo "$strStartDate = <font color=red>Holiday</font><br>";
		}
		elseif(CheckPublicHoliday($strStartDate))
		{
			$intPublicHoliday++;
			//echo "$strStartDate = <font color=orange>Public Holiday</font><br>";
		}
		else
		{
			$intWorkDay++;
			//echo "$strStartDate = <b>Work Day</b><br>";
		}

		$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
    }
    
        //-------------------------------------------------------------------------------------------------
        
        $sql = "INSERT INTO leaveform value (NULL,'$empid','$lftype','$datestart','$dateend',$intWorkDay,'$lfstat','notsupport','$datecreate','$des')";
               
        if ($lftype==13 && $intWorkDay+$_SESSION['ndayE'] > 14)
            echo "<script language='javascript' type='text/javascript' > alert('Out of Quota');</script>";    
        else if($lftype == 21 && $intWorkDay+$_SESSION['ndayH']>30)    
                echo "<script language='javascript' type='text/javascript' > alert('Out of Quota');</script>";
             else{
                $result = $conn->query($sql);
                $conn->close();
                header('location:home.php');  
             }          
    }    
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
        <div class="row">
            <div class = "col"></div>
            <div class = "col-lg-6 ceter" style = "margin-top: 5vh">
                <form action="" method="POST">
                    <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title text-center">LeaveForm Register</h4>
                        <p class="card-text">ประเภทที่จะลา</p>
                        <select class="custom-select" name="lftype" required>
                            <option value="">Choose...</option>
                            <option value="13" >ลากิจส่วนตัว </option>
                            <option value="12" >ลาป่วย</option>
                            <option value="21" >ลาพักผ่อน</option>
                        </select>
                        <div class="row" style = "margin-top:20px">
                            <div class = "col-lg-2 my-auto">
                                ตั้งแต่วันที่                           
                            </div>
                            <div class = "col-lg">
                                <input type="date" class="form-control" name="datestart" required >
                            </div>
                            <div class = "col-lg-2 my-auto">
                                ถึงวันที่                           
                            </div>
                            <div class = "col-lg">
                                <input type="date" class="form-control" name="dateend" required >
                            </div>
                        </div>
                        <label for="comment">หมายเหตุ:</label>
                        <textarea class="form-control" rows="5" id="comment" name = "des" maxlength="100" required></textarea>                   
                        <div class="row">                          
                            <div class = "col-lg"></div>
                            <div class = "col-lg text-center" style = "margin-top:1vh">
                                <button type="submit " id ="submit" name = "submit" class="btn btn-primary">Submit</button>
                            </div> 
                            <div class = "col-lg"></div>        
                        </div>
                    </div>
                    </div>
                </form>    
            </div>
            <div class = "col"></div>
        </div>
    </div>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>
</html>


