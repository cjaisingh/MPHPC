<footer>
<?php
	if(ENVIRONMENT == 'DEV'){
		$endTime = microtime();
		$endTime  = explode(' ', $endTime);
		$endTime  = $endTime[1] + $endTime[0];
		$total_time = round(($endTime - $GLOBALS['SITE']->getStartTime()), 4);
		echo '<p>Page generated in '.$total_time.' seconds.</p>';	
	}
?>
</footer>
</body>
</html>