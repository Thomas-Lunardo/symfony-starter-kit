# Checkpoint 4

## Presentation

This repo is about my last checkpoint at school.

### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed

### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Run `yarn encore dev` to build assets

### Working

1. Run `symfony server:start` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets (or `yarn dev-server` do the same with Hot Module Reload activated)

### Testing

1. Run `php ./vendor/bin/phpcs` to launch PHP code sniffer
2. Run `php ./vendor/bin/phpstan analyse src --level max` to launch PHPStan
3. Run `php ./vendor/bin/phpmd src text phpmd.xml` to launch PHP Mess Detector

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command:

`git config --global core.autocrlf true`

The `.editorconfig` file in root directory do this for you. You probably need `EditorConfig` extension if your IDE is VSCode.

### Run locally with Docker

1. Fill DATABASE_URL variable in .env.local file with
`DATABASE_URL="mysql://root:password@database:3306/<choose_a_db_name>"`
2. Install Docker Desktop an run the command:
```bash
docker compose up -d
```
3. Wait a moment and visit http://localhost:8000

