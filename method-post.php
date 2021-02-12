<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'includes/method.incl.php'; 
?>

<main class="my-5">
	
<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require "includes/method.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Upload methode</h1>			
			<br>
			<form action="includes/method.incl.php" method="post" enctype="multipart/form-data">
			
			<input type="text" name="method-title" placeholder="Methode titel.." style="width:100%;"><br><br>
			<textarea name="method-descr" id="" cols="30" placeholder="pagina beschrijving.."rows="10" style="width:100%;"></textarea>
			<hr>
							
<!--			<input type="text" name="page-name" placeholder="afbeelding naam.." style="width:100%;"><br><br>-->
			<input type="file" name="method-img">
			<label for="method-img">Kies een icoon/ afbeelding</label>
			<br>
			<hr>
				<section class="form-group">		
					<button type="submit" name="method-upload">Methode Uploaden</button>
				</section>
			</form>
		</div>
	</div>
</div>
</main>

<!-- admin-page-header -->
</div>
<?php
	require 'footer.php';
?>