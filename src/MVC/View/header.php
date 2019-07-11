<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
<link rel="stylesheet" href="../../Public/CSS/style.css">
<link rel="stylesheet" href="../../Public/CSS/userCreateStyle.css">

</head>

<?php
require_once 'C:\xampp\htdocs\carsell\carsell\src\Libraries\Authentication.php';
?>
<body>
	<div class="row">
		<div class="logo">
			<div class="col-sm">
				<nav class="navbar navbar-light bg-light">
					<a class="navbar-brand, title"
						href="http://localhost/car"> <img
						src="C:\xampp\htdocs\carsell\carsell\src\Public\Images\Carselllogo.png">
					<h1>Carsell</h1>
					</a>
				</nav>
			</div>

		</div>
		<div class="col-sm">
			<nav class="navbar navbar-light bg-light, search">
				<form class="form-inline" method="post" action=/car/search>
					<input class="form-control mr-sm-2" type="search"
						placeholder="Search" name="searchfield" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0, searchbutton"
						type="submit">Search</button>
				</form>
			</nav>
		</div>
		<div class="col-sm">
			<div>
				<a class="btn btn-outline-success, loginbutton"
					href="http://stu-inf-2017-zh-carsell.local/user/createAngaben">Registrieren</a>

				<a class="btn btn-outline-success, loginbutton"
					href="http://stu-inf-2017-zh-carsell.local/user"><?php
    if (Authentication::isLoggedIn()) {
        echo "Logout";
    } else {
        echo "Login";
    }
    ?>
				</a>
			</div>
		</div>
	</div>

<!--	<h1>--><?//= $heading ?><!--</h1>-->

	<div id="content">