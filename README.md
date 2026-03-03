# Laravel Robots

Dynamic `robots.txt` generation for Laravel.

## Installation

```bash
composer require mdbtq/laravel-robots
```

The service provider is auto-discovered by Laravel.

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=robots-config
```

This creates `config/robots.php` with the following options:

| Option | Default | Description |
|--------|---------|-------------|
| `disallow` | `[]` | Paths to disallow in production |
| `sitemap` | `/sitemap.xml` | Sitemap URL (set to `null` to omit) |
| `block_non_production` | `true` | Serve `Disallow: /` on non-production environments |

## How It Works

The package registers a `GET /robots.txt` route that dynamically generates the response:

- **Non-production** (when `block_non_production` is `true`): blocks all crawlers with `Disallow: /`
- **Production**: outputs configured disallow paths and an optional sitemap directive

Make sure there is no static `robots.txt` file in your `public/` directory, as it would take precedence over the dynamic route.

## License

MIT
