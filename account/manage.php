<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require_once dirname(__DIR__, 2) . "/includes/Account.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Bewerk artikel</h1>			
			
			<div>
		<ul>
		<?php
			$lijst = Database::query('SELECT * FROM artikelen');

			foreach($lijst as $artikel) {
				echo '<section>';			
				echo '<h1 class="titel">' . $artikel['artikelTitel'] . '</h1>';
				echo '</section>';
				echo '<p>' . $artikel['artikelTekst'] . '</p>';
//				echo '<form method="post"><input type="submit" name="edit-submission" value ="bewerk"></form>';
				echo '<a href="account-bewerk-artikel?artikelId=' . $artikel['artikelId'] . '">Bewerk artikel</a>';
				echo ' ';
				echo '<a href="account-verwijder-artikel?artikelId=' . $artikel['artikelId'] . '">Verwijder artikel</a>';
				echo '</section>';
				echo '<br>';				
			}
			
//			while ($row = $lijst->fetch()) {
//				echo $row;
//			}

		?>
		</ul>
	</div>	
		</div>
	</div>
</div>