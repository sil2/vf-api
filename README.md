# Simple API 

## Requirements

Laravel 7 

## Setup 

```bash
composer require sil2/vf-api
```

To create package db tables run

```bash
php artisan migrate
```

OR to create tables and get 100 test recorords

```bash
php artisan vf-api:install 

```

Publish package assets

```bash
php artisan vendor:publish --provider="Sil2\VfApi\VfApiIntegrationServiceProvider"

```

## API token

Pick any token value
Create an MD5 hash of this value and set as `API_TOKEN` in `.env` 
Use the original token value as bearer token for API requests

## Usage

List available endpoints

```bash
php artisan route:list --path="api/widget"
```

# Testing

```bash
vendor/bin/phpunit
```
