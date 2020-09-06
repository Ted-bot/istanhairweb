<?php
// Update menu when 'edit-menu' submitted
if (isset($_POST['edit-menu'])) {
		include_once "dbh.incl.php";		
		$sql = "SELECT idPage FROM pages";
		$stmt = mysqli_stmt_init($conn);
	
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo"SQL statement gefaald 1!";
		}
		// put all column menuPage on 0, 0 = no preview
		$updateAllToZero = "UPDATE pages SET menuPage = 0";

		if (!mysqli_stmt_prepare($stmt, $updateAllToZero)) {
					echo"SQL statement gefaald 2!";
					} else {
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$sql = "UPDATE pages SET menuPage = ? WHERE idPage = ?";
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL statement gefaald 3!";
					} else {
							// get all posted checkboxes and create a $key for every lose element/row
							 foreach ($_POST as $key => $value) {
								 // get string '$key' and get substring 'title-value' inside the string with value 0
								 if(strpos($key, "title-value") === 0) {
									 // get string $key and replace 'title-value-' with empty string and leave id-page nmber, see menu-adjust.php
									 $menuPage = str_replace("title-value-", "", $key);
									 //put #1 in $value, this will make the element visible on homepage
									 $value = 1;
//									 echo 'menu page: ' . $menuPage;
//									 echo 'value: ' . $value;
//									 echo '<br>';
									 mysqli_stmt_bind_param($stmt, "is", $value, $menuPage);
									 mysqli_stmt_execute($stmt);
								 }
							}
			
						echo 'menu update succes';

					} 
				}
	}
