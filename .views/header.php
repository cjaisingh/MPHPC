<?php
if(isset($viewSettings['pageName'])){
	$pageName = SITE_NAME . ' - ' .$viewSettings['pageName'];
} else {
	$pageName = SITE_NAME;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $pageName; ?></title>
<link rel="shortcut icon" href="<?php echo PROTOCOL.'://'.SITE_DOMAIN; ?>/favicon.ico" type="image/icon">
<link rel="icon" href="<?php echo PROTOCOL.'://'.SITE_DOMAIN; ?>/favicon.ico" type="image/icon">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, target-densitydpi=device-dpi">
<?php
// If this page uses css
if(isset($viewSettings['css'])){
	// Link the resoucres
	foreach($viewSettings['css'] as $row => $value){
		echo '<link rel="stylesheet" type="text/css" href="'.PROTOCOL.'://'.SITE_DOMAIN.'/resources/css/'.$row.'.scss.css">'.PHP_EOL;
	}
}
// If this page uses js
if(isset($viewSettings['js'])){
	// Link the resoucres
	foreach($viewSettings['js'] as $row => $value){
		echo '<script src="'.PROTOCOL.'://'.SITE_DOMAIN.'/resources/js/'.$row.'.compiled.js"></script>'.PHP_EOL;
	}
}
?>
<meta property="og:title" content="<?php echo $pageName; ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo PROTOCOL.'://'.SITE_DOMAIN; ?>">
<meta property="og:image" content="<?php echo PROTOCOL.'://'.SITE_DOMAIN; ?>/favicon.png">
<!--[if lt IE 9]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>