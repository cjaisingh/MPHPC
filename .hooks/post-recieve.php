<?php
require_once('../.core/core.php');
// @todo: Need compilation to use a temp working directoy
// @todo: Need to generate source maps where possible

// Directory Iterator
function fillArrayWithFileNodes(DirectoryIterator $dir) {
    // Directory array
    $data = array();
    // Loop through each directory as a node
    foreach ($dir as $node) {
        // If we are dealing with a directory and not a dot / dotdot
        if ($node->isDir() && !$node->isDot()) {
            // Recursively store each file
            $data[$node->getFilename()] = fillArrayWithFileNodes(new DirectoryIterator($node->getPathname()));
        }
        // If we are dealing with a file
        else if ($node->isFile()) {
            // Store the file in the array
            $data[] = $node->getFilename();
        }
    }
    return $data;
}

// Function to help sort array by length
function sortByLength($a, $b) {
    return strlen($a) - strlen($b);
}

// This will process all files according to type
function processTypes($type, $path) {
    // Output what type is processing
    echo 'Processing ' . strtoupper($type) . PHP_EOL;
    
    // Process files according to type
    switch ($type) {
        case 'js';
			if (!is_dir($path . '/.js/')) {
                // Create the directoy if it doesn't exist
            	mkdir($path . '/.js/', 0777, true);
            }
            // Get all the files we need to process
            $result = processFiles(fillArrayWithFileNodes(new DirectoryIterator($path . '/.js/')));
            
            // Sort those files by length (!IMPORTANT if not sorted by length, you do not create directories before you process the file)
            usort($result, 'sortByLength');
            
            // Loop through each file
            foreach ($result as $row => $value) {
                
                // Define where the new compiled file is going
				$oldPath = $path . '/.js/' . $value;
                $newPath = $path . '/js/' . str_replace('.js', '.closure.js', $value);
				
                // Check that the directoy exists
                $directoy = dirname($newPath) . '/';
                
                if (!is_dir($directoy)) {
                    // Create the directoy if it doesn't exist
                    mkdir($directoy, 0777, true);
                }
                
                // Output that we are processing that file
                echo '	Processing File: ' . $oldPath . ' -> ' . $newPath . PHP_EOL;
                
                // Process the file
                $output = processFile('java -jar /bin/closure-compiler.jar --compilation_level SIMPLE_OPTIMIZATIONS --js ' . $oldPath . ' --js_output_file ' . $newPath );
                
                // If the output has generated an error, stop
                if ($output === false) {
                    return false;
                }
            }
            break;
        case 'sass':
			if (!is_dir($path . '/.scss/')) {
                // Create the directoy if it doesn't exist
            	mkdir($path . '/.scss/', 0777, true);
            }
			// Get all the files we need to process
            $result = processFiles(fillArrayWithFileNodes(new DirectoryIterator($path . '/.scss/')));
            
            // Sort those files by length (!IMPORTANT if not sorted by length, you do not create directories before you process the file)
            usort($result, 'sortByLength');
            
            // Loop through each file
            foreach ($result as $row => $value) {
                
                // Define where the new compiled file is going
				$oldPath = $path . '/.scss/' . $value;
                $newPath = $path . '/css/' . str_replace('.scss', '.scss.css', $value);
                
                // Check that the directoy exists
                $directoy = dirname($newPath) . '/';
                
                if (!is_dir($directoy)) {
                    // Create the directoy if it doesn't exist
                    mkdir($directoy, 0777, true);
                }
                
                // Output that we are processing that file
                echo '	Processing File: ' . $oldPath . ' -> ' . $newPath . PHP_EOL;
                
                // Process the file
                $output = processFile('scss -f ' . $oldPath . ' ' . $newPath . '');
                
                // If the output has generated an error, stop
                if ($output === false) {
                    return false;
                }
            }	
            break;
		case 'less':
			if (!is_dir($path . '/.less/')) {
                // Create the directoy if it doesn't exist
            	mkdir($path . '/.less/', 0777, true);
            }
			// Get all the files we need to process
            $result = processFiles(fillArrayWithFileNodes(new DirectoryIterator($path . '/.less/')));
            
            // Sort those files by length (!IMPORTANT if not sorted by length, you do not create directories before you process the file)
            usort($result, 'sortByLength');
            
            // Loop through each file
            foreach ($result as $row => $value) {
                
                // Define where the new compiled file is going
				$oldPath = $path . '/.less/' . $value;
                $newPath = $path . '/css/' . str_replace('.less', '.less.css', $value);
                
                // Check that the directoy exists
                $directoy = dirname($newPath) . '/';
                
                if (!is_dir($directoy)) {
                    // Create the directoy if it doesn't exist
                    mkdir($directoy, 0777, true);
                }
                
                // Output that we are processing that file
                echo '	Processing File: ' . $oldPath . ' -> ' . $newPath . PHP_EOL;
                
                // Process the file
                $output = processFile('lessc ' . $oldPath . ' ' . $newPath . '');
                
                // If the output has generated an error, stop
                if ($output === false) {
                    return false;
                }
            }	
            break;
		case 'dart':
			if (!is_dir($path . '/.dart/')) {
                // Create the directoy if it doesn't exist
            	mkdir($path . '/.dart/', 0777, true);
            }
			// Get all the files we need to process
            $result = processFiles(fillArrayWithFileNodes(new DirectoryIterator($path . '/.dart/')));
            
            // Sort those files by length (!IMPORTANT if not sorted by length, you do not create directories before you process the file)
            usort($result, 'sortByLength');
            
            // Loop through each file
            foreach ($result as $row => $value) {
                
                // Define where the new compiled file is going
				$oldPath = $path . '/.dart/' . $value;
                $newPath = $path . '/js/' . str_replace('.dart', '.dart.js', $value);
                
                // Check that the directoy exists
                $directoy = dirname($newPath) . '/';
                
                if (!is_dir($directoy)) {
                    // Create the directoy if it doesn't exist
                    mkdir($directoy, 0777, true);
                }
                
                // Output that we are processing that file
                echo '	Processing File: ' . $oldPath . ' -> ' . $newPath . PHP_EOL;
				
				// Process the file
                $output = processFile('dart2js ' . $oldPath . ' -o ' . $newPath . '');
                
                
                // If the output has generated an error, stop
                if ($output === false) {
                    return false;
                }
            }	
            break;
        default:
            // @todo: Error output
            break;
    }
    
}

