<?php return [
    'hero_slider_sgallery' => [
        'title' => __('multiFields::global.hero_slider_block'),
        'label' => __('multiFields::global.hero_slider_block'),
        'icon' => svg('tabler-slideshow')->toHtml(),
        'type' => 'row',
        'actions' => ['move', 'hide', 'expand', 'del'],
        'value' => false,
        'class' => 'col-12',
        'limit' => 1,
        'items' => [
            'position' => [
                'type' => 'id',
                'value' => __('multiFields::global.hero_slider_position'),
                'class' => 'col-12',
            ],
        ],
    ],
];
