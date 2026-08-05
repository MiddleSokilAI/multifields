<?php return [
    'last_sarticles' => [
        'title' => __('multiFields::global.last_sarticles_block'),
        'label' => __('multiFields::global.last_sarticles_block'),
        'icon' => svg('tabler-news')->toHtml(),
        'type' => 'row',
        'actions' => ['move', 'hide', 'expand', 'del'],
        'value' => false,
        'class' => 'col-12',
        'limit' => 1,
        'items' => [
            'title' => [
                'title' => __('multiFields::global.section_title'),
                'type' => 'text',
                'class' => 'col-12',
            ],
            'count' => [
                'title' => __('multiFields::global.last_sarticles_count'),
                'type' => 'number',
                'default' => 3,
                'class' => 'col-4',
            ],
            'link' => [
                'title' => __('multiFields::global.link'),
                'type' => 'text',
                'class' => 'col-4',
            ],
            'link_text' => [
                'title' => __('multiFields::global.last_sarticles_link_text'),
                'type' => 'text',
                'default' => __('multiFields::global.last_sarticles_more'),
                'class' => 'col-4',
            ],
        ],
    ],
];
