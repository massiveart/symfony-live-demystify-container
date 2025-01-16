### SymfonyLive Berlin 2025 - Demystify Dependency Injection - Understanding the magic of the Container

## Requirements

- PHP 8.3
- [Composer](https://getcomposer.org/)

#### Optional requirements
- [Symfony CLI Tool](https://symfony.com/doc/master/cloud/getting-started.html)
- [Docker Engine](https://docs.docker.com/engine/installation/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting started

1. Make sure you have recent versions of Docker and Docker Compose installed.
2. Clone this repository.
3. Build and run the stack by calling `docker-compose up -d --build`.
4. To execute PHP, call `docker-compose exec dev bash` first, which will open a shell within the dev container. There
   PHP is available as usual.

## Composer and Symfony

Both Composer and the Symfony CLI are preinstalled and can be called anywhere within the container via `composer` and
`symfony`.

Be aware that Docker-related features of the Symfony CLI do not work as expected, as it can't access the Docker
infrastructure.

## Tip

If you have installed [make](https://www.gnu.org/software/make/), you can use the commands provided in the Makefile.