<?php
/**
 * multifields
 *
 * Creating custom fields for documents
 *
 * @category    plugin
 * @version     2.0
 * @package     evo
 * @internal    @properties &multifields_storage=Data storage;list;default,files,database;default &multifields_debug=Plugin debug;list;no,yes;no
 * @internal    @events OnAfterLoadDocumentObject,OnWebPageInit,OnBeforeManagerPageInit,OnManagerPageInit,OnManagerMainFrameHeaderHTMLBlock,OnDocFormDelete,OnDocFormSave
 * @internal    @modx_category Manager and Admin
 * @internal    @installset base,sample
 * @author      64j
 */

//@TODO в гетинстанс прокинуть параметры

if(!function_exists('mfc')){
    function mfc($params = []) {
        return \Multifields\Base\Core::getInstance($params);
    }
}

Event::listen('evolution.OnManagerMainFrameHeaderHTMLBlock', function ($params) {
    if (in_array(evo()->manager->action, [3, 4, 17, 27, 72, 112])) {
        return mfc()->getStartScripts();
    }
});

Event::listen('evolution.OnManagerPageInit', function ($params) {
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
                    echo json_encode([
                        'error' => (string)$exception
                    ], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode([
                    'error' => 'Method ' . $method . ' not found in class ' . $className . '!'
                ], JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode([
                'error' => 'Class ' . $className . ' not found!'
            ], JSON_UNESCAPED_UNICODE);
        }

        exit;
    }
});

Event::listen('evolution.OnDocFormSave', function ($params) {
    mfc()->saveData();
});

Event::listen('evolution.OnDocFormDelete', function ($params) {
    mfc()->deleteData();
});

