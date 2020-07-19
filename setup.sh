#!/bin/bash
if [ ! -e ./.env ]; then
  cp env-example .env
fi

# "Please provide a valid path." 対策
find config/ -type f | xargs grep storage_path \
| grep framework | sed -e 's/^.*storage_path//' \
| tr -d ",\(\)'" | awk '{ print "storage/"$0 }' | xargs mkdir -p

(composer install && composer update && php artisan migrate) && echo "Setup success!" || (echo "Setup failed. Exit code: $?" && exit $?)

