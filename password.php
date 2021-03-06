<?php
include('inc/session.php');
include_once("inc/database_connection.php"); //database connection
include_once("inc/prep_functions.php");

if (isset($_POST['submit'])) {
   
        
        $name = $_POST['full_name'];
		$email = $_POST['email'];
        $gender = $_POST['gender'];
		$phone = $_POST['phone'];
        $password = $_POST['password'];
		$now = date("Y-m-d H:i:s");

    $clamp = "SELECT * FROM users WHERE password='$password'";
		$fake_sql = mysqli_query($conn, $clamp);
		
	 
	if (mysqli_num_rows($fake_sql) > 0) {
  	  echo '<script type="text/javascript" language="Javascript">alert("Sorry this password is already taken..")
		</script>';
			}else{	
			$sql = "INSERT INTO users(full_name, email, gender, phone,  password, created) values ('".$name."','".$email."','".$gender."','".$phone."','".$password."','".$now."')";
		if (mysqli_query($conn,$sql)){
					echo '<script type="text/javascript" language="Javascript">alert("User Successfully added.")
				</script>';
		}else{
	     echo '<script type="text/javascript" language="Javascript">alert("Invalid Details.")
		</script>';
			}
	 
	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password</title>
    <!-- Meta Tags -->
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
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="index.php">Enumero</a>
                </h1>
                <span>E</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-laptop"></i>
                        Stock
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="viewAll.php">View All</a>
                        </li>
                        <a href="viewSales.php">View Sales</a>
                    </ul>
                </li>
                <li>
                    <a href="newItem.php">
                        <i class="fas fa-chart-pie"></i>
                        Add New Item
                    </a>
                </li>
				<li>
                    <a href="newStock.php">
                        <i class="fa fa-edit"></i>
                        Add New Stock
                    </a>
                </li>
                <li>
                    <a href="sales.php">
                        <i class="fas fa-th"></i>
                        Report Sales
                    </a>
                </li>
               
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        User
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a href="password.php">Add Users</a>
                        </li>
						<li>
                            <a href="viewUsers.php">View Users</a>
                        </li>
                        <li>
                            <a href="delete.php">Delete</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                   
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?php echo ($userDetails['full_name']); ?></h3>
                                        <a href="mailto:info@example.com"><?php echo ($userDetails['email']); ?></a>
                                    </div>
                                </div>
                                <a href="allUsers.php" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>View All Users</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->

            <!-- main-heading -->
            <!--// main-heading -->

            <!-- Forms content -->
            <section class="forms-section">

               
          
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add User</h4>
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">User-name</label>
                                <input type="text" name="full_name" class="form-control" id="inputEmail4" placeholder="User-name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Gender</label>
                                 <select id="inputState" name="gender" class="form-control">
                                    <option value="male">Male</option>
									<option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Phone Number</label>
                            <input type="phone" name="phone" class="form-control" id="inputAddress2" placeholder="Phone Number" required="">
                        </div>
						<div class="form-group">
                            <label for="inputAddress2">Email</label>
                            <input type="phone" name="email" class="form-control" id="inputAddress2" placeholder="Email" required="">
                        </div>
						 <div class="form-group">
                            <label for="inputAddress2">Password</label>
                            <input type="password" name="password" class="form-control" id="inputAddress2" placeholder="Password" required="">
                        </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
                <!--// Forms-3 -->
               
            </section>

            <!--// Forms content -->

           
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>