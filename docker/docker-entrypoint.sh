#!/bin/sh
set -e

if [ $# -gt 0 ]; then
    exec "$@"
else
    vendor/bin/phing start ; \
    exec php-fpm -F
fi
