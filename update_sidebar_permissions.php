<?php

$fileKey = 'resources/views/layout/partials/sidebar.blade.php';
$filePath = __DIR__ . '/' . $fileKey;

if (!file_exists($filePath)) {
    die("File not found: $filePath");
}

$content = file_get_contents($filePath);

// Check if already updated to avoid duplication
if (strpos($content, "Auth::user()->role === 'director'") !== false) {
    echo "Director role already present in some places. Proceeding with caution...\n";
}

// Perform replacement
// We target "Auth::user()->role === 'admin'" and append " || Auth::user()->role === 'director'"
$newContent = str_replace(
    "Auth::user()->role === 'admin'", 
    "Auth::user()->role === 'admin' || Auth::user()->role === 'director'", 
    $content
);

// Specifically fix any double replacements if I ran it twice or if logic overlaps (unlikely with this exact string)
// e.g. "Auth::user()->role === 'admin' || Auth::user()->role === 'director' || Auth::user()->role === 'director'"
$newContent = str_replace(
    " || Auth::user()->role === 'director' || Auth::user()->role === 'director'",
    " || Auth::user()->role === 'director'",
    $newContent
);

file_put_contents($filePath, $newContent);

echo "Updated sidebar.blade.php successfully.\n";
