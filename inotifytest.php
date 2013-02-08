<?php

$inotify = inotify_init();

$watch = inotify_add_watch($inotify, '/var/www/media-dev/sites/default/files/hollywood-media', IN_ALL_EVENTS);

while ($event = inotify_read($inotify)) {
  print_r($event);
}

inotify_rm_watch($watch);
?>

