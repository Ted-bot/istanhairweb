
<div class="col-sm-9">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require_once dirname(__DIR__, 2) . "/includes/Account.incl.php"; 
			require_once dirname(__DIR__, 2) . "/includes/Artikel-upload.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Bewerk</h1>			
			
			<form action="" method="post">
				<?php				
			$artikel_Id = $_GET['artikelId'];
				//creat var that checks database for matching articleID and logged in User
			$lijst = Database::query("SELECT * FROM artikelen WHERE artikelId = :artikelId AND userId = :userId", array(':artikelId'=> $artikel_Id, ':userId'=> User::isLoggedIn() ));
			foreach($lijst as $artikel) {
				echo '<section>';
				echo '<input type="text" name="artikel-titel" value=' . $artikel["artikelTitel"] . '>';
				echo '</section>';
				echo '<textarea>' . $artikel['artikelTekst'] . '</textarea><br>';
				echo '<input type="datetime-local" name="artikel-datum" value='. date("Y-m-d H:i:s", printf($artikel['artikelDatum'])) . '><br>';
//				echo '<input type="datetime-local" name="artikel-datum" value='. $artikel['artikelDatum'] . '><br>';
//				echo '<input type="datetime-local" name="artikel-datum" value="2020-09-09 05:05"><br>';
//				echo '<form method="post"><input type="submit" name="edit-submission" value ="bewerk"></form>';
				echo '<a href="account-bewerk-artikel?artikelId=' . $artikel['artikelId'] . '">Bewerk artikel</a>';
				echo '<input type="submit" name="edit-artikel" value="Edit">';
				echo '<br>';
				echo '</section>';
				echo '<br>';				
			}
		?>					
			</form>
		</div>
	</div>
</div>