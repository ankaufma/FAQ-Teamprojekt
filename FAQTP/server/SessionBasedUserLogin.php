<?php
session_start(); 
$user = $_POST['user'];
if(isset($_SESSION['user'])) 
    { 
        // Code for Logged members 

        // Identifying the user 
        $user = $_SESSION['user']; 
        
        // Information for the user. 
    } 
else 
    { 
        // Code to show Guests 
    } 
?> 

Code for Logging a User: 
<?php 
//Username Stored for logging 
$userName = $_POST['username'];
$userPW = $_POST['passwort'];
define("USER", "user"); 

// Normal user section - Not logged ------ 
        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) 
            { 
                // Section for logging process ----------- 
                $user = trim($_REQUEST['username']); 
                $pass = trim($_REQUEST['password']); 
                if($user == USER && $pass == PASS) 
                    { 
                        // Successful login ------------------ 
                        
                        // Setting Session 
                        $_SESSION['user'] = USER; 
                        
                        // Redirecting to the logged page. 
                        header("Location: index.php"); 
                    } 
                else 
                    { 
                        // Wrong username or Password. Show error here. 
                        
                    } 
                
            } 
?> 