#!/bin/sh

sed -i.backup "s/intern.*/$1/g" ".env.example"
sed -i.backup "s#APP_URL=.*#APP_URL=$2#g" ".env.example"

cp .env.example .env

composer install

docker-compose up -d --build
