<?php

if (isset($_POST['home-page-upload'])) {
	$newFileName = $_POST['home-page-title'];
	
	if (empty($newFileName)) {
		$newFileName = "carousel";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['home-page-title'];
	$imgDescr = $_POST['home-page-desc'];
	
	$pageImg = $_FILES['home-page-file'];
	
	$fileName = $pageImg['name'];
	$fileType = $pageImg['type'];
	$fileTempName = $pageImg['tmp_name'];
	$fileError = $pageImg['error'];
	$fileSize = $pageImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ( $fileSize < 2000000 ){
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../img/carousel/" . $imageFullName;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitle) || empty($imgDescr)) {
					header("Location: ../home-page-post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM homecarousel;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
//						$rowCount = mysqli_num_rows($result);
//						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO homecarousel (titleCarousel, descCarousel, mediaCarousel) VALUES (?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							// bind 3 strings to statement
							mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName, $fileDestination);
							
							header("Location: ../home-page-post.php?upload=succes");
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
	
	print_r($pageImg);
	
}

// foreach($_POST['name'] as $name)
if (isset($_POST["edit-home-page"])) {
	// $number = $_POST["id"];    

	// foreach($_POST["id"] AS $num) {	
	$newFileName = $_POST['page-title-edit'];
	
	if (empty($newFileName)) {
		$newFileName = "page-gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['carousel-title-edit'];
	$imgDescr = $_POST['casousel-text-edit'];
	
	$pageImg = $_FILES['edit-carousel-img'];
	
	$fileName = $pageImg['name'];
	$fileType = $pageImg['type'];
	$fileTempName = $pageImg['tmp_name'];
	$fileError = $pageImg['error'];
	$fileSize = $pageImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (empty($fileName)) {
		include_once "dbh.incl.php";
		$sql = "SELECT titlePage, descPage FROM pages;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				printf("SQL statement gefaald 1!");
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$sql = "UPDATE homecarousel SET titleCarousel =?, descCarousel =? WHERE idCarousel =?";
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					print("SQL statement gefaald 2!");
				} else {
					mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $carousel_id);
					mysqli_stmt_execute($stmt);
					header("Location: ../blog-app/home-page-post.php?uploadtextonly=succes");
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
									header("Location: /blog-app/page-edit.php?uploadTitle&Description=empty");
									exit();
								} else {
									$sql = "SELECT titlePage, descPage, imgPage FROM pages;";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo"SQL statement gefaald 1!";
									} else {
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$rowCount = mysqli_num_rows($result);
										$setImageOrder = $rowCount + 1;
										$sql = "UPDATE pages SET titlePage ='" . $imgTitle . "', descPage ='" . $imgDescr . "', imgPage ='" . $imageFullName . "' WHERE idPage ='" . $carousel_id . "' ";
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo "SQL statement gefaald 2!";
										} else {
											mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
											mysqli_stmt_execute($stmt);
											if (file_exists($fileTempName)) {
												if (move_uploaded_file($fileTempName, $fileDestination)){
													// header("Location: /blog-app/posts-manage.php?pageId=" . $carousel_id . "&upload=succes");
													exit();
												} else {
													// header("Location: /blog-app/page-edit.php?pageId=" . $carousel_id . "&uploadImage=failed");
													exit();
												}
											} else {
												// header("Location: /blog-app/page-edit.php?pageId=" . $carousel_id . "&uploadImage=fileDoesntExist");
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
		$banner_Id = $_GET['delete-carousel'];
		include_once "dbh.incl.php";		
		$sql = "SELECT mediaCarousel FROM homecarousel WHERE idCarousel = '" . $_GET["delete-carousel"]  . "' LIMIT 1";
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
						$row = $myArray['mediaCarousel'];
						//file includes absolute file
						include_once('img/carousel/carousel.directory.php');

						// $img_map; from directory

						$target_path = $img_map . $row;
						echo 'naar ' . $target_path;
					
						// delete file from directory
						unlink($target_path);
					}
					// delete image from data base

					$sql = "DELETE FROM homecarousel WHERE idCarousel =" . $banner_Id  . " ";

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {			
							mysqli_stmt_bind_param($stmt);
							mysqli_stmt_execute($stmt);
							header("Location: /blog-app/home-page-post.php?bannerlId=" . $banner_Id . "&delete=succes");
							exit();
												
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$delete = $_GET['yes-delete'];
			header("Location: /blog-app/home-page-post.php?page_Id=" . $delete_Id . "&delete=stopped");
			exit();
	}