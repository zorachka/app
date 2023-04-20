ARG PHP_EXTENSIONS="apcu pgsql pdo_pgsql"

FROM thecodingmachine/php:8.1-v4-slim-cli

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
