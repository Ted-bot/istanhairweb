
<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require_once dirname(__DIR__, 2) . "/includes/Account.incl.php"; 
			require_once dirname(__DIR__, 2) . "/includes/Artikel-upload.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">It works</h1>			
			
			<form action="" method="post" enctype="multipart/form-data">
					<input type="text" name="artikel-titel" placeholder="Titel">
					
					<input type="text" name="artikel-tekst" placeholder="Tekst">				
					<input type="datetime-local" name="artikel-datum" placeholder="Datum">
					
					<input type="number" name="artikel-categorie" placeholder="C#">
					
					<input type="checkbox" name="artikel-view" placeholder="Online" checked>
					<label for="sartikel-categorie">Online plaatsen</label>
						
					Upload an afbeelding:<br>
					<input type="file" name="post-img">
						

				<section class="form-group">		
					<button type="submit" name="upload-artikel" value="upload-artikel">Artikel plaatsen</button>
				</section>
			</form>
		</div>
	</div>
</div>