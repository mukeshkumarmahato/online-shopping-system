<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password form</title>
    <link rel="stylesheet" href="css/design.css">
    <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!--********* for icon *********-->
    <link rel="stylesheet" href="css/font-awesome.min.css" class="rel">
</head>
<body>
    <div class="center">
        <div class="header">Change password</div>
        <form action="cang.php" method="post">
            <input type="text" name="old_pass" id="" placeholder="Old password" required>
            <input type="password" name="new_pass" id="pswrd" placeholder="New password" required>
            <input type="password" name="re_pass" id="pswrd" placeholder="Retype New password" required>
            <input type="submit" name="re_password" value="Update password">
        </form>
    </div>
</body>
</html>