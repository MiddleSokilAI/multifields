<?php $config = ['settings' => [], 'templates' => []];
$currentTemplateId = (int)($_REQUEST['template'] ?? $GLOBALS['content']['template'] ?? 0);
$path = __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR;

if (in_array($currentTemplateId, [1], true)) {
    if (class_exists(\Seiger\sGallery\sGallery::class)) {
        $config['templates'] = array_merge(
            include $path . 'hero_slider_sgallery.php',
            $config['templates'],
        );
    }

    if (class_exists(\Seiger\sArticles\sArticles::class)) {
        $config['templates'] = array_merge(
            $config['templates'],
            include $path . 'last_sarticles.php',
        );
    }
}

$config['templates'] = array_merge(
    $config['templates'],
    include $path . 'richtext.php',
    include $path . 'cards.php',
    include $path . 'logos.php',
);

if (class_exists(\Seiger\sGallery\sGallery::class)) {
    $config['templates'] = array_merge(
        $config['templates'],
        include $path . 'slider_sgallery.php',
    );
}

return $config;
