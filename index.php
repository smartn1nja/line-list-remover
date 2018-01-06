<?php
$removeList = array();

if(sizeof($argv) < 3) {
	echo "Usage: php " . $argv[0] . " <removeList> <masterFile>" . PHP_EOL;
	return;
}

if ($file = fopen($argv[1], "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		if(empty($line))
			continue;
			
        $removeList[rtrim($line)] = true;
    }
    fclose($file);
}

if ($file = fopen($argv[2], "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		if(empty($line))
			continue;
			
        if(!isset($removeList[rtrim($line)]))
            echo $line;
    }
    fclose($file);
}

?>