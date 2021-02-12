<?php
	require "header.php";	
	include "functions.php";
?>

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
							echo '<section class="col-sm-8" style="display: flex; flex-direction: column; margin: 0 auto;
							padding: 10px;
							position: relative;">
									<div class="pb-5 m-3 " 
									style="text-align: center; height: 14rem; max-width: 80rem;">
											<h5 class="card-title" style="color: black;">' . $pageItem['titlePage'] . '</h5>
											<div class="font-weight-normal" 
											>
											' . $pageItem['descPage'] . '</div>
											<br style="height: 10px;" />
											<span>Wij vervragen aan u om één van de onderstaande categorieën te selecteren dat verwijst naar de behandeling dat uw wenst.</span>
									</div>										
								</section>';
						}
		}

	?>

<div class="container">
	<div class="row justify-content-center">
		<section class="col-sm-10" style="display: inline-flex; flex-direction: row; flex-wrap: wrap; justify-content:center">
				
					<?php					
						method_card();
					?>
			
		</section>
	</div>
</div>		`

<div class="container">
	<div class="row justify-content-center">
		<section class="col-sm-10" style="display: inline-flex; flex-direction: row; flex-wrap: wrap; justify-content:center">
				
					<?php					
						video_thumbnail();
					?>
			
		</section>
	</div>
</div>
</main>


<?php
	require 'footer.php';
?>