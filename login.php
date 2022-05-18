<?php
	include "db.php";
	session_start();

	#Login script is begin here
	#If user given credential matches successfully with the data available in database then we will echo string login_success
	#login_success string will go back to called Anonymous funtion $("#login").click() 

	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$password = $_POST["password"];

		$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		//we have created a cookie in login_form.php page so if that cookie is available means user is not login
        
	  	//if user record is available in database then $count will be equal to 1
		if($count == 1){
			$row = mysqli_fetch_array($run_query);
			$_SESSION["uid"] = $row["user_id"];
			$_SESSION["name"] = $row["first_name"];
			$ip_add = getenv("REMOTE_ADDR");
			    
			echo "login_success";
            echo "<script> location.href='index.php'; </script>";
            exit();
		}
		else{
            $email = mysqli_real_escape_string($con,$_POST["email"]);
            $password =	md5($_POST["password"]) ;
            $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
            $run_query = mysqli_query($con,$sql);
            $count = mysqli_num_rows($run_query);

            //if user record is available in database then $count will be equal to 1
            if($count == 1){
                $row = mysqli_fetch_array($run_query);
                $_SESSION["uid"] = $row["admin_id"];
                $_SESSION["name"] = $row["admin_name"];
                $ip_add = getenv("REMOTE_ADDR");
                //we have created a cookie in login_form.php page so if that cookie is available means user is not login
                //if user is login from page we will send login_success
                echo "login_success";
                echo "<script> location.href='admin/index.php'; </script>";
                exit;
			}
			else{
                echo "<span style='color:red;'>Please register before login..!</span>";
                exit();
            }
		}
	}
?>