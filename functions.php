<?php

/**************************** Database Functions *****************************/
include 'includes/dbh.incl.php'; 

function make_query($conn)
	{
		$query = "SELECT * FROM homecarousel ORDER BY idCarousel DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}

/**************************** home Functions: Slides  *****************************/
	
function make_slide_indicators($conn)
	{
		$output = ''; 
		$count = 0;
		$result = make_query($conn);
		while($row = mysqli_fetch_array($result))
		{
		if($count == 0)
		{
		$output .= '
		<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
		';
		}
		else
		{
		$output .= '
		<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
		';
		}
		$count = $count + 1;
		}
		return $output;
	}
	
function make_slides($conn)
	{
		$output = '';
		$count = 0;
		$result = make_query($conn);
		while($row = mysqli_fetch_array($result))
		{
			if($count == 0) {
				$output .= '<div class="carousel-item active">';
			}
			else {
				$output .= '<div class="carousel-item">';
			}
			$output .= '
			<img class="d-block w-100" 
				style="height: 400px; object-position: 50% 10%; object-fit: cover;" 
				src="img/carousel/'.$row["mediaCarousel"].'" 
				alt="'.$row["titleCarousel"].'" />
			<div class="carousel-caption d-md-block text-center d-none">
			<h3>'.$row["titleCarousel"].'</h3>
			</div>
			</div>
			';
			$count = $count + 1;
		}
		return $output;
	}



function get_slide_thumbnails() {
    require 'includes/dbh.incl.php'; 
    $query = "SELECT * FROM homecarousel ORDER BY idCarousel DESC";
    $output = '';
    $count = 0;
    
    $run = $conn->query($query);
    
        $result = make_query($conn);
		while($row = mysqli_fetch_array($result)) {
                
			$output .= <<<DELIMETER
			
					<div class="img-responsive" alt="" 
						style="display: inline-flex; background-image: url(img/carousel/{$row["mediaCarousel"]}); 
						background-repeat: no-repeat; background-size: cover; background-position: center center; 
						position: relative;  aspect-ratio: 16/9; width:300px; max-height: 250px; border:solid 1px lightgrey;"
						>	
							<a href="carousel-delete.php?delete-carousel={$row["idCarousel"]}&& mediaCarousel={$row["mediaCarousel"]} && titleCarousel={$row["titleCarousel"]} && descCarousel={$row["descCarousel"]}'" id="getDeleteSlider" style="position: absolute; z-index: 30; border-radius: 5px; border: none; background-color:red; opacity:85%; margin-top: 5px; margin-left: 270px;">
								<i class="fas fa-times"></i>
							</a>
							
					</div>
				
DELIMETER;
}
echo $output;
}

/**************************** Functions: Banner *****************************/
function make_bannerquery($conn)
	{
		$query = "SELECT * FROM banner ORDER BY bannerId DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}


function banner_thumbnails() {
    require 'includes/dbh.incl.php'; 
    $bannerquery = "SELECT * FROM banner LIMIT 1";
    $outBanner = '';
    $count = 0;
    
        $bannerresult = make_bannerquery($conn);
		while($show = mysqli_fetch_array($bannerresult)) {

			$outBanner .= <<<DELIMETER
			
					<div class="img-responsive" alt="" 
						style="display: inline-flex; background-image: url(img/banner/{$show["bannerImage"]}); 
						background-repeat: no-repeat; background-size: cover; background-position: center center; 
						position: relative;  aspect-ratio: 16/9; width:300px; max-height: 250px; border:solid 1px lightgrey;"
						>	
							<a href="banner-delete.php?delete-banner={$show["bannerId"]}&& bannerImage={$show["bannerImage"]} && bannerTitle={$show["bannerTitle"]} && bannerDesc={$show["bannerDesc"]}'" id="getDeleteBanner" style="position: absolute; z-index: 30; border-radius: 5px; border: none; background-color:red; opacity:85%; margin-top: 5px; margin-left: 270px;">
								<i class="fas fa-times"></i>
							</a>
							
					</div>
				
DELIMETER;
}
echo $outBanner;
}

/**************************** Home Page Functions *****************************/

function home_banner_thumbnails() {
    require 'includes/dbh.incl.php'; 
    $bannerquery = "SELECT * FROM banner LIMIT 1";
    $outBanner = '';
    $count = 0;
    
        $bannerresult = make_bannerquery($conn);
		while($show = mysqli_fetch_array($bannerresult)) {

			$outBanner .= <<<DELIMETER
			<div style="background-image: url(img/banner/{$show["bannerImage"]}); background-repeat: no-repeat; background-size: cover; background-position: center; object-fit : cover;">
				<div class="container" style="display: flex; justify-content: center; text-align: center;
				">		
					<section class="row ">
						<section class="col-sm-10"  style="display: flex; flex-direction: column; margin: 0 auto;
						padding: 10px;
						position: relative;">
							<div class="mt-5 pb-5 m-3 w-90" 
							style="text-align: left; height: 300px; max-width: 70rem;>
										<h5 class="card-title" style="color: black;"> {$show["bannerTitle"]} </h5>
										<p class="font-weight-normal"> 
										{$show["bannerDesc"]} </p>
										<br style="height: 10px;" />
										<button type="button">Link To</button>
									</div>										
							</section>
						</section>
					</div>
				</div>
				
DELIMETER;
}
echo $outBanner;
}


/**************************** Functions category *****************************/
function make_categoryquery($conn)
	{
		$query = "SELECT * FROM homecarousel LIMIT 5";
		$result = mysqli_query($conn, $query);
		return $result;
	}

function category_card() {
    require 'includes/dbh.incl.php'; 
    $outCategory = '';
    $count = 0;
    
        $categoryresult = make_categoryquery($conn);
		while($show = mysqli_fetch_array($categoryresult)) {

			$outCategory .= <<<DELIMETER
				<div class="card my-5 mx-2" style="width: 18rem; height: 25rem;">
					<div style="position: relative; display: block; margin-top: -30px; left: 30%; border-radius: 75px; border: solid lightgrey 1px; width: 8rem; height: 8rem; object-fit: cover; overflow: hidden;">
						<img class="" src="img/carousel/{$show["mediaCarousel"]}" alt="Card image cap"
						style="display: block; width: 15rem; margin-left: -50px;"
						>
					</div>
					
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						
					</div>

					<div class="m-3">
						<a href="#" class="btn btn-primary w-100" >Go somewhere</a>
					</div>
				</div>
				
DELIMETER;
}
echo $outCategory;
}

/**************************** Functions category *****************************/
function make_methodquery($conn)
	{
		$query = "SELECT * FROM method LIMIT 5";
		$result = mysqli_query($conn, $query);
		return $result;
	}

function method_card() {
    require 'includes/dbh.incl.php'; 
    $outMethod = '';
    $count = 0;
    
        $methodresult = make_methodquery($conn);
		while($show = mysqli_fetch_array($methodresult)) {

			$outMethod .= <<<DELIMETER
				<div class="card my-5 mx-2" style="width: 18rem; height: 25rem;">
						<img 
							class=""
							src="img/methods/{$show["imgNameMethod"]}" 
							alt="Card image cap"
							style="position: relative; display: block; margin-top: -30px; left: 30%; width: 8rem; height: 8rem;"
						style="display: block; width: 15rem; margin-left: -50px;"
						>
					
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						
					</div>

					<div class="m-3">
						<a href="#" class="btn btn-primary w-100" >Go somewhere</a>
					</div>
				</div>
				
DELIMETER;
}
echo $outMethod;
}

/**************************** Functions videos *****************************/

function make_videos_query($conn)
	{
		$query = "SELECT * FROM videos ORDER BY idVideos DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}

function get_videos_thumbnails() {
    require 'includes/dbh.incl.php'; 
    $query = "SELECT * FROM videos ORDER BY idVideos DESC";
    $outVideo = '';
    $count = 0;
    
    $run = $conn->query($query);
    
        $result = make_query($conn);
		while($row = mysqli_fetch_array($result)) {
                
			$outVideo .= <<<DELIMETER
			
					<div class="img-responsive" alt="" 
						style="display: inline-flex; background-image: url(img/carousel/{$row["youtubeVideos"]}); 
						background-repeat: no-repeat; background-size: cover; background-position: center center; 
						position: relative;  aspect-ratio: 16/9; width:300px; max-height: 250px; border:solid 1px lightgrey;"
						>	
							<a href="carousel-delete.php?delete-carousel={$row["idVideos"]}&& nameVideos={$row["youtubeVideos"]} && titleVideos={$row["titleVideo"]} '" id="getDeleteVideos" style="position: absolute; z-index: 30; border-radius: 5px; border: none; background-color:red; opacity:85%; margin-top: 5px; margin-left: 270px;">
								<i class="fas fa-times"></i>
							</a>
							
					</div>
				
DELIMETER;
}
echo $outVideo;
}