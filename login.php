<?php
session_start();
include 'checkpw.php';

if (isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$pass = validate($_POST['password']);

	if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
            if (isValidCreds($pass)) {
            	$_SESSION['pass'] = $pass;
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}
	}
	
else{
	header("Location: index.php");
	exit();
}