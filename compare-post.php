
<?php 
//	require 'header.php';
	include_once 'includes/dbh.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'functions.php'; 
?>

<main class="my-5">
	
<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Upload vergelijking foto's</h1>			
			<br>
			<form action="includes/compare.incl.php" method="post" enctype="multipart/form-data">
			<div class="row">
                <section class="col-sm-5">
                    <h3>Voor behandeling</h3>
                    <input type="text" name="compare-title-1" id="id-title-1" placeholder="arikel titel.." style="width:100%;"><br><hr>
                                    
                    <input type="text" name="compare-name-1" id="id-name-1" placeholder="afbeelding naam.." style="width:100%;"><br><br>
                    <input type="file" name="compare-img-1" id="id-img-1"><br>
                </section>
                
                <section class="col-sm-5">
                    <h3>Na behandeling</h3>
                    <input type="text" name="compare-title-2" id="id-img-1" placeholder="arikel titel.." style="width:100%;"><br><hr>
                                    
                    <input type="text" name="compare-name-2" id="id-name-2" placeholder="afbeelding naam.." style="width:100%;"><br><br>
                    <input type="file" name="compare-img-2" id="id-img-2"><br>
                </section>
            </div>
            <hr>

            <div class="slider" class="before" >
                <div class="original-image" class="after">
  				</div>
                <input type="range" value="50" max="100">
            </div>


     
   </script>
            
			<hr>
				<section class="form-group">		
					<button type="submit" name="compare-upload">artikel Uploaden</button>
				</section>
			</form>
		</div>
	</div>
</div>
<br>
	<hr>

<h1>vergelijkingen beschikbaar</h1>

<div class="col">
	<div class="row-xs-6 row-md-3">
		<?php compare_thumbnails(); ?>
	</div>
</div>
</main>
<script src="js/compare.js">
<script src="compare-images.js"></script>
<?php
	require 'footer.php';
?>