<?php
require_once('setting.php');

function eraseFile($file) {
    $fh = fopen($file, 'w' );
    file_put_contents($file, "");
    fclose($fh);
}

function delete($file, $index) {
    if (($handle = fopen($file, "r")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    } else {
        if (($handle1 = fopen('temp.csv.php', 'w+')) === FALSE) {
            echo "Cannot open file ($handle1)";
            return;
        } else {
            $count =  1;
            while (!feof($handle)) {
                $line = fgets($handle);
                if ($count != $index) fputs($handle1, $line);
                $count++;
            }
        }
    }
    fclose($handle);
    fclose($handle1);
    rename('temp.csv.php', $file);
}

function write($file1, $file2) {
    $read = fopen($file1, "r" ) or die("Unable to open file!");
    $write = fopen($file2, "w");
    while (!feof($read)) {
        $line = fgets($read);
        echo $line;
        fputs($write, $line);
    }
    fclose($write);
    fclose($read);
}
//eraseFile('data.csv');
//delete('users.csv.php', 5);
write(__ROOT__.'/test.csv.php', __ROOT__.'/users.csv.php');