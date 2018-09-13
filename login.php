<?php

error_reporting(0);
session_start();
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$page_directory = dirname($actual_link);
	 if(isset($_POST["login"]))
	{

		$username=$_POST["useremail"];
		$password=$_POST["password"];
		$_SESSION["useremail"]=$username;
		$_SESSION["password"]=$password;
			?>

		<script>
		window.location = "<?php echo $page_directory ?>/loading.php";
		</script>
		<?php

	}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coching App | Login</title>

    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="admin/css/animate.css" rel="stylesheet">
    <link href="admin/css/style.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.0/bootstrap.min.js"></script>

		<style>
		@import url('http://getbootstrap.com/dist/css/bootstrap.css');
 html, body, .container-table {
    height: 100%;
}
.container-table {
    display: table;
}
.vertical-center-row {
    display: table-cell;
    vertical-align: middle;
}
		.bg-cc{
			background: linear-gradient(to top right, #769BFF , #73A5EB ,#caecff  );
		}
		.btncolor
		{
			background: transparent;
			border: none;
			border-bottom: solid;
			border-bottom-width: 1px;
			color: white !important;
		}
				::placeholder {
		    color: white !important;
		    opacity: 1; /* Firefox */
		}

		:-ms-input-placeholder { /* Internet Explorer 10-11 */
		   color: white !important;
		}

		::-ms-input-placeholder { /* Microsoft Edge */
		   color: white !important;
		}
		</style>

</head>

<body class="gray-bg bg-cc">

    <div class="middle-box text-center animated fadeInDown">
        <div>
            <div>

							<center><img class="img-responsive" src="images/pavlok_zap_sign-white.png" style="width: 30%;"></center>

            </div>

            <form class="m-t" role="form" action="login.php" method="post">
                <div class="form-group">
                    <input type="email" class="form-control btncolor" placeholder="Email" name="useremail" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control btncolor" placeholder="Password"  name="password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>



            </form>
             </div>
    </div>

		
    <!-- Mainly scripts -->
    <script src="admin/js/jquery-3.1.1.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>

</body>

</html>
