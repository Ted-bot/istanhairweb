<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'includes/page.incl.php'; 
?>
<main class="container my-5">
		<div class="col-sm-10">
		
			<section class="align-self-center">
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Bewerk pagina</h1>
			<br>
			<?php					
			$page_Id = $_GET['pageId'];
				//creat var that checks database for matching pageID and logged in User
//			$lijst = Database::query("SELECT * FROM gallery WHERE artikelId = :artikelId AND userId = :userId", array(':artikelId'=> $artikel_Id));
				$query = ("SELECT * FROM pages WHERE idPage =" . $page_Id . " ");
				
				$run = $conn->query($query);
			foreach($run as $page) {
				echo '<form action="" method="post" enctype="multipart/form-data">';
				echo '<section>';				
				echo '<section class="row">
						<section class="col-sm-5"><span>Achtergrond afbeelding:</span>
						<img src="img/gallery/' . $page["imgPage"] . '" class="imgPosition4">
						</section>
						<section class="col-sm-5"><span>verander afbeelding:</span>
						<br><input type="file" name="edit-page-img" ></section>
						</section>
						<br>';
				echo '</section>';
				echo '<input type="text" name="page-title-edit" class="w100" value=' . $page['titlePage'] . '>';	
				echo '<br>';
				echo '<textarea name="page-text-edit" cols="30" rows="10" style="width:100%;">' . $page['descPage'] . '</textarea>';
				echo '<br>';
				echo '<button type="submit" name="edit-page" value="Edit-page">Pagina wijzigen</button>';
				echo '<br>';
				echo '</section>';
				echo '<br>';	
				echo '</form>';		
			}
		?>			
		</section>
	</div>
</main>

<!-- admin-page-header -->
</div>
<?php
	ob_end_flush();
	require 'footer.php';
?>