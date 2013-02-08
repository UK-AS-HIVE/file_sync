#!/bin/bash

while true
do
  #nice drush scr file_sync.module
  NEEDS_INDEXING=`drush search-api-status 2 | grep "File index"`
  INDEX_COUNT=`echo ${NEEDS_INDEXING} | cut -b 30-37`
  TOTAL_COUNT=`echo ${NEEDS_INDEXING} | cut -b 39-40`
  echo ${INDEX_COUNT}
  echo ${TOTAL_COUNT}
  while [[ -z $NEEDS_INDEXING  ]]
  do  
    nice drush search-api-index 2 500
    NEEDS_INDEXING=`drush search-api-status 2 | grep "100%"`
  done
done

