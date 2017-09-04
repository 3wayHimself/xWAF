<?php
require('xwaf.php'); // BEFORE OF ALL! IMPORTANT

$xWAF = new xWAF();
$xWAF->start();

?>
<title>xWAF Test</title>

<center>
	<br><br><br><br><br><br>

	<?php
	if (isset($_POST['csrf'])) {
		// Aright! Form Requested.
		if ($xWAF->verifyCSRF($_POST['csrf'])) {
			echo "Form Validation Completed without Errors or Vulns!";
		} else {
			echo "Invalid CSRF Token!";
		}
	}
	?>

	<br><br><br><br><br><br>
	<form method="POST">
		Sample Input: <input type="text" name="someinputname" value="Vuln me">
		<br>
		CSRF: <input type="text" name="csrf" value="<?php echo $xWAF->getCSRF(); ?>">
		<br>
		<button type="submit">Submit Form POST</button>
	</form>
</center>