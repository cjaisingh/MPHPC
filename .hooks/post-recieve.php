<?php
// You need the sass compiler and closure compiler for this to work

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

// Loop through the js files, and compile them
if ($handle = opendir('../public/resources/.js')) {
    while (false !== ($entry = readdir($handle))) {
        if(!in_array($entry,array('..','.'))){
			// Get the current path of the sass
			$sourcePath = realpath('../public/resources/.js/'.$entry);
			// Get the destination path of the css
			$destinationPath =  str_replace('.js','.compiled.js', str_replace('/resources/.js/','/resources/js/',$sourcePath));
			$command = 'java -jar /bin/closure-compiler.jar --js '.$sourcePath.' --js_output_file '.$destinationPath;
			$result = system($command);
			echo $command.PHP_EOL;
			echo $result.PHP_EOL;
		}
    }
	
    closedir($handle);
}