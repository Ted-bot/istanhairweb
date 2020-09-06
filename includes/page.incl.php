<?php

if (isset($_POST['page-upload'])) {
	$newFileName = $_POST['page-title'];
	
	if (empty($newFileName)) {
		$newFileName = "gallery";
	} else {
		//create lowercase of filename and replace empty space with -
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imgTitle = $_POST['page-title'];
	$imgDescr = $_POST['page-descr'];
	
	$pageImg = $_FILES['page-img'];
	
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
				$fileDestination = "../img/gallery/" . $imageFullName;
				
				include_once "dbh.incl.php";
				
				if (empty($imgTitle) || empty($imgDescr)) {
					header("Location: ../page-post.php?upload=empty");
					exit();
				} else {
					$sql = "SELECT * FROM pages;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo"SQL statement gefaald 1!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
//						$rowCount = mysqli_num_rows($result);
//						$setImageOrder = $rowCount + 1;
						
						$sql = "INSERT INTO pages (titlePage, descPage, imgPage) VALUES (?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 2!";
						}
						else {
							// bind 3 strings to statement
							mysqli_stmt_bind_param($stmt, "sss", $imgTitle, $imgDescr, $imageFullName);
							mysqli_stmt_execute($stmt);
							
							move_uploaded_file($fileTempName, $fileDestination);
							
							header("Location: ../page-manage.php?upload=succes");
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
					header("Location: ../new/page-manage.php?pageId=". $page_Id ."&uploadtextonly=succes");
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
									header("Location: /new/page-edit.php?uploadTitle&Description=empty");
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
													header("Location: /new/posts-manage.php?pageId=" . $page_Id . "&upload=succes");
													exit();
												} else {
													header("Location: /new/page-edit.php?pageId=" . $page_Id . "&uploadImage=failed");
													exit();
												}
											} else {
												header("Location: /new/page-edit.php?pageId=" . $page_Id . "&uploadImage=fileDoesntExist");
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
							header("Location: /new/page-manage.php?artikelId=" . $page_Id . "&delete=succes");
							exit();
												
						} 
					}
	}


if (isset($_POST['no-delete'])) {
		$page_Id = $_GET['pageId'];
			header("Location: /new/page-manage.php?page_Id=" . $page_Id . "&delete=succes");
			exit();
	}