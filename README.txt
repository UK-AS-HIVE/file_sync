
Installation
============

The file_sync module makes use of the FAM package available on Linux systems to
make sure changes to the file system are reflected in the {file_managed} table as quickly
as possible.  To install FAM support for PHP under Ubuntu:

$ sudo apt-get install gamin libgamin-dev libgamin0
$ sudo pecl install channel://pecl.php.net/fam-5.0.1

Then add the following line to php.ini under the [PHP] section:

extension=fam.so



References
=====
[1] http://stackoverflow.com/questions/5852280/using-gamin-instead-of-fam-in-php


