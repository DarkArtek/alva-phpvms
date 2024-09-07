# Spark24/7

The Spark Virtual Aviation Website, built on phpVMS 7 and custom modules.

## Installation

A full distribution, with all of the composer dependencies, is available at this 
[GitHub Releases](https://github.com/nabeelio/phpvms/releases) link. 

### Requirements

- PHP 8.1+, extensions:
  - cURL
  - JSON
  - fileinfo
  - mbstring
  - openssl
  - pdo
  - tokenizer
  - bcmath
  - intl
- Database:
  - MySQL 5.7+ (or MySQL variant, including MariaDB and Percona)

[View more details on requirements](https://docs.phpvms.net/requirements)

### Installer

1. Upload to your server
1. Visit the site, and follow the link to the installer

[View installation details](https://docs.phpvms.net/installation)

## Development Environment with Docker

A full development environment can be brought up using Docker and [Laravel Sail](https://laravel.com/docs/10.x/sail), without having to install composer/npm locally

```bash
make docker-test

# **OR** with docker directly

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
    
# Then you can start sail
./vendor/bin/sail up
```

Then go to `http://localhost`. 

Instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Then you can execute php, artisan, composer, npm, etc. commands using the sail prefix:
```bash
# PHP commands within Laravel Sail...
sail php --version

# Artisan commands within Laravel Sail...
sail artisan about

# Composer commands within Laravel Sail...
sail composer install

# NPM commands within Laravel Sail...
sail npm run dev
```

To interact with databases (MariaDB, Redis...), please refer to the Laravel Sail documentation

### Building JS/CSS assets

Yarn is required, run:

```bash
make build-assets
```

This will build all of the assets according to the webpack file.

### Submodules

This repository utilizes Submodules. Some modules are public, while others are private.
