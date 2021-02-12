<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
?>

<main class="my-5">
	
<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require "includes/page.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Upload pagina</h1>			
			<br>
			<form action="includes/page.incl.php" method="post" enctype="multipart/form-data">
			
			<input type="text" name="page-title" placeholder="Pagina titel.." style="width:100%;"><br><br>
			<textarea name="page-descr" id="" cols="30" placeholder="pagina beschrijving.." rows="10" style="width:100%;"></textarea>
			<hr>
			<input type="file" name="page-img">
			<label for="page-img">Kies een achtergrond</label>
			<br>
			<hr>
			
			<hr>
				<section class="form-group">		
					<button type="submit" name="page-upload">Pagina Uploaden</button>
				</section>
			</form>

			<form action="youtube_api.php">
			
			</form>
			<h3>Voeg een video toe</h3>
			<br>
			<hr>
			<input type="text" class="form-control" id="search" name="search" placeholder="type in gezochte video" onchange="getYoutubeResults(event)">
			<br>
			<hr>
			<br>
			<h1>Videos beschikbaar</h1>
			<div class="col">
				<div class="row-xs-6 row-md-3">
					<h2 id="result">
					
					</h2>
				</div>
			</div>
			<br>

		</div>
	</div>
</div>
</main>

<!-- admin-page-header -->
</div>
<?php
	require 'footer.php';
?>
