<?php
	include_once 'includes/dbh.incl.php'; 
	session_start();	
?>

<!DOCTYPE html>
<html lang="en" class="pt-html">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">

	<title>Home Page</title>

</head>

<body>

	<header >
		<nav class="navbar navbar-light navbar-expand-sm fixed-top bg-light" style="display: inline-flex;">	
			
			<section class="row" style="width:100%;">	
			<div class="sidebar-brand-text mx-2">
				<a class="navbar-brand fixImg" href="index.php">
				
					<!--		Upload logo Image		-->
					<?php
							$sql = "SELECT * FROM menulogo";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "SQL statement gefaald!";
							} else {
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<img src="img/gallery/' . $row['menuImage'] . '"class="fixImg" alt="logo" style="width:40px;">';
									
								}
							}
						?>
				</a>					
			</div>
			
			<!--	Upload menu links	-->
			<section style="margin-left: auto; margin-right:0px; width:calc(100%/1.12);justify-content: flex-end;">
				<ul class="nav">
					<div class="collapse navbar-collapse" id="navbarToggleExternalContent">	
						<?php
							$sql = "SELECT * FROM pages ORDER BY titlePage";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "SQL statement gefaald!";
							} else {
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);

								while ($row = mysqli_fetch_assoc($result)) {
									
									if ($row["menuPage"] == 1) {
										$show = $row["titlePage"];
										$noShow = $row["idPage"];
									} elseif ($row["menuPage"] == 0) {
										$show = null;
										$noShow = null;
									}
									
									echo '<li class="nav-item"><a class="nav-link" style="color: grey;" href="page.php?pageId=' . $noShow . '">' . $show . '</a></li>';
									
								}
							}
						?>
			<hr>
			<section class="nav-link ml-auto">
			<!--	If user logged in show 'logout' button if not show log in and register button	-->
			<?php 
				if (isset($_SESSION['userId'])) {
					echo '<form action="includes/logout.incl.php" method="post">
						<button type="submit" name="logout-submit">Logout</button>
						</form>';
				}
				else {
					echo '<a style="color: grey;" id="btn">Log in</a>';
				}
			?>
			</section>
			<?php 
				if (isset($_SESSION['userId'])) {

				}
				else {
					echo '<a class="nav-link" style="color: grey;" href="signup.php">Registreer</a>';
				}
			?>
					</div>
				</ul>
			</section>
		</section>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" style="position:fixed; right:10px; top:10px;" id="btn-collapse">
		  <span class="navbar-toggler-icon"></span>
		</button>			
	</nav>
</header>
<div id="modal-wrapper" class="modal modal-respons" style="z-index:7;">
	<form class="modal-content animate" action="includes/login.incl.php" method="post" style="z-index:10;">
		<input type="text" name="emailUid" placeholder="Username/ Email..">
		<input type="password" name="pwd" placeholder="Password..">
		<div class="row mx-4"><button class="response-btn" type="submit" name="login-submit">Inloggen</button> <a class="mt-3 list-inline-item:not" style="margin-left:50%;color:red;" href="index.php">sluit</a></div>
	</form>
</div>