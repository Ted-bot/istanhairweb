<?php
	include_once 'includes/dbh.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	$_SESSION['userUid'] = "ted";
?>

<main>
	<section class="container">
		<h2>Gallerij</h2>
		<div class="row">	
		<?php
			
			include_once 'includes/dbh.incl.php';
			
			$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "SQL statement gefaald!";
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<a href="#">
						<div class="card" style="width: 18rem;">
						  <img src="img/gallery/' . $row["imgFullNameGallery"] . '" class="card-img-top" alt="...">
						  <div class="card-body">
							<h5 class="card-title">' . $row["titleGallery"] . '</h5>
							<p class="card-text">' . $row["descGallery"] . '</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						  </div>
						</div>
					</a>';
				}
			}
			?>
			
			<?php
//			if (isset($_POST['userUid'])) {
//				echo '<a href="#">
//					<div class="card" style="width: 18rem;">
//					  <img src="..." class="card-img-top" alt="...">
//					  <div class="card-body">
//						<h5 class="card-title">Card title</h5>
//						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
//						<a href="#" class="btn btn-primary">Go somewhere</a>
//					  </div>
//					</div>
//				</a>';
//			}
				
			?>
		</div>
	</section>
	<section>
		<form action="includes/gallery.incl.php" method="post" enctype="multipart/form-data">
			<input type="text" name="file-name" placeholder="bestand naam..">
			<input type="text" name="file-title" placeholder="bestand titel..">
			<input type="text" name="file-descr" placeholder="bestand beschrijving..">
			<input type="file" name="file-img">
			<button type="submit" name="file-upload">Upload bestand</button>
		</form>
	</section>
</main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!--closing div from admin header page -->
</div>
<?php
	'footer.php';
?>