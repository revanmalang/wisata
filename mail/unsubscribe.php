<?php 

	if(isset($_GET["konfirm"])) {
		if($_GET["konfirm"] == "unsubs") {
			require "unsubs/konfirm.php";
		}
	}

?>