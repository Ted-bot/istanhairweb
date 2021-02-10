<?php
	ob_start();
	session_start();
	include_once 'includes/dbh.incl.php';	
?><!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">

	<title>Home Page</title>

</head>
 
<body class="row m-0" style="height:100%;">  
	  <div class="col-sm-2 bg-dark text-white">	  
		 <nav class="navbar navbar-expand-md navbar-dark bg-dark">			
			<section class="col">	
	   		<div class="sidebar-brand-text mx-3 fixImg">
				<a class="navbar-brand" href="index.php">
					<img src="img/gallery/Logo.png" alt="logo" style="width:40px; ">
				</a>
			</div> 			
		   		<section class="row">
			   <ul class="nav bg-gradient-primary sidebar-dark accordion" id="accordionSidebar" style="width:100%;">

					<div class="collapse navbar-collapse" id="navbarToggleExternalContent">
						<section class="col">
							  <!-- Sidebar - Brand -->
							  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
								<div class="sidebar-brand-icon rotate-n-15">
								  <i class="fas fa-laugh-wink"></i>
								</div>								
							  </a>

							  <!-- Divider -->
							  <hr class="sidebar-divider my-0">

							  <!-- Nav Item - Dashboard -->
							  <li class="nav-item active">
								<a class="nav-link text-white" href="admin-page.php">
								  <i class="fas fa-fw fa-tachometer-alt"></i>
								  <span>Dashboard</span></a>
							  </li>

							  <!-- Divider -->
							  <hr class="sidebar-divider">

							  <!-- Heading -->
							  <div class="sidebar-heading">
								Interface
							  </div>
							  <br>
							  <!-- Methods  -->
							  <li class="nav-item">
								<a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
								  <i class="fas fa-fw fa-cog"></i>
								  <span class="border-bottom border-white">Voorpagina</span>
								</a>
								<div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
								  <div class="bg-white py-2 collapse-inner rounded">
									<a class="collapse-item text-dark" href="method-post.php">werkwijze toevoegen</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="method-manage.php">aanpassen werkwijze</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="home-page-post.php?pageId=1">slides</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="banner-post.php?pageId=1">banner</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="videos-post.php?pageId=1">videos</a>
								  </div>
								</div>
							  </li>
							  
							  <br>

							   <!-- Upload new pages-->
							   <li class="nav-item">
								<a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
								  <i class="fas fa-fw fa-cog"></i>
								  <span class="border-bottom border-white">Pagina's</span>
								</a>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
								  <div class="bg-white py-2 collapse-inner rounded">
						
						
									<a class="collapse-item text-dark" href="page-post.php">Upload Pagina</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="page-manage.php">Overzicht pagina's</a>
									<br>
								  </div>
								</div>
							  </li>
							  
							  <br>

							  <!-- Upload Articles -->
							  <li class="nav-item">
								<a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
								  <i class="fas fa-fw fa-cog"></i>
								  <span class="border-bottom border-white">Artikelen</span>
								</a>
								<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
								  <div class="bg-white py-2 collapse-inner rounded">
									<a class="collapse-item text-dark" href="post.php">Upload artikel</a>
									<br>
									<hr class="sidebar-divider my-0">
									<a class="collapse-item text-dark" href="posts-manage.php">Overzicht artikelen</a>
									<br>
								  </div>
								</div>
							  </li>
							  
							  <br>
							  
							 <!-- Menu  -->
							  <li class="nav-item">
								<a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								  <i class="fas fa-fw fa-cog"></i>
								  <span class="border-bottom border-white">Menu</span>
								</a>
								<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
								  <div class="bg-white py-2 collapse-inner rounded">
									<a class="collapse-item text-dark" href="menu-adjust.php">Aanpassen menu</a>
									<br>
								  </div>
								</div>
							  </li>

							  <br>
							  
						  </section>
						</div>
					</ul>	
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" style="position:fixed; right:10px; top:10px;">
					  <span class="navbar-toggler-icon"></span>
					</button>			
				</section>
			</section>
		</nav>
</div>