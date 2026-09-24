<?php
/**
 * Bindwell Press - Helper Functions
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/security.php';

/**
 * Detect project base URL dynamically (supports subdirectories like /staging-websites/book-keeping/)
 */
function get_base_url(): string {
    static $baseUrl = null;
    if ($baseUrl !== null) {
        return $baseUrl;
    }

    if (defined('BASE_PATH') && BASE_PATH !== null) {
        $baseUrl = rtrim(BASE_PATH, '/');
        return $baseUrl;
    }

    // 1. Check relative distance between DOCUMENT_ROOT and project directory
    $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
    if (!empty($docRoot)) {
        $realDoc = str_replace('\\', '/', realpath($docRoot) ?: $docRoot);
        $projectRoot = str_replace('\\', '/', realpath(__DIR__ . '/..') ?: (__DIR__ . '/..'));
        if (strpos($projectRoot, $realDoc) === 0) {
            $subPath = trim(substr($projectRoot, strlen($realDoc)), '/');
            $baseUrl = $subPath ? '/' . $subPath : '';
            return $baseUrl;
        }
    }

    // 2. Fallback based on SCRIPT_NAME
    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    $dir = dirname($script);
    $dir = str_replace('\\', '/', $dir);
    if ($dir === '/' || $dir === '.' || $dir === '\\') {
        $baseUrl = '';
    } else {
        // If script is in a subfolder like /api, strip it
        if (substr($dir, -4) === '/api') {
            $dir = substr($dir, 0, -4);
        }
        $baseUrl = rtrim($dir, '/');
    }

    return $baseUrl;
}

/**
 * Resolve an asset URL (handles domain root and subdirectories automatically)
 */
function asset_url(string $path): string {
    $trimmed = ltrim($path, '/');
    $base = get_base_url();
    return ($base ? $base . '/' : '/') . $trimmed . '?v=2.2';
}

/**
 * Render a component with optional data scope
 */
function render_component(string $componentName, array $data = []): void {
    $componentFile = __DIR__ . '/../components/' . $componentName . '.php';
    if (file_exists($componentFile)) {
        extract($data);
        include $componentFile;
    } else {
        if (APP_DEBUG) {
            echo "<!-- Component [{$componentName}] not found -->";
        }
    }
}

/**
 * Reusable inline SVG icons matching Bindwell Press iconography
 */
function get_icon(string $name, string $class = ''): string {
    $icons = [
        'sparkle' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3z"></path></svg>',
        'chat' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
        'mail' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M3 6h18v12H3V6zm0 1l9 6 9-6"></path></svg>',
        'phone' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M5 4h4l2 5-3 2a11 11 0 005 5l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg>',
        'phone-lg' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M5 4h4l2 5-3 2a11 11 0 005 5l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"></path></svg>',
        'arrow-right' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>',
        'arrow-left' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"></path></svg>',
        'chevron-down' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M6 9l6 6 6-6"></path></svg>',
        'chevron-down-lg' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M6 9l6 6 6-6"></path></svg>',
        'star' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M12 3l2.9 6.3 6.6.7-4.9 4.4 1.3 6.6L12 18l-5.9 3 1.3-6.6L2.5 10l6.6-.7L12 3z"></path></svg>',
        'shield-check' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M12 3l7 3v6c0 4-3 7-7 9-4-2-7-5-7-9V6l7-3zm-3 9l2 2 4-4"></path></svg>',
        'play' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M8 5v14l11-7L8 5z"></path></svg>',
        'pause' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" stroke="none" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"></path></svg>',
        'amazon' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M4 16c5 3 11 3 16 0M18 17c.5-1 .7-2 .5-3M9 10a3 3 0 116 0c0 3-2 3-2 5"></path></svg>',
        'check' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M20 6L9 17l-5-5"></path></svg>',
        'menu' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>',
        'close' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"></path></svg>',
        'book' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 2v20"/></svg>',
        'ebook' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><rect width="14" height="20" x="5" y="2" rx="2"/><path d="M12 18h.01"/></svg>',
        'palette' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>',
        'rocket' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>',
        'megaphone' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="m3 11 18-5v12L3 13v-2z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg>',
        'headphones' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/></svg>',
        'printer' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect width="12" height="8" x="6" y="14"></rect></svg>',
        'globe' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
        'edit' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
        'share' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>',
        'target' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
        'check-circle' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
        'layout' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="' . e($class) . '" aria-hidden="true"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>'
    ];

    return $icons[$name] ?? '';
}
