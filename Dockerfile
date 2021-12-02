FROM gcr.io/or-docker-images/laravel:v2.4 as environment

# Add any application-specific configurations above
# ---
FROM environment as build-test

# Copy just the composer files for initial install - this ensures we take advantage of Docker cache
COPY ./src/composer.json ./src/composer.lock ./

# Validate & install
## Requires docker build kit secret. To use local composer auth.json, run the following:
## `docker build --secret id=composer-auth,src=$(cd ~ && pwd)/.composer/auth.json .`
RUN --mount=type=secret,id=composer-auth,dst=/root/.composer/auth.json \
  set -e; \
  composer validate --no-check-all --no-check-publish; \
  composer install --no-autoloader --dev;

# Copy application source, run tests, then remove development dependencies
COPY src/ ${WORKDIR}
RUN set -e; \
  composer dump-autoload; \
  composer test; \
  composer install --optimize-autoloader --no-dev;
# ---

FROM environment as final
# Copy a fresh instance of the application source to ensure we don't carry over any temp data
COPY src/ ${WORKDIR}

# Copy the final vendor directory from `build-test`
COPY --from=build-test ${WORKDIR}/vendor ${WORKDIR}/vendor

# Copy the bootstrap cache directory from `build-test`
COPY --from=build-test ${WORKDIR}/bootstrap/cache ${WORKDIR}/bootstrap/cache

# Optimize & clear config cache
RUN set -e; \
  php artisan optimize; \
  php artisan config:clear;

# Clean the working directory
RUN rm -rf \
  tests/ \
  composer.lock \
  phpunit.xml
# ---