function processFile($command) {
    // Set the default returnCode
    $returnCode = 0;
    // Set the output array
    $output     = array();
    
    // Run the command
    $result = exec($command, &$output, &$returnCode);
    
    // Return if the command failed
    if ($returnCode !== 0) {
        return false;
    }
    
    // Everything ran fine
    return true;
}

function processFiles($files) {
    // Setup the array where we will store the flat paths
    $flatPaths = array();
    
    // Loop through each file
    foreach ($files as $row => $value) {
        
        // If this is a directoy
        if (is_array($value)) {
            
            // Process each file in the array
            $tempArray = processFiles($value);
            
            // Add each file to our output
            foreach ($tempArray as $row2 => $value2) {
                $flatPaths[] = $row . '/' . $value2;
            }
        } else {
            // This is a file, we can just add it to the output
            $flatPaths[] = $value;
        }
    }
    
    // Return our flat paths
    return $flatPaths;
}

// Get Site Settings
$siteSettings = $GLOBALS['SITE']->getSettings();

// Get the resource path
$realDirectoyPath = realpath('../public/resources/');

// Process according to settings
foreach ($siteSettings['compilation'] as $row => $value) {
    // If this option is enabled
    if ($value === true) {
        // Process the type
        if (processTypes($row, $realDirectoyPath) === false) {
            // Tell us if it failed
            echo 'Failed' . PHP_EOL;
            // Stop processing types
            break;
        }
    }
}