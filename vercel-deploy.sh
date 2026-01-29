#!/bin/bash
# Vercel Deployment Quick Start Script

echo "🚀 AMC Website - Vercel Deployment Setup"
echo "=========================================="
echo ""

# Step 1: Install Vercel CLI
echo "1️⃣  Installing Vercel CLI (if not already installed)..."
npm install -g vercel

# Step 2: Initialize Git if needed
echo "2️⃣  Checking Git repository..."
if [ ! -d .git ]; then
    echo "   Initializing Git repository..."
    git init
    git add .
    git commit -m "Initial commit - prepare for Vercel deployment"
    echo "   ✅ Git initialized"
else
    echo "   ✅ Git repository found"
fi

# Step 3: Generate APP_KEY if not present
echo "3️⃣  Checking APP_KEY..."
if ! grep -q "APP_KEY=base64:" .env.example; then
    echo "   ⚠️  APP_KEY not found in .env.example"
    echo "   Generate one by running: php artisan key:generate --show"
else
    echo "   ✅ APP_KEY found"
fi

# Step 4: Information
echo ""
echo "📋 NEXT STEPS:"
echo "=============="
echo ""
echo "1. Push your code to GitHub:"
echo "   git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git"
echo "   git push -u origin main"
echo ""
echo "2. Deploy to Vercel using CLI:"
echo "   vercel"
echo ""
echo "   OR deploy via dashboard:"
echo "   - Go to https://vercel.com/new"
echo "   - Import your GitHub repository"
echo "   - Select 'Laravel' as framework"
echo ""
echo "3. Configure Environment Variables on Vercel:"
echo "   - APP_KEY: (generate with: php artisan key:generate --show)"
echo "   - APP_NAME: AMC Website"
echo "   - APP_URL: https://your-domain.vercel.app"
echo "   - DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD"
echo "   - And any other required env variables"
echo ""
echo "4. Database Setup:"
echo "   - Use external managed database (PlanetScale, Supabase, AWS RDS, etc.)"
echo "   - Run migrations: php artisan migrate --force"
echo ""
echo "📚 See DEPLOYMENT.md for detailed instructions"
echo ""
