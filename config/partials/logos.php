<?php return [
    'logos' => [
        'title' => __('multiFields::global.logos_block'),
        'label' => __('multiFields::global.logos_block'),
        'icon' => svg('tabler-puzzle-2')->toHtml(),
        'type' => 'row',
        'actions' => ['move', 'hide', 'expand', 'del'],
        'value' => false,
        'class' => 'col-12',
        'items' => [
            'title' => [
                'title' => __('multiFields::global.section_title'),
                'type' => 'text',
                'placeholder' => __('multiFields::global.section_title'),
                'class' => 'col-12',
            ],
            'logos_group' => [
                'title' => __('multiFields::global.logos_list'),
                'type' => 'row',
                'actions' => ['add'],
                'value' => false,
                'class' => 'col-12',
                'templates' => ['logo'],
            ],
        ],
    ],
    'logo' => [
        'type' => 'row',
        'hidden' => true,
        'actions' => ['edit', 'del', 'move'],
        'value' => false,
        'class' => 'col-4',
        'items.class' => 'd-grid',
        'items' => [
            'thumb' => [
                'type' => 'thumb',
                'image' => 'image',
                'actions' => ['del', 'edit'],
                'class' => 'c-1 ce-3 r-1 re-3',
            ],
            'image' => [
                'title' => __('multiFields::global.image'),
                'type' => 'image',
                'thumb' => 'thumb',
                'placeholder' => '...',
                'class' => 'c-3 ce-8 r-1',
            ],
            'alt' => [
                'title' => __('multiFields::global.image_alt'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'c-8 r-1',
            ],
            'link' => [
                'title' => __('multiFields::global.link'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'c-3 r-2',
            ],
        ],
    ],
];
