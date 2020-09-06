<?php
	include_once 'includes/post.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
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
				$query = "SELECT * FROM gallery ORDER BY idGallery DESC";
					$run = $conn->query($query);
					$rowsCount = mysqli_num_rows($run);
					$count = 0;
						while ($row = mysqli_fetch_array($run)) {
								$descString = $row["descGallery"];
								echo '<tr>';
									echo '<td><img src="img/gallery/' . $row["imgFullNameGallery"] . '" alt="" class="imgPosition4" style="width:150px;">
									</td>';	
									echo '<td> <h5>' . $row["titleGallery"] . '</h5> </td>';
									echo '<td> <p>' . substr($descString, 0, 30) . '</p> </td>';
									echo '<td> <a href="edit.php?artikelId=' . $row["idGallery"] . '"><button>Bewerk</button></a></td>';
									echo '<td> <a href="delete.php?artikelId=' . $row["idGallery"] . '&&artikelImg=' . $row["imgFullNameGallery"] . '&&artikelTitle=' . $row["titleGallery"]  .  '&&artikelDesc=' . $row["descGallery"] . '"><button>Verwijder</button></a> </td>';
									echo '<td> <p>' . $row["idGallery"] . '</p> </td>';
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!-- admin-page-header -->
</div>
<?php
	'footer.php';
?>
