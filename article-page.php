<?php
	require "header.php";
?>
<main class="my-5">
	<div class="container">
		<div class="row justify-content-center">
			<section class="col-sm-8">
		<?php					
			$article_Id = $_GET['artikelId'];
				//creat var that checks database for matching articleID and logged in User
//			$lijst = Database::query("SELECT * FROM gallery WHERE artikelId = :artikelId AND userId = :userId", array(':artikelId'=> $artikel_Id));
				$query = ("SELECT * FROM gallery WHERE idGallery =" . $article_Id . " ");
				
				$run = $conn->query($query);
			foreach($run as $article) {				
				echo '<h1>' . $article['titleGallery'] . '</h1>';
				echo '<span class="text-secondary" style="font-size: 12px;">' . $article["dateGallery"] . '</span>';				
				echo '<section class="custom-control">
						<img src="img/gallery/' . $article["imgFullNameGallery"] . '" alt="" class="col article-img">						
					</section><br>';
				echo '<section>';
				echo '<p>' . $article['descGallery'] . '</p>';
				echo '<br>';
//				echo '<input type="datetime-local" name="artikel-datum" value='. date("Y-m-d H:i:s", printf($artikel['dateGallery'])) . '><br>';
//				echo '<input type="datetime-local" name="artikel-datum" value="2020-09-09 05:05"><br>';
//				echo '<form method="post"><input type="submit" name="edit-submission" value ="bewerk"></form>';
				echo '<br>';
				echo '</section>';
				echo '<br>';
			}
		?>
			</section>
		</div>
	</div>
</main>
<!-- admin pageheader ending div tag -->
</div>
<?php
	require "footer.php";
?>