<?php

$zip = new ZipArchive;

// Zip File Name
if ($zip->open('Success.zip') === TRUE) {

	// Unzip Path
	$zip->extractTo('/www/northeastdoulas_716/public');
	$zip->close();
	echo 'Unzipped Process Successful!';
} else {
	echo 'Unzipped Process failed';
}
?>
