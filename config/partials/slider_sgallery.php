<?php return [
    'slider_sgallery' => [
        'title' => __('multiFields::global.slider_block'),
        'label' => __('multiFields::global.slider_block'),
        'icon' => svg('tabler-slideshow')->toHtml(),
        'type' => 'row',
        'actions' => ['move', 'hide', 'expand', 'del'],
        'value' => false,
        'class' => 'col-12',
        'limit' => 1,
        'items' => [
            'position' => [
                'type' => 'id',
                'value' => __('multiFields::global.slider_position'),
                'class' => 'col-12',
            ],
        ],
    ],
];
