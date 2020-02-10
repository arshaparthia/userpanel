<!DOCTYPE html>
<html lang="en">
<head>
	<title>ثبتنام کاربر</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/../lib/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/../css/util.css">
	<link rel="stylesheet" type="text/css" href="/../css/main.css">
<!--===============================================================================================-->
</head>
<!-- ****************************** -->
<?php 
require __DIR__ . '/.././lib/vendor/autoload.php';
?>

<!-- ****************************** -->
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/../images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style="font-family: Tahoma,serif">
					ثبتنام کاربر
				</span>
                <div class="login100-form-title p-b-41"><?php
            
                    $date = jdate();
                    echo $date;
                    ?>
                    </div>
				<form method="post" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username (Email)">
						<input class="input100" type="email" name="email" placeholder="User name (Email) ">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
                    

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>


					<div class="container-login100-form-btn m-t-32">
                        <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        <button type="submit" name="submit" href="<?= $actual_link ?>reg.php" style="color : white;text-align:center;width:100%" class="login100-form-btn -align-center">
							Register 
						</button>
                </form>
                            <form method="post" action=".././lib/sql.php">
                                <div >
                                    <input type="hidden"  name="createtable" value="ok">
                                    <button style="background-color: #004085;
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 15px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 20px;
                                                    margin-top: 12px;" class="btn" type="submit" name="submit">create table
                                    </button>

                                </div>
                            </form>
                            <form method="post" action=".././lib/sql.php">
                                <div >
                                    <input type="hidden"  name="createdatabase" value="ok">
                                    <button style="background-color: #004085;
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 15px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 20px;
                                                    margin-top: 12px;
                                                    margin-left: 5px;

                                                    " class="btn" type="submit" name="submit">create database
                                    </button>

                                </div>
                            </form>
                    </div>


			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/../lib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/../lib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/../lib/vendor/bootstrap/js/popper.js"></script>
	<script src="/../lib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/../lib/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/../lib/vendor/daterangepicker/moment.min.js"></script>
	<script src="/../lib/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/../lib/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/../js/main.js"></script>

</body>
</html>