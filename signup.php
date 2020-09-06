<?php
	require "header.php";
?>
<main class="my-5">
	<div class="container">
		<section>
			<h1>Signup</h1>
			<?php
				if (isset($_GET['error'])) {
					if($_GET['error'] == "emptyfields") {
						echo '<p class"">Alle velden invullen!</p>';
					}
					else if($_GET['error'] == "invaliduidemail") {
						echo '<p class"">Ongeldig gebruikersnaam en email!</p>';
					} 
					else if($_GET['error'] == "invaliduid") {
						echo '<p class"">Ongeldig gebruikersnaam!</p>';
					} 
					else if($_GET['error'] == "invalidemail") {
						echo '<p class"">Ongeldig e-mail!</p>';
					}
					else if($_GET['error'] == "passwordcheckuid") {
						echo '<p class"">Wachtwoorden komen niet overeen!</p>';
					}
					else if($_GET['error'] == "usertaken") {
						echo '<p class"">Gebruikersnaam is al gebruikt!</p>';
					}
					else if ($_GET['signup'] == "success") {
						echo '<p class"">Registratie is gelukt!</p>';
					}
				} 
			?>
			<form action="includes/signup.incl.php" method="post">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="email" placeholder="E-mail">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwd-repeat" placeholder="Repeat password">
				<button type="submit" name="signup-submit">Registreer</button>
			</form>
		</section>
	</div>
</main>
<?php
	require "footer.php";
?>