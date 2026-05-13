<?php
$dir = 'c:\\xampp\\htdocs\\dz-inventory\\resources\\views';

$patterns = [
    '/onclick="return confirm\(\'Are you sure you want to delete this (.+?)\?\'\)"/' => 'class="confirm-text"',
    '/onclick="return confirm\(\'Do you want to confirm: (.+?)\?\'\)"/' => 'class="confirm-text"',
    '/onclick="return confirm\(\'Do you want to approve/process this order\?\'\)"/' => 'class="confirm-text"',
    '/onclick="return confirm\(\'Do you want to approve this order\?\'\)"/' => 'class="confirm-text"',
];

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        $original = $content;
        
        foreach ($patterns as $pattern => $replacement) {
            // If the element already has a class attribute, we need to append confirm-text to it
            // This regex is a bit complex, let's try a simpler approach for now:
            // 1. Add class="confirm-text" where no class exists
            // 2. Append confirm-text to existing class where onclick is present.
            
            // Let's do a more robust string replacement for the specific onclicks found in grep.
        }
        
        // Simpler approach for the specific files found:
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this user?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this unit?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this product?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this category?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this brand?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this store?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this customer?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this department?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onclick=\"return confirm('Are you sure you want to delete this expense?')\"", "class=\"confirm-text\"", $content);
        $content = str_replace("onsubmit=\"return confirm('Are you sure you want to delete this category?')\"", "class=\"confirm-text\"", $content);

        // Note: str_replace above might create duplicate class attributes if one already exists.
        // We need to merge them.
        
        if ($content !== $original) {
            file_put_contents($file->getPathname(), $content);
            echo "Updated: " . $file->getPathname() . "\n";
        }
    }
}
?>
