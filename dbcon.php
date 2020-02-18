<!DOCTYPE html>
<html>
<body>
    <?php
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
    //echo "Connected successfully";  
    
    ?>    
</body>
</html>