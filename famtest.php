<?php

if (!extension_loaded('fam')) {
  dl('fam.' . PHP_SHLIB_SUFFIX);
}

$fam = fam_open('drupaltest');

//$mon = fam_monitor_collection($fam, '/var/www/media-dev/sites/default/files/hollywood-media', 10, '*');
$mon = fam_monitor_directory($fam, '/var/www/media-dev/sites/default/files/hollywood-media');

if (!$mon) {
  return;
}

while ($event = fam_next_event($fam)) {
  $timestamp = gettimeofday();
  print(date('Y-m-d H:i:s').': ');
  print_r($event);
}

fam_close($fam);
?>

