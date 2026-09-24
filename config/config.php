<?php
/**
 * Bindwell Press - Application Configuration
 */

// Define environment
define('APP_ENV', 'development');
define('APP_DEBUG', true);

// Auto-detect Host and Protocol
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? '') == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1:8000';

// Site details
define('SITE_NAME', 'Bindwell Press');
define('SITE_TAGLINE', 'Your Story Deserves A World-Class Publishing Experience.');
define('SITE_URL', $protocol . $host);
define('SITE_PHONE', '(02) 8531 1364');
define('SITE_PHONE_RAW', '+61285311364');
define('SITE_EMAIL', 'info@bindwellpress.com');
define('SITE_ADDRESS', '68 Northbourne Ave, Canberra ACT 2601, Australia');

// Assets path
define('ASSET_PATH', '/assets');

// Security settings
define('SESSION_LIFETIME', 3600); // 1 hour
define('CSRF_TOKEN_KEY', 'cp_csrf_token');

// Database configuration (SQLite by default for zero-setup portability, or MySQL if enabled)
define('DB_TYPE', 'sqlite'); // 'sqlite' or 'mysql'
define('DB_SQLITE_PATH', __DIR__ . '/../data/canberra_press.sqlite');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'canberra_press');
define('DB_USER', 'root');
define('DB_PASS', '');

// Set timezone
date_default_timezone_set('Australia/Sydney');
