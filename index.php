<?php
	require "header.php";	
?>
<main class="my-5">
<div class="col-sm-12">
	<div class="container-xl">
		<section class="row">
		<!--	Preview posts: row 1	-->
		<?php
			$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 3";
			$run = $conn->query($query);
			$rowsCount = mysqli_num_rows($run);
			$count = 0;
				while ($row = mysqli_fetch_array($run)) {
					$count++;
					$isFirst = ($count == 1) ? true : false;
					$isSecond = ($count == 2) ? true : false;
					$isLast = ($count == $rowsCount) ? true : false;
					$descString = $row["descGallery"];
					if (!$isLast){
						echo '<a href="article-page.php?artikelId=' . $row["idGallery"] . '" class="index-row-1-a index-row-1-a-width mx-1" >
						<div  style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . '); display:flex; " type="image/jpg" class="imgPosition1 mx-2">
							<div style="position: absolute; align-self: flex-end; z-index:5;">
								<h5 class="card-title m-3" style="color: white;">' . $row["titleGallery"] . '</h5>						
							</div>
							<div style="background:linear-gradient(transparent, #000000); width: 100%; height: 50%; align-self: flex-end; position: relative; z-index:1;"></div>
						</div>
						
						</a>';
					}
				}

		?>
		</section>
		<!--	Preview posts: row 2	-->
		<section>	
		<?php
			$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 3";
				$run = $conn->query($query);
				$rowsCount = mysqli_num_rows($run);
				$count = 0;
					while ($row = mysqli_fetch_array($run)) {
						$count++;
						$isFirst = ($count == 1) ? true : false;
						$isSecond = ($count == 2) ? true : false;
						$isLast = ($count == $rowsCount) ? true : false;
						$descString = $row["descGallery"];
						if (!$isSecond && !$isFirst){
							echo '<a href="article-page.php?artikelId=' . $row["idGallery"] . '" class="m-3">
							<div  style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . '); display:flex;" type="image/jpg" class="imgPosition2">	
								<div style="position: absolute; align-self: flex-end; z-index:5;">
									<h5 class="card-title m-3" style="color: white;">' . $row["titleGallery"] . '</h5>
								</div>
								<div style="background:linear-gradient(transparent, #000000); width: 100%; height: 50%; align-self: flex-end; position: relative; z-index:1;"></div>
							</div>
							
						</a>';
						}
					}

		?>
		</section>
		<!--	Preview posts: row 3	-->	
		<section class="row">
			<?php
				$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 4";
					$run = $conn->query($query);
					$rowsCount = mysqli_num_rows($run);
					$count = 0;
						while ($row = mysqli_fetch_array($run)) {
							$count++;
							$isFirst = ($count == 1) ? true : false;
							$isSecond = ($count == 2) ? true : false;
							$isThird = ($count == 3) ? true : false;
							$isLast = ($count == $rowsCount) ? true : false;
							$descString = $row["descGallery"];
							if (!$isSecond && !$isFirst && !$isThird) {
								echo '<a href="article-page.php?artikelId=' . $row["idGallery"] . '" class="Sevenbarpx m-3">
								<div  style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . '); display:flex;" type="image/jpg" class="imgPosition3">
									<div style="position: absolute; align-self: flex-end; z-index:5;">
										<h5 class="card-title m-3" style="color: white;">' . $row["titleGallery"] . '</h5>
									</div>
									<div style="background:linear-gradient(transparent, #000000); width: 100%; height: 50%; align-self: flex-end; position: relative; z-index:1;""></div>
								</div>								
								</a>';
							}
						}
				?>
		</section>
		<!--	Preview posts: row 4	-->
		<section class="mx-3">	
		<?php
			$query = "SELECT * FROM gallery ORDER BY idGallery DESC  LIMIT 7";
				$run = $conn->query($query);
				$rowsCount = mysqli_num_rows($run);
				$count = 0;
					while ($row = mysqli_fetch_array($run)) {
						$count++;
						$isFirst = ($count == 1) ? true : false;
						$isSecond = ($count == 2) ? true : false;
						$isThird = ($count == 3) ? true : false;
						$isFourth = ($count == 4) ? true : false;
						$isLast = ($count == $rowsCount) ? true : false;
						$descString = $row["descGallery"];
						if (!$isSecond && !$isFirst && !$isThird && !$isFourth){
							echo '<a class="a-hover" href="article-page.php?artikelId=' . $row["idGallery"] . '" class="m-3">
							<section class="row">
									<img  src="img/gallery/' . $row["imgFullNameGallery"] . '" class="imgPosition4">
									<section class="mx-3">
										<h5 class="card-title">' . $row["titleGallery"] . '</h5>
										<p class="card-text">' . substr($descString, 0, 30) . '..</p>
									</section>
							</section>
							</a>';
						}
					}
				?>
			</section>
		</div>	
	</div>	
</main>
<!--login-->
<script async src=”//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js”></script>
<ins class=”adsbygoogle”
style=”display:block; text-align:center;”
data-ad-layout=”in-article”
data-ad-format=”fluid”
data-ad-client=”ca-pub-7013552742369373″
data-ad-slot=”5323679646″></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script>
		//creating a pop-up function for login button
		const buttonElement = document.getElementById('btn');

		buttonElement.addEventListener('click', function (event) {
				document.getElementById('modal-wrapper').style.display='block';
		});

		//collapse login dropdown
		const collapseElement = document.getElementById('btn-collapse');	

		collapseElement.addEventListener('click', function (event) {
			if ( document.getElementById('modal-wrapper').style.display='block' ){
		  document.getElementById('modal-wrapper').style.display='none';}
		});

		function stay() {
			document.getElementById('modal-wrapper').style.display='block';
		}

		//when click on div collapse form
		const wrapperElement = document.getElementById('modal-wrapper');
	
</script>	

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>	
<?php
	require "footer.php";
?>