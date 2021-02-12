<?php
	require "header.php";	
	include "functions.php"
?>
<main class="my-5">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
   <?php echo make_slide_indicators($conn); ?>
  </ol>
  <div class="carousel-inner">
  	<?php echo make_slides($conn); ?>
</div>
    
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container" style="display: flex; justify-content: center; text-align: center;">
	
		<section class="row">
			<?php
				$query = "SELECT * FROM homeintro ORDER BY idIntro LIMIT 1";
					$run = $conn->query($query);
					$rowsCount = mysqli_num_rows($run);
					$count = 0;
						if ($row = mysqli_fetch_array($run)) {
								echo '<section class="col-sm-10" style="display: flex; flex-direction: column; margin: 0 auto;
								padding: 10px;
								position: relative;">
										<div class="mt-5 pb-5 m-3 " 
										style="text-align: left; height: 300px; max-width: 80rem;">
												<h5 class="card-title" style="color: black;">' . $row["titleIntro"] . '</h5>
												<div class="font-weight-normal" 
												>
												' . $row["descIntro"] . '</div>
												<br style="height: 10px;" />
												<button type="button">Link To</button>
										</div>										
									</section>';

									
						}
				?>
		</section>
		
</div>

<?php  home_banner_thumbnails() ?>


<div style="background-color: #add8e6;">
	<div style="postition: relative; display: block; z-index: 1;">
		<script src="https://apps.elfsight.com/p/platform.js" defer></script>
		<div class="elfsight-app-401d2cf5-a6e3-46f2-a632-ac3dd5af95c0"></div>
	</div>
	
	<div style="position: relative; display: block; margin: -67px auto 0; background-color: #add8e6; width: 220px; height: 80px; z-index: 20"></div>
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

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</body>	
<?php
	require "footer.php";
?>