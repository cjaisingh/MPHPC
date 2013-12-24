<?php
if(isset($viewSettings['pageName'])){
	$pageName = $viewSettings['pageName'];
} else {
	$pageName = SITE_NAME;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $pageName; ?></title>
</head>
<body>