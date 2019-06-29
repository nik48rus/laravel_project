<?php 
if (isset($_GET['activ'])) {
	$code1 = $_GET['code_isp'];
	$code2 = $_GET['code_zak'];
	echo $code1 . '<br>';
	echo $code2;
	echo "$('#step1').remove()";
}
?>