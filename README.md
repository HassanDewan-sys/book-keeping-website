# Bindwell Press - Book Publishing & Cover Design Website

A luxury, high-performance web platform for Bindwell Press, featuring bespoke book cover showcases, interactive 3D WebGL experiences, editorial layouts, and responsive publishing services.

## Tech Stack
- **Backend**: Pure PHP 8.x
- **Frontend**: Custom CSS3, Vanilla JavaScript (ES6+)
- **3D & Animation**: Three.js, GSAP, ScrollTrigger, Lenis Smooth Scroll
- **Deployment**: Compatible with Apache/Nginx (Hostinger, cPanel) and Vercel Serverless PHP (`vercel-php`)

## Deployment
- **Apache / Shared Hosting (Hostinger)**: Upload the repository files into `public_html` (or subdirectory). The `.htaccess` and dynamic `asset_url()` handle routing and asset paths automatically.
- **Vercel**: Import the GitHub repository on Vercel. `vercel.json` is configured to deploy with zero configuration.
