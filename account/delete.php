<div class="col-sm-10">
	<div class="container">
		<div class="align-self-center">
			<?php 
			require_once dirname(__DIR__, 2) . "/includes/Account.incl.php"; 
			require_once dirname(__DIR__, 2) . "/includes/Artikel-delete.incl.php";
			?>
			<h1>Verwijder artikel</h1>			
			<section><p>Weet u zeker dat u de artikel wilt verwijderen</p></section>
			<div>
			<form action="" method="post">
				<input type="submit" name="yes-delete" value="Yes">
				<input type="submit" name="no-delete" value="No">
			</form>	

			</div>	
		</div>
	</div>
</div>