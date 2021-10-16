<?php
require_once('setting.php');
$authors = [];

function readCSV($file, $key1, $key2/*$keys*/) {
    if (!file_exists($file)) {
        return [];
    }
    $row = 1;
    $array = [];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if (count($data) < 2) continue;
            $sub_array = array($key1 => $data[0], $key2 => $data[1]);//$sub_array = array_combine($keys, $data);
            $array[$row] = $sub_array;
            $row++;
        }
        fclose($handle);
        return $array;
    }
}

function addLastCSV($file, $key1, $key2) {
    if (($handle = fopen($file, "a+")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    }
    $content = "\n" . $key1 . ";" . $key2;
    if (fwrite($handle, $content) === FALSE) {
        echo "Cannot write to file ($file)";
        return;
    }
    fclose($handle);
}

function modifyLineCSV($file, $index, $data) {
    if (($handle = fopen($file, "r")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    } else {
        if (($handle1 = fopen(__ROOT__.'/temp.csv.php', 'w+')) === FALSE) {
            echo "Cannot open file ($handle1)";
            return;
        } else {
            $count =  1;
            while (!feof($handle)) {
                $line = fgets($handle);
                if ($count != $index) fputs($handle1, $line);
                else fputs($handle1, $data);
                $count++;
            }
        }
        fclose($handle1);
    }
    fclose($handle);
    rename(__ROOT__.'/temp.csv.php', $file);
}

function deleteLineCSV($file, $index) {
    if (($handle = fopen($file, "r")) === FALSE) {
        echo "Cannot open file ($file)";
        return;
    } else {
        if (($handle1 = fopen(__ROOT__.'/temp.csv.php', 'w+')) === FALSE) {
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
    rename(__ROOT__.'/temp.csv.php', $file);
}

$authors = readCSV(__ROOT__.'/authors.csv.php', "first_name", "last_name");
$quotes = readCSV(__ROOT__.'/quotes.csv.php', "quote", "author_id");
$users = readCSV(__ROOT__.'/users.csv.php', "name", "username");
