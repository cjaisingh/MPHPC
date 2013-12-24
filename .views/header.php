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
<?php
// If this page uses css
if(isset($viewSettings['css'])){
	// Link the resoucres
	foreach($viewSettings['css'] as $row => $value){
		echo '<link rel="stylesheet" type="text/css" href="'.PROTOCOL.'://'.SITE_DOMAIN.'/resources/css/'.$row.'.sass.css">';
	}
}
// If this page uses js
if(isset($viewSettings['js'])){
	// Link the resoucres
	foreach($viewSettings['js'] as $row => $value){
		echo '<script src="'.PROTOCOL.'://'.SITE_DOMAIN.'/resources/js/'.$row.'.compiled.js"></script>';
	}
}
?>
</head>
<body>