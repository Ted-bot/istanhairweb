<?php

require "dbh.incl.php";

if (isset($_POST['file-upload'])) {
	$newFileName = $_POST['file-name'];
	
	if (empty($newFileName)) {
		$newFileName = "gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['file-title'];
	$imgDescr = $_POST['file-descr'];
	
	$fileImg = $_FILES['file-img'];
	
	$fileName = $fileImg['name'];
	$fileType = $fileImg['type'];
	$fileTempName = $fileImg['tmp_name'];
	$fileError = $fileImg['error'];
	$fileSize = $fileImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ( $fileSize < 2000000 ){
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../img/gallery/" . $imageFullName;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitle) || empty($imgDescr)) {
					header("Location: ../gallery.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM gallery;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							mysqli_stmt_bind_param($stmt, "ssss", $imgTitle, $imgDescr, $imageFullName, $setImageOrder);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName, $fileDestination);
							
							header("Location: ../gallery.php?upload=succes");
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
	
	print_r($fileImg);
	
}

// Upload logo 
if (isset($_POST['logo-upload'])) {
		// get uploaded file
		$fileImg = $_FILES['file-img'];

		$fileName = $fileImg['name'];
		$fileType = $fileImg['type'];
		$fileTempName = $fileImg['tmp_name'];
		$fileError = $fileImg['error'];
		$fileSize = $fileImg['size'];
		// split string in array of strings
		$fileExtension = explode(".", $fileName);
		//get first element of array
		$fileActualName = array_shift($fileExtension);
//		print_r($fileActualName);
//		echo '<br>';
		
		$fileActualExt = strtolower(end($fileExtension));

		$allowed = array("jpg", "jpeg", "png");

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ( $fileSize < 2000000 ){
					$imageFullName = $fileActualName . "." . uniqid("", true) . "." . $fileActualExt;
					$fileDestination = "../img/gallery/" . $imageFullName;

					include_once "dbh.incl.php";
					$sql = "SELECT * FROM menuLogo;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

//							$sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
						$sql = "UPDATE menuLogo SET menuImage = ? WHERE menuId = 1 ;";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							echo 'name file' . $fileActualName;
							mysqli_stmt_bind_param($stmt, "s", $imageFullName);
							mysqli_stmt_execute($stmt);

							move_uploaded_file($fileTempName, $fileDestination);

							header("Location: ../menu-adjust.php?upload=succes");
							exit();
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

		print_r($fileImg);

	}

// load article without image
if (isset($_POST['upload-article'])) {
	$articleTitle = mysqli_real_escape_string($conn, $_POST['article-title']);
	$articleText = mysqli_real_escape_string($conn, $_POST['article-text']);
//	$datetime = $_POST['date'] . ' ' . $_POST['time'];
	
//	$datetime = mysql_real_escape_string($datetime);
//	$datetime = strtotime($datetime);
//	$datetime = date('Y-m-d H:i:s',$datetime);
	$articleDate = mysqli_real_escape_string($conn, $_POST['article-date']);
	
	$articleCategory = mysqli_real_escape_string($conn, $_POST['article-category']);
	$articleView = mysqli_real_escape_string($conn, $_POST['article-view']);
	
	$articleTitle = mysqli_real_escape_string($conn, $_POST['article-title']);
	
	$articleInput = array($articleTitle, $articleText, $articleDate, $articleCategory);
	print_r($articleInput);				
				if (empty($articleTitle) || empty($articleText)) {
					header("Location: ../blog-app/post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT artikelTitel, artikelTekst FROM artikelen;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO artikelen (artikelTitel, artikelTekst) VALUES (?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							mysqli_stmt_bind_param($stmt, "ss", $articleTitle , $articleText);
							mysqli_stmt_execute($stmt);
							
							header("Location: ../blog-app/post.php?upload=succes");
							exit();
						}
					}
				}
}

if (isset($_POST['edit-article'])) {
	//Get posted Variables user entered
	$artikelId = $_GET['artikelId'];
	
	$newFileName = $_POST['article-title-edit'];
	
	if (empty($newFileName)) {
		$newFileName = "gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['article-title-edit'];
	$imgDescr = $_POST['article-text-edit'];
	
	$fileImg = $_FILES['edit-file-img'];
	
	$fileName = $fileImg['name'];
	$fileType = $fileImg['type'];
	$fileTempName = $fileImg['tmp_name'];
	$fileError = $fileImg['error'];
	$fileSize = $fileImg['size'];
	
	$fileExtension = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExtension));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (empty($fileName)) {
//		echo("Er is geen bestand geselecteerd.");
		include_once "dbh.incl.php";
		$sql = "SELECT titleGallery, descGallery FROM gallery;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo"SQL statement gefaald 1!";
			} else {
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$sql = "UPDATE gallery SET titleGallery =?, descGallery =? WHERE idGallery =?";
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "SQL statement gefaald 2!";
			} else {
					mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $artikelId);
					mysqli_stmt_execute($stmt);					
					header("Location: /blog-app/posts-manage.php?artikelId=" . $artikelId . "&uploadtextonly=succes");
					exit();
					} 
				}
					} else if (in_array($fileActualExt, $allowed)) {
						if ($fileError === 0) {

							if ( $fileSize < 2000000 ){

								$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
								$fileDestination = dirname(__DIR__) . "/img/gallery/" . $imageFullName;

								include_once "dbh.incl.php";

								if (empty($imgTitle) || empty($imgDescr)) {
									header("Location: /blog-app/edit.php?uploadTitle&Description=empty");
									exit();
								} else {
									$sql = "SELECT titleGallery, descGallery, imgFullNameGallery FROM gallery;";
									$stmt = mysqli_stmt_init($conn);
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo"SQL statement gefaald 1!";
									} else {
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$rowCount = mysqli_num_rows($result);
										$setImageOrder = $rowCount + 1;
										$sql = "UPDATE gallery SET titleGallery =?, descGallery =?, imgFullNameGallery=? WHERE idGallery =?";
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo "SQL statement gefaald 2!";
										} else {
											mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
											mysqli_stmt_execute($stmt);
											if (file_exists($fileTempName)) {
												if (move_uploaded_file($fileTempName, $fileDestination)){
													header("Location: /blog-app/posts-manage.php?artikelId=" . $artikelId . "&upload=succes");
													exit();
												} else {
													header("Location: /blog-app/edit.php?artikelId=" . $artikelId . "&uploadImage=failed");
													exit();
												}
											} else {
												header("Location: /blog-app/edit.php?artikelId=" . $artikelId . "&uploadImage=fileDoesntExist");
												exit();
											}
						}
					}
				}
			}
		}
	}
}

// Delete article
if (isset($_POST['yes-delete'])) {
		$artikel_Id = $_GET['artikelId'];
		include_once "dbh.incl.php";		
		$sql = "SELECT idGallery FROM gallery";
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
					$sql = "DELETE FROM gallery WHERE idGallery ='" . $artikel_Id  . "'";
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {			
							mysqli_stmt_bind_param($stmt);
							mysqli_stmt_execute($stmt);
							header("Location: /blog-app/posts-manage.php?artikelId=" . $artikel_Id . "&delete=succes");
							exit();					
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$artikel_Id = $_GET['artikelId'];
			header("Location: /blog-app/posts-manage.php?artikelId=" . $artikel_Id . "&delete=succes");
			exit();
	}
