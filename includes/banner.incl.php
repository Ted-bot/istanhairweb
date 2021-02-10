<?php

if (isset($_POST['banner-upload'])) {
	$newFileName = $_POST['banner-title'];
	
	if (empty($newFileName)) {
		$newFileName = "banner";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['banner-title'];
	$imgDescr = $_POST['banner-desc'];
	
	$bannerImg = $_FILES['banner-file'];
	
	$fileName = $bannerImg['name'];
	$fileType = $bannerImg['type'];
	$fileTempName = $bannerImg['tmp_name'];
	$fileError = $bannerImg['error'];
	$fileSize = $bannerImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ( $fileSize < 2000000 ){
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../img/banner/" . $imageFullName;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitle) || empty($imgDescr)) {
					header("Location: ../banner-post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM banner";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
//						$rowCount = mysqli_num_rows($result);
//						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO banner (titleBanner, descBanner, imageBanner) VALUES (?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							// bind 3 strings to statement
							mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName, $fileDestination);
							
							header("Location: ../banner-post.php?upload=succes");
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
	
	print_r($bannerImg);
	
}

// foreach($_POST['name'] as $name)
if (isset($_POST["edit-banner"])) {
	// $number = $_POST["id"];    

	// foreach($_POST["id"] AS $num) {	
	$newFileName = $_POST['banner-title-edit'];
	
	if (empty($newFileName)) {
		$newFileName = "banner-gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['Banner-title-edit'];
	$imgDescr = $_POST['casousel-text-edit'];
	
	$bannerImg = $_FILES['edit-Banner-img'];
	
	$fileName = $bannerImg['name'];
	$fileType = $bannerImg['type'];
	$fileTempName = $bannerImg['tmp_name'];
	$fileError = $bannerImg['error'];
	$fileSize = $bannerImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (empty($fileName)) {
		include_once "dbh.incl.php";
		$sql = "SELECT titlebanner, descbanner FROM banners;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				printf("SQL statement gefaald 1!");
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$sql = "UPDATE banner SET titleBanner =?, descBanner =? WHERE idBanner =?";
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					print("SQL statement gefaald 2!");
				} else {
					mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $Banner_id);
					mysqli_stmt_execute($stmt);
					header("Location: ../blog-app/banner-post.php?uploadtextonly=succes");
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
									header("Location: /blog-app/banner-edit.php?uploadTitle&Description=empty");
									exit();
								} else {
									$sql = "SELECT titlebanner, descbanner, imgbanner FROM banners;";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo"SQL statement gefaald 1!";
									} else {
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$rowCount = mysqli_num_rows($result);
										$setImageOrder = $rowCount + 1;
										$sql = "UPDATE banners SET titlebanner ='" . $imgTitle . "', descbanner ='" . $imgDescr . "', imgbanner ='" . $imageFullName . "' WHERE idbanner ='" . $Banner_id . "' ";
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo "SQL statement gefaald 2!";
										} else {
											mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
											mysqli_stmt_execute($stmt);
											if (file_exists($fileTempName)) {
												if (move_uploaded_file($fileTempName, $fileDestination)){
													// header("Location: /blog-app/posts-manage.php?bannerId=" . $Banner_id . "&upload=succes");
													exit();
												} else {
													// header("Location: /blog-app/banner-edit.php?bannerId=" . $Banner_id . "&uploadImage=failed");
													exit();
												}
											} else {
												// header("Location: /blog-app/banner-edit.php?bannerId=" . $Banner_id . "&uploadImage=fileDoesntExist");
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
		$banner_Id = $_GET['delete-Banner'];
		include_once "dbh.incl.php";		
		$sql = "SELECT mediaBanner FROM banner WHERE idBanner = '" . $_GET["delete-Banner"]  . "' LIMIT 1";
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
						$row = $myArray['mediaBanner'];
						//file includes absolute file
						include_once('img/banner/banner.directory.php');

						// $img_map; from directory

						$target_path = $img_map . $row;
						echo 'naar ' . $target_path;
					
						// delete file from directory
						unlink($target_path);
					}
					// delete image from data base

					$sql = "DELETE FROM banner WHERE idBanner =" . $banner_Id  . " ";

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {			
							mysqli_stmt_bind_param($stmt);
							mysqli_stmt_execute($stmt);
							header("Location: /blog-app/banner-post.php?bannerlId=" . $banner_Id . "&delete=succes");
							exit();
												
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$delete = $_GET['yes-delete'];
			header("Location: /blog-app/banner-post.php?banner_Id=" . $delete_Id . "&delete=stopped");
			exit();
	}