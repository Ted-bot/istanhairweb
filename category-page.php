<?php
	require "header.php";	
	include "functions.php"
?>
<main class="my-5">

<div class="container" style="display: flex; justify-content: center; text-align: center;">
	
	<section class="row">
		<?php
			$query = "SELECT * FROM homeintro ORDER BY idIntro LIMIT 1";
				$run = $conn->query($query);
				$rowsCount = mysqli_num_rows($run);
				$count = 0;
					if ($row = mysqli_fetch_array($run)) {
							echo '<section class="col-sm-8" style="display: flex; flex-direction: column; margin: 0 auto;
							padding: 10px;
							position: relative;">
									<div class="pb-5 m-3 " 
									style="text-align: center; height: 14rem; max-width: 80rem;">
											<h5 class="card-title" style="color: black;">' . $row["titleIntro"] . '</h5>
											<div class="font-weight-normal" 
											>
											' . $row["descIntro"] . '</div>
											<br style="height: 10px;" />
											<span>Wij vervragen aan u om één van de onderstaande categorieën te selecteren dat verwijst naar de behandeling dat uw wenst.</span>
									</div>										
								</section>';

								
					}
			?>
	</section>
	
	<br>
	
</div>
<div class="container">
	<div class="row justify-content-center">
		<section class="col-sm-10" style="display: inline-flex; flex-direction: row; flex-wrap: wrap; justify-content:center">
				
					<?php					
						category_card();
					?>
			
		</section>
	</div>
</div>
</main>

<!-- admin pageheader ending div tag -->
</div>
<?php
	require "footer.php";
?>