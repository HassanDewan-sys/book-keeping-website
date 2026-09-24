<?php
/**
 * High Performance HTTP 206 Partial Content Video Streaming Endpoint
 * Allows HTML5 video instant seeking and byte-range streaming
 */
$raw = $_GET['video'] ?? $_GET['file'] ?? $_GET['src'] ?? '';
if (empty($raw) && isset($_GET['v']) && $_GET['v'] !== '2.0') {
    $raw = $_GET['v'];
}
if (($qPos = strpos($raw, '?')) !== false) {
    $raw = substr($raw, 0, $qPos);
}
if (($ampPos = strpos($raw, '&')) !== false) {
    $raw = substr($raw, 0, $ampPos);
}
$filename = basename($raw);
$file = __DIR__ . '/videos/' . $filename;

if (empty($filename) || !file_exists($file) || !is_file($file)) {
    http_response_code(404);
    exit('Video not found');
}

$size = filesize($file);
$start = 0;
$end = $size - 1;

header("Content-Type: video/mp4");
header("Accept-Ranges: bytes");
header("Cache-Control: public, max-age=31536000");

if (isset($_SERVER['HTTP_RANGE'])) {
    $c_start = $start;
    $c_end = $end;

    list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
    if (strpos($range, ',') !== false) {
        header('HTTP/1.1 416 Requested Range Not Satisfiable');
        header("Content-Range: bytes $start-$end/$size");
        exit;
    }

    if ($range === '-') {
        $c_start = $size - substr($range, 1);
    } else {
        $range = explode('-', $range);
        $c_start = intval($range[0]);
        $c_end = (isset($range[1]) && is_numeric($range[1])) ? intval($range[1]) : $size - 1;
    }

    $c_end = ($c_end > $end) ? $end : $c_end;
    if ($c_start > $c_end || $c_start > $size - 1 || $c_end >= $size) {
        header('HTTP/1.1 416 Requested Range Not Satisfiable');
        header("Content-Range: bytes $start-$end/$size");
        exit;
    }

    $start = $c_start;
    $end = $c_end;
    $length = $end - $start + 1;

    header('HTTP/1.1 206 Partial Content');
    header("Content-Range: bytes $start-$end/$size");
    header("Content-Length: " . $length);
} else {
    header("Content-Length: " . $size);
}

$fp = @fopen($file, 'rb');
if ($fp) {
    fseek($fp, $start);
    $chunkSize = 1024 * 64; // 64KB chunks
    while (!feof($fp) && ($pos = ftell($fp)) <= $end) {
        if ($pos + $chunkSize > $end) {
            $chunkSize = $end - $pos + 1;
        }
        echo fread($fp, $chunkSize);
        flush();
    }
    fclose($fp);
}
exit;
