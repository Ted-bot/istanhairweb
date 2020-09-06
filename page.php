<?php 
	require 'header.php';			
	$page_Id = $_GET['pageId'];

	$sql = ("SELECT * FROM pages WHERE idPage =" . $page_Id . " ");
	$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "SQL statement gefaald!";
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				while ($pageItem = mysqli_fetch_assoc($result)) {			
					echo '<div  style="background-image: url(img/gallery/' . $pageItem['imgPage'] . ');" type="image/jpg" class="imgPosition2"></div>';
					echo '<br>';
					echo '';
				}
} ?>

		<main class="container">

<?php 
		$page_Id = $_GET['pageId'];

			$sql = ("SELECT * FROM pages WHERE idPage =" . $page_Id . " ");
			$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						while ($pageItem = mysqli_fetch_assoc($result)) {
							echo '<h1>' . $pageItem['titlePage'] . '</h1>';	
							echo '<br>';
							echo '<p>' . $pageItem['descPage'] . '</p>';
							echo '<br>';
						}
		}

	?>								
</main>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!-- admin-page-header -->
</div>
<?php
	'footer.php';
?>