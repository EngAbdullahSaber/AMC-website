# Vercel Deployment Guide - AMC Website (Frontend Only)

## ⚠️ Important: Deployment Strategy

Since **Vercel doesn't support PHP natively**, this configuration deploys only your **frontend assets** (built by Vite) to Vercel.

For a complete deployment, you'll need to:

1. **Frontend**: Deploy Vite build to Vercel (this guide)
2. **Backend**: Deploy Laravel API to a PHP-capable platform (see below)

---

## ✅ What's Been Configured

### 1. **Updated vercel.json**

- Builds frontend with Vite
- Outputs to `dist` directory
- Sets production environment variables

### 2. **Updated AppServiceProvider**

- Added HTTPS enforcement for production
- Maintains database view sharing for templates

### 3. **Documentation Files**

- `DEPLOYMENT.md` - Detailed deployment steps
- `vercel-deploy.sh` - Quick-start script

---## 🚀 Quick Deployment Steps

### **Step 1: Push to GitHub**

```bash
git add .
git commit -m "Prepare for Vercel deployment"
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git push -u origin main
```

### **Step 2: Deploy to Vercel**

**Option A: Using Vercel Dashboard (Easiest)**

1. Go to [vercel.com/new](https://vercel.com/new)
2. Click "Import Git Repository"
3. Select your GitHub repository
4. **Framework**: Leave as "Other" or let it auto-detect (will detect from composer.json)
5. **Build Command**: Leave default (uses vercel.json settings)
6. **Output Directory**: `public`
7. Click "Deploy"

**Option B: Using Vercel CLI**

```bash
npm install -g vercel
vercel
# Follow the interactive prompts
```

### **Step 3: Add Environment Variables**

Vercel environment variables are optional for frontend-only deployment, but you can add:

```
VITE_APP_NAME=AMC Website
VITE_APP_URL=https://your-project.vercel.app
```

Any variables prefixed with `VITE_` will be available in your frontend code.

### **Step 4: Backend (Laravel API) Deployment**

Deploy your Laravel backend to a PHP-capable platform:

**Recommended Options:**

- **Railway.app** - Simple Laravel deployment
- **Heroku** - Classic choice with free tier
- **DigitalOcean App Platform** - Affordable
- **Fly.io** - Good performance
- **PlanetScale** (for database only)

Example: Deploy Laravel to Railway

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login and deploy
railway login
railway init
railway up
```

Update your frontend `vite.config.js` to point to your Laravel API:

```js
// Example API URL
const API_URL = process.env.VITE_API_URL || "https://your-api.railway.app/api";
```

### \*\*Step 5: Database Setup

Use an external managed database service:

- **PlanetScale** (MySQL) - Free tier
- **Supabase** (PostgreSQL) - Free tier
- **AWS RDS** - Managed database
- **MongoDB Atlas** - NoSQL option

Configure your Laravel backend with these credentials.

---

## 🔗 Integration: Frontend + Backend

After deploying both:

1. **Get your API URL** from your Laravel deployment
2. **Update frontend** to use the API URL:
    ```js
    // In your frontend code
    const API_BASE = "https://your-api-domain.com/api";
    ```
3. **Configure CORS** in Laravel (`config/cors.php`):
    ```php
    'allowed_origins' => [
        'https://your-vercel-app.vercel.app',
    ],
    ```
4. **Test the connection** between frontend and backend**Recommended Options:**

- **PlanetScale** (MySQL) - Free tier available
- **Supabase** (PostgreSQL) - Free tier available
- **AWS RDS** - Managed relational database
- **MongoDB Atlas** - NoSQL option

After connecting your database, run migrations:

```bash
# If you can SSH into the deployment
php artisan migrate --force
```

---

## 📦 Project Structure for Vercel

```
project-root/
├── api/
│   └── index.php              # ← Serverless function entry point
├── app/                       # ← Laravel app code
├── public/                    # ← Static assets (CSS, JS, images)
├── resources/                 # ← Blade templates, assets
├── routes/                    # ← API & web routes
├── vercel.json               # ← ✅ Updated for Vercel
├── composer.json             # ← PHP dependencies
├── package.json              # ← Node dependencies
└── vite.config.js            # ← Frontend build config
```

---

## ⚙️ Important Configuration Notes

### **Session & Cache**

- `SESSION_DRIVER=cookie` - Required for serverless (no persistent storage)
- `CACHE_DRIVER=file` - Works for Vercel's temporary filesystem

### **File Storage**

For user-uploaded files, update `config/filesystems.php`:

```php
'disk' => env('FILESYSTEM_DISK', 's3'), // Use S3 or similar cloud storage
```

### **Logging**

Your `LOG_CHANNEL=stderr` will output to Vercel logs for debugging:

```bash
vercel logs --follow
```

### **Asset URLs**

Vite will automatically handle asset URLs in production.

---

## 🔍 Testing Before Deployment

```bash
# 1. Test build locally
npm install
npm run build
composer install --no-dev

# 2. Generate APP_KEY
php artisan key:generate

# 3. Run locally
php artisan serve
# Visit http://localhost:8000
```

---

## 📊 Deployment Troubleshooting

### **Check Vercel Logs**

```bash
vercel logs --follow
```

### **Common Issues**

| Issue                       | Solution                                                            |
| --------------------------- | ------------------------------------------------------------------- |
| `APP_KEY missing`           | Generate with `php artisan key:generate --show` and add to env vars |
| `Database connection error` | Verify DB credentials in Vercel env vars                            |
| `404 on routes`             | Ensure `api/index.php` is configured correctly                      |
| `Assets not loading`        | Check Vite build output and `APP_URL` env var                       |
| `CSRF token mismatch`       | Keep `SESSION_DRIVER=cookie`                                        |

---

## 📱 Post-Deployment Checklist

- [ ] Visit your Vercel URL and confirm the site loads
- [ ] Test a few key pages and features
- [ ] Check Vercel logs for any errors: `vercel logs`
- [ ] Verify environment variables are set correctly
- [ ] Test database connectivity (if applicable)
- [ ] Set up a custom domain in Vercel settings
- [ ] Configure automatic deployments on GitHub push

---

## 🎯 Next Steps

1. **Commit changes**: `git add . && git commit -m "Configure Vercel deployment"`
2. **Push to GitHub**: `git push`
3. **Deploy**: Use Vercel dashboard or CLI
4. **Monitor**: Check `vercel logs --follow` for any issues
5. **Optimize**: Fine-tune performance and configure CDN caching

---

## 📚 Useful Resources

- [Vercel Laravel Docs](https://vercel.com/docs/frameworks/laravel)
- [Laravel Deployment Guide](https://laravel.com/docs/deployment)
- [Vite Documentation](https://vitejs.dev/)
- [PlanetScale Setup](https://planetscale.com/docs)

---

**Questions?** Check the `DEPLOYMENT.md` file for more detailed instructions.

Good luck with your deployment! 🎉
