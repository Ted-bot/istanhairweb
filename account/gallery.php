<div class="col-sm-9">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require_once dirname(__DIR__, 2) . "/includes/Account.incl.php"; 
			require_once dirname(__DIR__, 2) . "/includes/Artikel-upload.incl.php";
			?>
			 <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Thumbnail Gallery</h1>			
			<div class="container">
<!--	To upload Image Enctype multipart/form-data is needed at end		-->
			<form action="" method="post" enctype="multipart/form-data">
						<input type="text" name="fileName" placeholder="file name..">
						<br>
						<input type="text" name="fileTitle" placeholder="file tite..">
						<br>
						<input type="text" name="fileDesc" placeholder="Image Description..">
						<br>
						<input type="file" name="fileImg">
						<br>
						<button type="submit" name="upload-image">Upload</button>
						
			</form>
			
			  <hr class="mt-2 mb-5">
			<?php
			
	
				?>
<!--
				<form method="POST" class="justify-content-center " enctype="multipart/form-data">
		<h3 class="mt-4"> Insert Image</h3><br><br>
		<input type="file" name="image" accept="image/*" required id="image">
		<br><br>
		<input type="submit" name="insert" id="insert" class="btn btn-primary" value="insert" onclick="selected_image();">
	</form>
-->
<!--
			<div class="col-lg-3 col-md-4 col-6 ">
				  <a href="#" class="d-block">
				  		<div class="gallery-container">
						<img class="img-fluid img-thumbnail gallery-container" src="https://source.unsplash.com/pWkk7iiCoDM/" alt="">   
						</div>     
						<h4>' . $img['titleGallery'] . '</h4>
						<p>' . $img['descGallery'] . '</p>
					  </a>         
				</div>	
-->

			</div>

		</div>
	</div>
</div>



