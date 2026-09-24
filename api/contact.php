<?php
/**
 * Bindwell Press - Secure Contact Form Endpoint
 */

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/security.php';
enforce_anti_scraper_shield();

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// Check CSRF Token
$token = $_POST['csrf_token'] ?? '';
if (!verify_csrf_token($token)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Security token expired or invalid. Please refresh the page.']);
    exit;
}

// Rate Limiting (max 5 submissions in 5 minutes per session)
if (!check_rate_limit('contact', 5, 300)) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Too many requests. Please wait a few minutes before submitting again.']);
    exit;
}

// Retrieve and sanitize fields
$fullName = sanitize_string($_POST['full_name'] ?? '');
$email = sanitize_email($_POST['email'] ?? null);
$phone = sanitize_string($_POST['phone'] ?? '');
$service = sanitize_string($_POST['service'] ?? '');
$message = sanitize_string($_POST['message'] ?? '');

// Validation
$errors = [];

if (empty($fullName)) {
    $errors[] = 'Please provide your full name.';
}

if (!$email) {
    $errors[] = 'Please provide a valid email address.';
}

if (empty($message)) {
    $errors[] = 'Please share a brief description of your project or inquiry.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// Store in Database
try {
    $pdo = get_db_connection();
    if ($pdo) {
        $stmt = $pdo->prepare("INSERT INTO contact_submissions (full_name, email, phone, service, message, ip_address, user_agent) VALUES (:full_name, :email, :phone, :service, :message, :ip, :ua)");
        $stmt->execute([
            ':full_name' => $fullName,
            ':email' => $email,
            ':phone' => $phone,
            ':service' => $service,
            ':message' => $message,
            ':ip' => $_SERVER['REMOTE_ADDR'] ?? '',
            ':ua' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255)
        ]);
    }
} catch (Exception $e) {
    if (APP_DEBUG) {
        error_log('Contact Submission DB Error: ' . $e->getMessage());
    }
}

// Return success
echo json_encode([
    'success' => true,
    'message' => 'Thank you, ' . $fullName . '! Your publishing inquiry has been received. A senior publishing consultant will review your manuscript details and contact you within 24 hours.'
]);
