<?php return [
    'cards' => [
        'title' => __('multiFields::global.cards_block'),
        'label' => __('multiFields::global.cards_block'),
        'icon' => svg('tabler-layout-cards')->toHtml(),
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
            'cards_group' => [
                'title' => __('multiFields::global.cards_list'),
                'type' => 'row',
                'actions' => ['add'],
                'value' => false,
                'class' => 'col-12',
                'templates' => ['card'],
            ],
        ],
    ],
    'card' => [
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
            'title' => [
                'title' => __('multiFields::global.card_title'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'c-1 r-3',
            ],
        ],
    ],
];
