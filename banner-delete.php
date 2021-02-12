<?php
	include_once 'includes/home-banner.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
?>

  <main>	
	<?php include_once "includes/home-banner.incl.php";?>
	<div id="delete-modal-wrapper" class="">
		<form class="modal-content-2" action=" " method="post">
			<h1>Pagina <?php echo $_GET['delete-banner']; ?> verwijderen</h1>
			<br>
			<section class="row">
				<img src="img/banner/<?php echo $_GET['bannerImage']; ?>" class="imgPosition4" style="width:150px;">
				<section class="col">
					<span>Titel:</span><h3><?php echo $_GET['bannerTitle']; ?></h3><br>	
					<span>Tekst:</span><p><?php echo $_GET['bannerDesc']; ?></p>
				</section>
			</section>
			<hr>
			<section style="justify-content: space-between;">
				<button class="response-btn btn bg-success text-white" type="submit" name="yes-delete">Ja verwijderen</button>
				<button class="response-btn btn bg-danger text-white" type="submit" name="no-delete">Niet verwijderen</button>
			</section>
		</form>
	</div>
	
	</main>

<script>
	var xElement = window.document.getElementById('delete-form');

	xElement.addEventListener('click', function (event) {
			document.getElementById('delete-modal-wrapper').style.display='block';
	});
</script>

<!-- admin pageheader ending div tag -->
</div>

<?php
	require "footer.php";
?>