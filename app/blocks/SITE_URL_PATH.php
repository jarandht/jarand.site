<h2 class="SITE_URL_PATH">

<?php
$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Split the path into segments and remove empty segments
$url_parts = array_filter(explode('/', trim($url_path, '/')));

// Skip the first segment if necessary (if there is more than one segment)
if (count($url_parts) > 1) {
    array_shift($url_parts);
}

// Convert all segments to lowercase and replace underscores with spaces
$url_parts = array_map(function($part) {
    return str_replace('_', ' ', strtolower($part));
}, $url_parts);

// Concatenate all segments
$full_path = implode('/', $url_parts);

// Output the full path
echo $full_path;
?>

</h2>
