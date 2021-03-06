<?php

if (isset($_POST['compare-upload'])) {
	$newFileNameOne = $_POST['compare-name-1'];
    $newFileNameTwo = $_POST['compare-name-2'];
	
	if (empty($newFileName)) {
		$newFileName = "compare";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitleOne = $_POST['compare-title-1'];
	$imgTitleTwo = $_POST['compare-title-2'];

	// $imgDescr = $_POST['page-descr'];
	
	$compareImgOne = $_FILES['compare-img-1'];
	$compareImgTwo = $_FILES['compare-img-2'];
	
	$fileNameOne = $compareImgOne['name'];
	$fileTypeOne = $compareImgOne['type'];
	$fileTempNameOne = $compareImgOne['tmp_name'];
	$fileErrorOne = $compareImgOne['error'];
	$fileSizeOne = $compareImgOne['size'];

	$fileNameTwo = $compareImgTwo['name'];
	$fileTypeTwo = $compareImgTwo['type'];
	$fileTempNameTwo = $compareImgTwo['tmp_name'];
	$fileErrorTwo = $compareImgTwo['error'];
	$fileSizeTwo = $compareImgTwo['size'];
	
	$fileExtensionOne = explode(".", $fileNameOne);
	$fileActualExtOne = strtolower(end($fileExtensionOne));

	$fileExtensionTwo = explode(".", $fileNameTwo);
	$fileActualExtTwo = strtolower(end($fileExtensionTwo));
	
	$allowed = array("jpg", "jpeg", "png");
	
	if (in_array($fileActualExtOne, $allowed ) && in_array($fileActualExtTwo, $allowed)) {
		if ($fileErrorOne === 0 && $fileErrorTwo === 0) {
			if ( $fileSizeOne < 3000000 && $fileSizeTwo < 3000000 ){

				$imageFullNameOne = $newFileNameOne . "." . uniqid("", true) . "." . $fileActualExtOne;
				$fileDestinationOne = "../img/compare/" . $imageFullNameOne;

				$imageFullNameTwo = $newFileNameTwo . "." . uniqid("", true) . "." . $fileActualExtTwo;
				$fileDestinationTwo = "../img/compare/" . $imageFullNameTwo;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitleOne) || empty($imgTitleTwo)) {
					header("Location: ../compare-post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM compare;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
//						$rowCount = mysqli_num_rows($result);
//						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO compare (titleCompareOne, titleCompareTwo, imgOne, imgTwo) VALUES (?, ?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							// bind 3 strings to statement
							mysqli_stmt_bind_param($stmt, "ssss", $imgTitleOne, $imgTitleTwo, $imageFullNameOne, $imageFullNameTwo);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempNameOne, $fileDestinationOne);
							move_uploaded_file($fileTempNameTwo, $fileDestinationTwo);
							
							header("Location: ../compare-post.php?upload=succes");
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
	
	print_r($compareImgOne);
	print_r($compareImgTwo);
	
}

if (isset($_POST['edit-page'])) {
	//Get posted Variables user entered
	$page_Id = $_GET['pageId'];
	
	$newFileName = $_POST['page-title-edit'];
	
	if (empty($newFileName)) {
		$newFileName = "page-gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['page-title-edit'];
	$imgDescr = $_POST['page-text-edit'];
	
	$pageImg = $_FILES['edit-page-img'];
	
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
				$sql = "UPDATE pages SET titlePage =?, descPage =? WHERE idPage =?";
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					print("SQL statement gefaald 2!");
				} else {
					mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $page_Id);
					mysqli_stmt_execute($stmt);
					header("Location: ../blog-app/page-manage.php?pageId=". $page_Id ."&uploadtextonly=succes");
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
								$fileDestination = dirname(__DIR__) . "/img/gallery/" . $imageFullName;

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
										$sql = "UPDATE pages SET titlePage ='" . $imgTitle . "', descPage ='" . $imgDescr . "', imgPage ='" . $imageFullName . "' WHERE idPage ='" . $page_Id . "' ";
									if (!mysqli_stmt_prepare($stmt, $sql)) {
										echo "SQL statement gefaald 2!";
										} else {
											mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
											mysqli_stmt_execute($stmt);
											if (file_exists($fileTempName)) {
												if (move_uploaded_file($fileTempName, $fileDestination)){
													header("Location: /blog-app/posts-manage.php?pageId=" . $page_Id . "&upload=succes");
													exit();
												} else {
													header("Location: /blog-app/page-edit.php?pageId=" . $page_Id . "&uploadImage=failed");
													exit();
												}
											} else {
												header("Location: /blog-app/page-edit.php?pageId=" . $page_Id . "&uploadImage=fileDoesntExist");
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
		$page_Id = $_GET['pageId'];
		include_once "dbh.incl.php";		
		$sql = "SELECT idPage FROM pages";
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
					$sql = "DELETE FROM pages WHERE idPage ='" . $page_Id  . "'";
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {			
							mysqli_stmt_bind_param($stmt);
							mysqli_stmt_execute($stmt);
							header("Location: /blog-app/page-manage.php?artikelId=" . $page_Id . "&delete=succes");
							exit();
												
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$page_Id = $_GET['pageId'];
			header("Location: /blog-app/page-manage.php?page_Id=" . $page_Id . "&delete=succes");
			exit();
	}