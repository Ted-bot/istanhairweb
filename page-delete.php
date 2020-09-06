<?php
	include_once 'includes/page.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
?>

  <main>	
	<?php include_once "includes/page.incl.php";?>
	<div id="delete-modal-wrapper" class="">
		<form class="modal-content-2" action=" " method="post">
			<h1>Pagina <?php echo $_GET['pageId']; ?> verwijderen</h1>
			<br>
			<section class="row">
				<img src="img/gallery/<?php echo $_GET['pageImg']; ?>" class="imgPosition4" style="width:150px;">
				<section class="col">
					<span>Titel:</span><h3><?php echo $_GET['pageTitle']; ?></h3><br>	
					<span>Tekst:</span><p><?php echo $_GET['pageDesc']; ?></p>
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!-- admin-page-header -->
</div>
<?php
	'footer.php';
?>