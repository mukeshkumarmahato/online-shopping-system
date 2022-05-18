<?php 
	$_SESSION["uid"]="1";
	include "../db.php";
	if(isset($_POST['re_password']))
		{
		 	$old_pass=$_POST['old_pass'];
			$new_pass=$_POST['new_pass'];
			$re_pass=$_POST['re_pass'];
			$chg_pwd=mysqli_query($con,"select * from admin_info where admin_id='1'");
			$chg_pwd1=mysqli_fetch_array($chg_pwd);
			$data_pwd=$chg_pwd1['admin_password'];
			if($data_pwd==$old_pass)
				{
					if($new_pass==$re_pass)
						{
							$update_pwd=mysqli_query($con,"update admin_info set admin_password='$new_pass' where admin_id='1'");
							echo "<script>alert('Password Update Sucessfully'); window.location='index.php'</script>";
						}
					else
						{
							echo "<script>alert('Your new and Retype Password is not match'); window.location='changepassword.php'</script>";
						}
				}
			else
				{
					echo "<script>alert('Your old password is wrong'); window.location='changepassword.php'</script>";
				}
		}
	mysqli_close($con);
?>