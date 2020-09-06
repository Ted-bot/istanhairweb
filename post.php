
<?php 
//	require 'header.php';
	include_once 'includes/dbh.incl.php';
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
//	include_once 'includes/post.incl.php'; 
?>

<main class="my-5">
	
<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require "includes/post.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Upload artikel</h1>			
			<br>
			<form action="includes/post.incl.php" method="post" enctype="multipart/form-data">
			
			<input type="text" name="file-title" placeholder="arikel titel.." style="width:100%;"><br><br>
			<textarea name="file-descr" id="" cols="30" placeholder="artikel beschrijving.."rows="10" style="width:100%;"></textarea>
			<hr>
							
			<input type="text" name="file-name" placeholder="afbeelding naam.." style="width:100%;"><br><br>
			<input type="file" name="file-img"><br>
			<hr>
				<section class="form-group">		
					<button type="submit" name="file-upload">artikel Uploaden</button>
				</section>
			</form>
		</div>
	</div>
</div>
</main>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!--closing div from admin header page -->
</div>
<?php
	'footer.php';
?>