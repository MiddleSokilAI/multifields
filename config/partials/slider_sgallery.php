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
            'title' => [
                'title' => __('multiFields::global.section_title'),
                'type' => 'text',
                'placeholder' => __('multiFields::global.section_title'),
                'class' => 'col-10',
            ],
            'title_tag' => [
                'title' => __('multiFields::global.heading_tag'),
                'type' => 'select',
                'value' => 'h2',
                'elements' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                'class' => 'col-2',
            ],
            'position' => [
                'type' => 'id',
                'value' => __('multiFields::global.slider_position'),
                'class' => 'col-12',
            ],
        ],
    ],
];
