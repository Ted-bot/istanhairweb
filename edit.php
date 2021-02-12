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

<!-- admin pageheader ending div tag -->
</div>

<?php
	ob_end_flush();
	require 'footer.php';
?>