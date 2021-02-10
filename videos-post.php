<?php 
	include_once 'admin-nav.php';
	include_once 'admin-page-header.php';
	include_once 'functions.php';
?>
<main class="container my-5">
		<div class="col-sm-10">
			<?php 
			require "includes/videos.incl.php";
			?>
			<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Upload Video</h1>			
			<br>
			<form action="includes/post.incl.php" method="post" enctype="multipart/form-data">
			
			<input type="text" id="title" name="video-title" placeholder="plaats url van youtube bijv. https://www.youtube.com/example" style="width:100%;">
            <p id="note"></p>
            <br>
            <br>
            <hr>
			<input type="button" value="Selecteer youtube video" onClick="newSite()" />

            <div class="image-preview" onload="start()" onclick="defaultBtnActive()" id="custom-btn" 
					style="display: flex; justify-content:center; width: 500px; height: 300px; 
  						border: 2px dashed #cdcdda; ";>
					<img src=" " alt="" style="position: absolute; width: 500px; height: 300px; object-fit: cover;" id="output">
					<div class="icon">
						<i class="fas fa-cloud-upload-alt" style="line-height: 275px; padding-left: 50px;"></i>
					</div>
				<div style="position: absolute; line-height: 500px; z-index: 10;">
					<span class="image-preview__text" style="font-size: 30px; color: grey;">voorbeeld video</span>
				</div>
				
			</div><br>
			<hr>
				<section class="form-group">		
					<button type="submit" name="video-upload">Video Uploaden</button>
				</section>
			</form>
            <section>
                <iframe id="myIframe" src="https://www.youtube.com/watch?v=W13l3JbPiCo&ab_channel=CookieMoneyVEVO " onLoad="iframeDidLoad();"
                    width="560" height="315" frameborder="0" allowfullscreen>
                </iframe>
            </section>
			<?php

$url = "https://www.reviewsmaker.com/api/public/yelp/?url=https://www.yelp.com/biz/munchinette-brooklyn";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)) {
    echo $e;
}else {
    $decoded = json_decode($resp);
    print_R($decoded);
}
curl_close($ch);

?>
		</div>		
		<br>
	<hr>
<h1>Videos beschikbaar</h1>

<div class="col">
	<div class="row-xs-6 row-md-3">
		<?php get_videos_thumbnails(); ?>
	</div>
</div>
</main>
<script src="preview-videos.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<!-- admin-page-header -->
</div>
<?php
	ob_end_flush();
	'footer.php';
?>