<?php

// simple script to resave all file entities

$query = db_query('select count(*) from {file_managed}');
$result = $query->fetchField();

print ('There are ' . $result . ' total files...');

for ($i = 1; $i<$result; ++$i) {
  print ($i . "...\n");
  try {
    if ($f = file_load($i)) {
      if ($f->type == 'image' || $f->type == 'audio') {
        file_save($f);
      }
    }
  } catch (Exception $e) {
    print('Exception with file #' . $i . "\n" . $e->getMessage() . "\n");
  }
}

