
REad File

$handle = fopen("inputfile.txt", "r") or die("Unable to open file!");;
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $line = str_replace("\n", "", $line);
	$line_array = explode("*",$line);
    }

    fclose($handle);
} else {
    // error opening the file.
} 



Append String to file

<?php
$file = 'people.txt';
$current = file_get_contents($file);
$current .= "John Smith\n";
file_put_contents($file, $current);
?>