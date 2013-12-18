<?php
require ("show_info.php");
?>
<h1>Past shows by DJ JAW</h1><br><br>
<?php
	if (empty($_GET["file"])){
		require("browser.php");
	} else {
		require("viewer/viewer.php");
	}
?>