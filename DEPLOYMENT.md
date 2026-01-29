# Deployment Steps for Vercel

## Prerequisites

1. Install Vercel CLI: `npm install -g vercel`
2. Have a GitHub account with your repository

## Step 1: Push to GitHub

```bash
git init
git add .
git commit -m "Prepare for Vercel deployment"
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git push -u origin main
```

## Step 2: Deploy to Vercel

### Option A: Using Vercel Dashboard

1. Go to https://vercel.com/new
2. Select "Import Git Repository"
3. Connect your GitHub repository
4. Select "Laravel" as the framework
5. Add environment variables:
    - `APP_KEY`: Generate using `php artisan key:generate --show` locally
    - `APP_NAME`: Your application name
    - `APP_DEBUG`: false (for production)
    - `APP_URL`: Your Vercel domain
    - `DB_*`: Database credentials (if using external DB like PlanetScale, AWS RDS, etc.)

### Option B: Using Vercel CLI

```bash
vercel
# Follow the prompts
# Set environment variables when prompted
```

## Step 3: Configure Database

Since Vercel serverless functions have ephemeral storage, use an external database:

- **PlanetScale** (MySQL) - Recommended
- **Supabase** (PostgreSQL)
- **AWS RDS**
- **MongoDB Atlas**

Update your `.env` file on Vercel with database credentials.

## Step 4: Run Migrations

```bash
# SSH into your Vercel deployment (if possible) or use:
php artisan migrate --force
```

Or you can create a deployment script in `api/migrate.php`:

```php
<?php
require __DIR__ . '/../bootstrap/app.php';
\Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
echo "Migrations completed";
```

## Important Notes

1. **Static Assets**: Update `app/Providers/AppServiceProvider.php` to use Vercel's CDN for assets
2. **Sessions**: Configure session driver in `.env` (use 'cookie' or external cache)
3. **File Storage**: Configure cloud storage (S3, etc.) in `config/filesystems.php`
4. **Logs**: Update logging to use stderr for Vercel

## Troubleshooting

- Check Vercel logs: `vercel logs`
- Verify environment variables are set
- Ensure all dependencies are in `composer.json` and `package.json`
- Check Laravel logs in storage/logs/

## Additional Configuration Files

### Update AppServiceProvider.php

Add this to force HTTPS in production:

```php
if ($this->app->environment('production')) {
    \URL::forceScheme('https');
}
```

### Configure Cache (using session storage)

Update `.env`:

```
SESSION_DRIVER=cookie
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```
