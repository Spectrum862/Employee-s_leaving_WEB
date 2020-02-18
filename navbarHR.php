<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark login2">
    <div class="container-fluid" style = "margin-right:5vh; margin-left:5vh;">
        <a class="navbar-brand" href="home.php">LeavingSystem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
        
            <li class="nav-item">
                <a class="nav-link" href="LeaveForm.php">Create Leaveform</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="PersonLF_LIST.php">View Leaveform Stat</a>
            </li>     
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                HR menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Something</a>
                <a class="dropdown-item" href="#">Another action</a>
                
                </div>
            </li>
            

            </ul>
            <ul class="navbar-nav ml-auto">
        
            
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome <?php echo $_SESSION['name']?>
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Logout.php">Log out</a>
            </div>
            </li>    
            </ul>       
        </div>    
    </nav>
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
</body>
</html>


