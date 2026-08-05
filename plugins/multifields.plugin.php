<?php

use Event;
use Multifields\Base\Core;

Event::listen('evolution.OnManagerMainFrameHeaderHTMLBlock', function () {
    if (in_array(evo()->manager->action, [3, 4, 17, 27, 72, 112])) {
        return Core::getInstance()->getStartScripts();
    }
});

Event::listen('evolution.OnManagerPageInit', function () {
    if (isset($_REQUEST['mf-action']) && !empty($_REQUEST['action'])) {
        $className = !empty($_REQUEST['class']) ? $_REQUEST['class'] : '';

        header('Content-Type: application/json; charset=UTF-8');

        if (class_exists($className)) {
            $class = new $className();
            $method = 'action' . ucfirst(strtolower($_REQUEST['action']));
            if (is_callable([$class, $method])) {
                try {
                    echo $class->$method($_REQUEST);
                } catch (\Throwable $exception) {
                    echo json_encode(['error' => (string)$exception], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode(['error' => 'Method ' . $method . ' not found in class ' . $className . '!'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode(['error' => 'Class ' . $className . ' not found!'], JSON_UNESCAPED_UNICODE);
        }

        exit;
    }
});
