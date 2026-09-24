<?php
/**
 * Bindwell Press - Security Layer
 */

// Start session securely if not already active
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_samesite', 'Lax');
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        ini_set('session.cookie_secure', 1);
    }
    session_start();
}

/**
 * Generate or get existing CSRF token
 */
function get_csrf_token(): string {
    if (empty($_SESSION[CSRF_TOKEN_KEY])) {
        $_SESSION[CSRF_TOKEN_KEY] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_KEY];
}

/**
 * Verify submitted CSRF token
 */
function verify_csrf_token(?string $token): bool {
    if (empty($token) || empty($_SESSION[CSRF_TOKEN_KEY])) {
        return false;
    }
    return hash_equals($_SESSION[CSRF_TOKEN_KEY], $token);
}

/**
 * Render CSRF hidden input field
 */
function csrf_field(): string {
    $token = get_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
}

/**
 * Escape HTML output for XSS protection
 */
function e(?string $string): string {
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize plain string input
 */
function sanitize_string(?string $input): string {
    if ($input === null) return '';
    return trim(strip_tags($input));
}

/**
 * Validate and sanitize email
 */
function sanitize_email(?string $email): ?string {
    if ($email === null) return null;
    $email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
}

/**
 * Simple session/IP based rate limiter
 */
function check_rate_limit(string $action = 'contact', int $maxAttempts = 5, int $decaySeconds = 300): bool {
    $now = time();
    $key = 'rate_limit_' . $action;
    
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = [];
    }

    // Filter attempts within decay period
    $_SESSION[$key] = array_filter($_SESSION[$key], function($timestamp) use ($now, $decaySeconds) {
        return ($now - $timestamp) < $decaySeconds;
    });

    if (count($_SESSION[$key]) >= $maxAttempts) {
        return false; // Rate limit exceeded
    }

    $_SESSION[$key][] = $now;
    return true;
}

/**
 * Block malicious bots, offline downloaders & web scrapers (HTTrack, Teleport, Wget, WebCopier, etc.)
 */
function enforce_anti_scraper_shield(): void {
    if (php_sapi_name() === 'cli') {
        return; // Allow CLI tasks / testing
    }

    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    // 1. Block empty user-agent (signature of automated socket crawlers)
    if (empty($userAgent)) {
        http_response_code(403);
        header('Content-Type: text/html; charset=utf-8');
        exit('<!DOCTYPE html><html><head><meta charset="utf-8"><title>403 Forbidden</title></head><body style="background:#14070D;color:#FAF6F0;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;"><div style="background:rgba(255,255,255,0.05);padding:40px;border-radius:16px;border:1px solid rgba(201,142,94,0.4);max-width:500px;text-align:center;"><h1 style="color:#C98E5E;margin-bottom:10px;">403 Forbidden</h1><p>Access denied: Missing client identification.</p></div></body></html>');
    }

    // 2. High-risk Scraper, Website Copier & Exploit Tool Signatures
    $bannedAgents = [
        'httrack',
        'wget',
        'teleport',
        'webcopier',
        'offline explorer',
        'webzip',
        'sitesnagger',
        'site-snagger',
        'grafula',
        'scrapy',
        'blackwidow',
        'stripper',
        'sucker',
        'ninja',
        'clshttp',
        'autohttp',
        'extractorpro',
        'pavuk',
        'joc web spider',
        'chinaclaw',
        'custo',
        'disco',
        'go!zilla',
        'grabnet',
        'superbot',
        'zeus',
        'eirgrabber',
        'emailcollector',
        'emailsiphon',
        'emailwolf',
        'harvest',
        'pagegrabber',
        'nikto',
        'sqlmap',
        'acunetix',
        'havij',
        'dirbuster',
        'masscan',
        'zgrab',
        'python-requests',
        'libwww-perl',
        'urllib'
    ];

    foreach ($bannedAgents as $badAgent) {
        if (strpos($userAgent, $badAgent) !== false) {
            http_response_code(403);
            header('Content-Type: text/html; charset=utf-8');
            exit('<!DOCTYPE html><html><head><meta charset="utf-8"><title>403 Forbidden - Security Shield</title><style>body{background:#14070D;color:#FAF6F0;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}.box{background:rgba(255,255,255,0.05);padding:40px;border-radius:16px;border:1px solid rgba(201,142,94,0.4);max-width:500px;}h1{color:#C98E5E;margin-bottom:10px;}p{color:rgba(250,246,240,0.8);line-height:1.6;}</style></head><body><div class="box"><h1>403 Forbidden</h1><p>Automated downloading tools, site copiers, and scraping bots are strictly prohibited on this server.</p></div></body></html>');
        }
    }

    // 3. Anti-burst Crawler Rate Limiter (Max 50 requests per 10 seconds per session/IP)
    if (!check_rate_limit('crawler_burst_shield', 50, 10)) {
        http_response_code(429);
        header('Retry-After: 30');
        header('Content-Type: text/html; charset=utf-8');
        exit('<!DOCTYPE html><html><head><meta charset="utf-8"><title>429 Too Many Requests</title><style>body{background:#14070D;color:#FAF6F0;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}.box{background:rgba(255,255,255,0.05);padding:40px;border-radius:16px;border:1px solid rgba(201,142,94,0.4);max-width:500px;}h1{color:#C98E5E;margin-bottom:10px;}p{color:rgba(250,246,240,0.8);line-height:1.6;}</style></head><body><div class="box"><h1>Too Many Requests</h1><p>High request frequency detected. Please wait a moment before continuing.</p></div></body></html>');
    }
}

/**
 * Send security headers
 */
function send_security_headers(): void {
    if (!headers_sent()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
    }
}
