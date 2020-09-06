<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'includes/post.incl.php'; 
?>
<main class="container my-5">
		<div class="col-sm-10">
		
			<section class="align-self-center">
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Bewerk artikel</h1>
			<br>
			<?php					
			$article_Id = $_GET['artikelId'];
			$query = ("SELECT * FROM gallery WHERE idGallery =" . $article_Id . " ");
				
			$run = $conn->query($query);
			foreach($run as $article) {
				echo '<form action="" method="post" enctype="multipart/form-data">';
				echo '<section>';				
				echo '<section class="row">
						<section class="col-sm-5"><span>Huidige afbeelding:</span>
						<img src="img/gallery/' . $article["imgFullNameGallery"] . '" class="imgPosition4">
						</section>
						<section class="col-sm-5"><span>verander afbeelding:</span>
						<br><input type="file" name="edit-file-img" ></section>
						</section>
						<br>';
				echo '</section>';
				echo '<input type="text" name="article-title-edit" class="w100" value=' . $article['titleGallery'] . '>';	
				echo '<br>';
				echo '<textarea name="article-text-edit" cols="30" rows="10" style="width:100%;">' . $article['descGallery'] . '</textarea>';
				echo '<br>';
				echo '<button type="submit" name="edit-article" value="Edit-article">Artikel wijzigen</button>';
				echo '<br>';
				echo '</section>';
				echo '<br>';	
				echo '</form>';
			}
		?>			
		</section>
	</div>
</main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!-- admin-page-header -->
</div>
<?php
	ob_end_flush();
	'footer.php';
?>