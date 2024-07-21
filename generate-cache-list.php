<?php

$directory = 'public/img';
$files = array();

$dirIterator = new RecursiveDirectoryIterator($directory);
$iterator = new RecursiveIteratorIterator($dirIterator);

foreach ($iterator as $file) {
    if ($file->isDir()) {
        continue;
    }
    $filePath = str_replace('public', '', $file->getPathname());
    $files[] = $filePath;
}

file_put_contents('public/js/cache-list.json', json_encode($files, JSON_PRETTY_PRINT));

echo "Cache list generated.\n";