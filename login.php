<?php
session_start();// Starting Session
include_once("inc/database_connection.php"); //database connection
include_once("inc/prep_functions.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['email'])) {
        $error = "Email or Password is invalid";
    } else {
        // Define $username and $password
        $email = $_POST['email'];
        $password = $_POST['password'];

    //    echo("First name: " . $_POST['email'] . "<br />\n");
    //    echo("Last name: " . $_POST['password'] . "<br />\n");

        // To protect MySQL injection for Security purpose
        $email = stripslashes($email);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT * FROM users WHERE password='".$password."' AND email='".$email."'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
           $_SESSION['login_user'] = $email; // Initializing Session
           header("location: index.php"); // Redirecting To Other Page
        } else {
            echo '<script type="text/javascript" language="Javascript">alert("Invalid Details..")
		</script>';
        }
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Inventory</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="web/images/css/font-awesome.css" rel="stylesheet">
	<link href="web/images/css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<!--//fonts-->
</head>

<body style="background-image:url(web/images/images/banner.jpg);">
	<h1>Login</h1>
	<div class="w3ls-login">
		<!-- form starts here -->
		<form action="#" method="post">
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
				<input type="text" name="email" placeholder=" " required="" />
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-lock" aria-hidden="true"></i> password :</label>
				<a href="#" class="w3ls-right">forgot password?</a>
				<input type="password" name="password" placeholder=" " required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div>
			</div>
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script for show password -->
			<div class="w3ls-login  w3l-sub">
				<input type="submit" name="submit" value="Login">
			</div>
			<br></br>
			<label class="check">Not a member..please click <a href="register.php" target="_blank">here.</a></label>
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-wthree">
		<p>© 2018 Computer Based | Design by
			<a href="http://w3layouts.com/" target="_blank">ShootFish</a>
		</p>
	</div>
	<!--//copyright-->
</body>

</html>