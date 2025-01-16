ARG COMPOSER_VERSION=2
ARG PHP_VERSION="8.3-fpm"
ARG MYSQL_VERSION="80"
ARG SYMFONY_CLI_VERSION=5.8.11

ARG GROUP_ID=1000
ARG USER_ID=1000

# Extra FROM for Composer to allow version variables
FROM composer:${COMPOSER_VERSION} as composer
FROM php:${PHP_VERSION}

ARG MYSQL_VERSION
ARG SYMFONY_CLI_VERSION

ARG GROUP_ID
ARG USER_ID

ENV TZ Europe/Berlin

RUN apt-get update \
    && /usr/sbin/groupadd --gid ${GROUP_ID} training \
    && /usr/sbin/useradd --home-dir /home/training --create-home --uid ${USER_ID} --gid ${GROUP_ID} --shell /bin/sh --skel /dev/null training \
    && apt-get install -y curl unzip git jq less default-mysql-client ncat nano vim ca-certificates gnupg \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && chown -R training:training /usr/local \
    && apt-get clean \
    && rm -rf /var/cache/apt /var/lib/apt/lists/*

USER training

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN curl -LsS https://github.com/symfony-cli/symfony-cli/releases/download/v${SYMFONY_CLI_VERSION}/symfony-cli_linux_amd64.tar.gz -o /tmp/symfony-cli.tar.gz \
    && tar -zxvf /tmp/symfony-cli.tar.gz -C /usr/local/bin/

RUN echo 'export PS1="\u:\w> "' >> ~/.bashrc

WORKDIR /app
