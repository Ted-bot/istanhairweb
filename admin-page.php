<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
?>
<main class="my-5">
	<section>
		<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Overzicht</h1>
		<br>
<?php
		$sql = "SELECT COUNT(*) FROM gallery";
		$run = $conn->query($sql);
		//fetch table rows and grap array that contains all rows
		$row = mysqli_fetch_row($run)[0];
		
		$total = $row;
		echo "Geposte artikelen: " . $total;	
		echo '<br>';	
		
		$sql = "SELECT COUNT(*) FROM pages";
		$run = $conn->query($sql);
		//fetch table rows and grap array that contains all rows
		$row = mysqli_fetch_row($run)[0];
		
		$total = $row;
		echo "Gemaakte pagina's: " . $total;	
?>
	</section>
	<hr>
	<section>
		<h3 class="font-weight-light text-center text-lg-left mt-4 mb-0">Laatst gepost artikel</h3>
		<br>
		<?php
		$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 1";
				$run = $conn->query($query);
				$rowsCount = mysqli_num_rows($run);
					while ($row = mysqli_fetch_array($run)) {
							$descString = $row["descGallery"];
							echo '<section class="">	
									<section style="display:flex; align-items: center;">
										<section><img src="img/gallery/' . $row["imgFullNameGallery"] . '" style="width:100px;"></section>
											<section class="mx-3";><h5 class="card-title">' . $row["titleGallery"] . '</h5>
											<p class="card-text">' . substr($descString, 0, 50) . '</p></section>
										</section>
									</section>';
					}
		?>
	</section>
	<hr>
	<section>
		<h3 class="font-weight-light text-center text-lg-left mt-4 mb-0">Recent gepubliceerd</h3>
		<br>
		<table style="width:100%">
			<tr style="text-align:left; background-color:grey;">									 
				<th>Datum</th>
				<th>Titel</th>
				<th>Beschr.</th>
			  </tr>
			  <tr>
				<?php
				$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 6";
						$run = $conn->query($query);
						$rowsCount = mysqli_num_rows($run);
						$count = 0;
							while ($row = mysqli_fetch_array($run)) {
								$descString = $row["descGallery"];
								$count++;
								$isFirst = ($count == 1) ? true : false;
								$isSecond = ($count == 2) ? true : false;
								$isLast = ($count == $rowsCount) ? true : false;
								if (!$isFirst){
									echo '<a href="#" class="">
											<td class="card-text">' . $row["dateGallery"] . '</td>
											<td>' . $row["titleGallery"] . '</td>
											<td class="card-text">' . substr($descString, 0, 50) . '</td>
										</a></tr>';
								}
							}
				?>
		</table>
	</section>

</main>
</div>


<?php
	require 'footer.php';
?>