<?php	
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'includes/menu.incl.php';  
?>

<main class="m-5">
	<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Menu beheren</h1>
	<hr>
	<h3 class="font-weight-light">Logo aanpassen</h3>
	<section class="row m-1">
		<section>
			<p>Huidige logo website :</p>
		</section>
		<section class="m-2">
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
		</section>
		
	</section>
	<p>Selecteer een logo voor de menu</p>
	<section>
	
		<form action="includes/post.incl.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file-img">
			<button type="submit" name="logo-upload">Upload bestand</button>
		</form>
	</section>
	<br>
	<hr>
	<h3 class="font-weight-light">Menu aanpassen</h3>
	<p>Selecteer pagina's voor de menu</p>
	<form action="" method="post" enctype="multipart/form-data">
	<?php  
	
	$query = "SELECT * FROM pages ORDER BY titlePage";
		$run = $conn->query($query);
		$rowsCount = mysqli_num_rows($run);
		$count = 0;
			while ($row = mysqli_fetch_array($run)) {
				//check box if data has value
				echo '<input type="checkbox" name="title-value-'. $row["idPage"] .'"'. ($row["menuPage"]==1 ? "checked" : "") . '>';
				echo '<label for="title-value-'. $row["idPage"] .'">' . $row["titlePage"] . '</label>';			
				echo '<br>';
			}
	?>
	<br>
	<button type="submit" name="edit-menu" value="Edit-menu">Update menu</button>
	</form>
	
</main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<?php
	'footer.php';
?>