<?php $config = ['settings' => [], 'templates' => []];
$currentTemplateId = (int)($_REQUEST['template'] ?? $GLOBALS['content']['template'] ?? 0);
$path = __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR;

if (in_array($currentTemplateId, [1], true)) {
    $config['templates'] = array_merge(
        include $path . 'slider_sgallery.php',
        $config['templates'],
    );
}

$config['templates'] = array_merge(
    $config['templates'],
    include $path . 'cards.php',
);

return $config;
