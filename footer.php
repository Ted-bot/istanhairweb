<script src="preview-image.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$('#search').keyup(function() {
				var youtubequery = $('#search').val();
				// alert(youtubequery);
					$.ajax({
						url: "./youtube_api.php",
						type: 'POST',
						data: {search: youtubequery},
						success: function(response) {
							alert(response);
						},
						error: function(xhr, status, error) {
						alert(xhr.responseText);
						}
					});

			});
		});
			            
</script>
<footer>
	
</footer>

</body>
</html>