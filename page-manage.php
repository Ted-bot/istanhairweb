<?php	
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'includes/page.incl.php';
?>
<main class="">
	<div class="container">
		<div class="col-sm-10">
		<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Overzicht artikelen</h1>
		<br>
			<table style="width:100%">
				<tr>
					<th>Afbeelding</th>
					<th>Titel</th>
					<th>Beschr.</th>
					<th>Bewerk</th>
					<th>Verwijder</th>
					<th>Artikel nr.</th>
				</tr>
			<?php
				$query = "SELECT * FROM pages ORDER BY idPage DESC";
					$run = $conn->query($query);
					$rowsCount = mysqli_num_rows($run);
					$count = 0;
						while ($row = mysqli_fetch_array($run)) {
							$descString = $row["descPage"];
								echo '<tr>';
									echo '<td><img src="img/gallery/' . $row["imgPage"] . '" alt="" class="imgPosition4" style="width:150px;">
									</td>';	
									echo '<td> <h5>' . $row["titlePage"] . '</h5> </td>';
									echo '<td> <p>' . substr($descString, 0, 30) . '</p> </td>';
									echo '<td> <a href="page-edit.php?pageId=' . $row["idPage"] . '"><button>Bewerk</button></a></td>';
									echo '<td> <a href="page-delete.php?pageId=' . $row["idPage"] . '&&pageImg=' . $row["imgPage"] . '&&pageTitle=' . $row["titlePage"]  .  '&&pageDesc=' . $row["descPage"] . '"><button>Verwijder</button></a> </td>';
									echo '<td> <p>' . $row["idPage"] . '</p> </td>';
								echo '</tr>';							
						}
				?>
		</table>	
		</div>	
	</div>
</main>

<script>
	var xElement = window.document.getElementById('delete-form');

	xElement.addEventListener('click', function (event) {
			document.getElementById('delete-modal-wrapper').style.display='block';
	});
</script>

<!-- admin-page-header -->
</div>
<?php
	require 'footer.php';
?>