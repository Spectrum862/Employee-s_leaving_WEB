<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
  
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
			return true;
		}
		else
		{
			return false;
		}
	}
 
	$strStartDate = "2018-12-01";
	$strEndDate = "2018-12-15";
	
	$intWorkDay = 0;
	$intHoliday = 0;
	$intPublicHoliday = 0;
	$intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/  ( 60 * 60 * 24 )) + 1; 

	while (strtotime($strStartDate) <= strtotime($strEndDate)) {
		
		$DayOfWeek = date("w", strtotime($strStartDate));
		if($DayOfWeek == 0 or $DayOfWeek ==6)  // 0 = Sunday, 6 = Saturday;
		{
			$intHoliday++;
			echo "$strStartDate = <font color=red>Holiday</font><br>";
		}
		elseif(CheckPublicHoliday($strStartDate))
		{
			$intPublicHoliday++;
			echo "$strStartDate = <font color=orange>Public Holiday</font><br>";
		}
		else
		{
			$intWorkDay++;
			echo "$strStartDate = <b>Work Day</b><br>";
		}
		//$DayOfWeek = date("l", strtotime($strStartDate)); // return Sunday, Monday,Tuesday....

		$strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
	}

	echo "<hr>";
	echo "<br>Total Day = $intTotalDay";
	echo "<br>Work Day = $intWorkDay";
	echo "<br>Holiday = $intHoliday";
	echo "<br>Public Holiday = $intPublicHoliday";
	echo "<br>All Holiday = ".($intHoliday+$intPublicHoliday);
?>
</body>
</html>