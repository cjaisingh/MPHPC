<?php
// We should also compile *.js into *.compiled.js using http://dl.google.com/closure-compiler/compiler-latest.zip

// Loop through the scss files, and compile them
if ($handle = opendir('../public/resources/.scss')) {
    while (false !== ($entry = readdir($handle))) {
        if(!in_array($entry,array('..','.'))){
			// Get the current path of the sass
			$sourcePath = realpath('../public/resources/.scss/'.$entry);
			// Get the destination path of the css
			$destinationPath =  str_replace('.scss','.scss.css', str_replace('/resources/.scss/','/resources/css/',$sourcePath));
			$command = 'scss -f '.$sourcePath.' '.$destinationPath;
			$result = system($command);
			echo $command.PHP_EOL;
			echo $result.PHP_EOL;
		}
    }
	
    closedir($handle);
}