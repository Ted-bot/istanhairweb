<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'functions.php';
?>
<main class="container my-5">
		<div class="col-sm-10">
		
			<section class="align-self-center">
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Slides pagina</h1>
			<br>
			<form action="includes/home-page.incl.php" method="post" enctype="multipart/form-data">
			
			<input type="text" name="home-page-title" placeholder="Pagina titel.." style="width:100%;"><br><br>
			<textarea name="home-page-desc" id="" cols="30" placeholder="pagina beschrijving.."rows="10" style="width:100%;"></textarea>
			<hr>
							
<!--			<input type="text" name="page-name" placeholder="afbeelding naam.." style="width:100%;"><br><br>-->
			<input type="file" name="home-page-file" id="default-btn" onchange="loadFile(event)" hidden>
			<button type="button" onclick="defaultBtnActive()" id="custom-btn">Kies een afbeelding</button>

			
			<!-- <input id="default-btn" type="file" hidden> -->
			<div >
				<div id="cancel-btn" style="position: relative; margin-bottom: -25px; padding-left: 475px; z-index: 30;">
					<i class="fas fa-times"></i>
				</div>

				<div class="image-preview" onload="start()" onclick="defaultBtnActive()" id="custom-btn" 
					style="display: flex; justify-content:center; width: 500px; height: 300px; 
  						border: 2px dashed #cdcdda; ";>
					<img src=" " alt="" style="position: absolute; width: 500px; height: 300px; object-fit: cover;" id="output">
					<div class="icon">
						<i class="fas fa-cloud-upload-alt" style="line-height: 275px; padding-left: 50px;"></i>
					</div>
				<div style="position: absolute; line-height: 500px; z-index: 10;">
					<span class="image-preview__text" style="font-size: 30px; color: grey;">voorbeeld afbeelding</span>
				</div>
				
			</div>

			</div>
			
			<div class="file-name">
						<!-- geslecteerde Bestand Naam -->
					</div>
			<hr>
				<section class="form-group">		
					<button type="submit" name="home-page-upload">Banner Uploaden</button>					
				</section>
			</form>		
		</section>
		</div>		
		<br>
	<hr>

<h1>Slides beschikbaar</h1>

<div class="col">
<div class="row-xs-6 row-md-3">
	<?php get_slide_thumbnails(); ?>
	

</div>
</div>
</main>

</div>
<?php
	ob_end_flush();
	require 'footer.php';
?>