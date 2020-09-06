<?php

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