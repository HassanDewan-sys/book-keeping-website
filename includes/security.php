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
 * Send security headers
 */
function send_security_headers(): void {
    if (!headers_sent()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
