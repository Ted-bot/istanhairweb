<?php

if (isset($_POST['video-upload'])) {
	$newFileName = $_POST['video-title'];
	
	if (empty($newFileName)) {
		$newFileName = "video";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['video-title'];
	
	$videoObject = $_FILES['video-file'];
	
	$fileName = $videoObject['name'];
	$fileType = $videoObject['type'];
	$fileTempName = $videoObject['tmp_name'];
	$fileError = $videoObject['error'];
	$fileSize = $videoObject['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("mp4");
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ( $fileSize < 105000000  ){
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../videos/" . $imageFullName;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitle)) {
					header("Location: ../videos-post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM videos";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
//						$rowCount = mysqli_num_rows($result);
//						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO videos (titleVideos, youtubeVideos) VALUES (?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							// bind 3 strings to statement
							mysqli_stmt_bind_param($stmt, "ss", $imgTitle, $imageFullName);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName, $fileDestination);
							
							header("Location: ../videos-post.php?upload=succes");
							exit();
						}
					}
				}
				
				
			} else {
				echo 'bestand is te groot!';
			}
			
		} else {
			echo 'U heeft een error bij het uploaden van uw bestand!';
		}
	} else {
		echo 'Om een bestand te uploaden moet het een PNG/JPEG/JPG bestand zijn!';
	}
	
	print_r($videoObject);
	
}

// foreach($_POST['name'] as $name)
if (isset($_POST["edit-video"])) {
	// $number = $_POST["id"];    

	// foreach($_POST["id"] AS $num) {	
	$newFileName = $_POST['video-title-edit'];
	
	if (empty($newFileName)) {
		$newFileName = "video";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['videos-title-edit'];
	
	$videoObject = $_FILES['edit-videos-name'];
	
	$fileName = $videoObject['name'];
	$fileType = $videoObject['type'];
	$fileTempName = $videoObject['tmp_name'];
	$fileError = $videoObject['error'];
	$fileSize = $videoObject['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (empty($fileName)) {
		include_once "dbh.incl.php";
		$sql = "SELECT titleVideos, youtubeVideos FROM videos;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				printf("SQL statement gefaald 1!");
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$sql = "UPDATE videos SET titleVideos =?, youtubeVideos =? WHERE idvideos =?";
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					print("SQL statement gefaald 2!");
				} else {
					mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $videos_id);
					mysqli_stmt_execute($stmt);
					header("Location: ../blog-app/videos-post.php?uploadtextonly=succes");
					exit();
				} 
			}
					} else if (in_array($fileActualExt, $allowed)) {
						//	check if there is an error in uploaded file
						if ($fileError === 0) {
							//check if size is bigger than 2mb / 2000000 bytes
							if ( $fileSize < 2000000 ){
								// create new name for uploaded file with Uniq Id
								$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
								// destination of file uploaded
								$fileDestination = dirname(__DIR__) . "/img/methods/" . $imageFullName;

								include_once "dbh.incl.php";

								if (empty($imgTitle) || empty($imgDescr)) {
									header("Location: /blog-app/videos-edit.php?uploadTitle&Description=empty");
									exit();
								} else {
									$sql = "SELECT titlevideos, descvideos, imgvideos FROM videoss;";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo"SQL statement gefaald 1!";
									} else {
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$rowCount = mysqli_num_rows($result);
										$setImageOrder = $rowCount + 1;
										$sql = "UPDATE videoss SET titlevideos ='" . $imgTitle . "', descvideos ='" . $imgDescr . "', imgvideos ='" . $imageFullName . "' WHERE idvideos ='" . $videos_id . "' ";
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo "SQL statement gefaald 2!";
										} else {
											mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
											mysqli_stmt_execute($stmt);
											if (file_exists($fileTempName)) {
												if (move_uploaded_file($fileTempName, $fileDestination)){
													// header("Location: /blog-app/posts-manage.php?videosId=" . $videos_id . "&upload=succes");
													exit();
												} else {
													// header("Location: /blog-app/videos-edit.php?videosId=" . $videos_id . "&uploadImage=failed");
													exit();
												}
											} else {
												// header("Location: /blog-app/videos-edit.php?videosId=" . $videos_id . "&uploadImage=fileDoesntExist");
												exit();
											}
						}
					}
				}
			}
		}
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

// Delete article
if (isset($_POST['yes-delete'])) {
		$videos_Id = $_GET['delete-video'];
		include_once "dbh.incl.php";		
		$sql = "SELECT youtubeVideos FROM videos WHERE idVideos = '" . $_GET["delete-video"]  . "' LIMIT 1";
		$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo"SQL statement gefaald 1!";
				}
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 2!";
					} else {
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					
					$myArray = array();

					// get image name from server
					if ($myArray = mysqli_fetch_assoc($result)) { 
						echo 'wat is dit ';
						$row = $myArray['youtubeVideos'];
						//file includes absolute file
						include_once('videos/videos.directory.php');

						// $img_map; from directory

						$target_path = $img_map . $row;
						echo 'naar ' . $target_path;
					
						// delete file from directory
						unlink($target_path);
					}
					// delete image from data base

					$sql = "DELETE FROM videos WHERE idVideos =" . $videos_Id  . " ";

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {			
							mysqli_stmt_bind_param($stmt);
							mysqli_stmt_execute($stmt);
							header("Location: /blog-app/videos-post.php?videoslId=" . $videos_Id . "&delete=succes");
							exit();
												
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$delete = $_GET['yes-delete'];
			header("Location: /blog-app/videos-post.php?videos_Id=" . $delete_Id . "&delete=stopped");
			exit();
	}