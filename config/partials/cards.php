<?php return [
    'cards' => [
        'title' => __('multiFields::global.cards_block'),
        'label' => __('multiFields::global.cards_block'),
        'icon' => svg('tabler-layout-cards')->toHtml(),
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
        'class' => 'col-4 mf-layout-thumb',
        'items.class' => 'd-block',
        'items' => [
            'thumb' => [
                'type' => 'thumb',
                'image' => 'image',
                'actions' => ['del', 'edit'],
                'class' => 'col-2 float-left',
            ],
            'image' => [
                'title' => __('multiFields::global.image'),
                'type' => 'image',
                'thumb' => 'thumb',
                'placeholder' => '...',
                'class' => 'col-5 float-left',
            ],
            'alt' => [
                'title' => __('multiFields::global.image_alt'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'col-5 float-left',
            ],
            'link' => [
                'title' => __('multiFields::global.link'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'col-10 float-left',
            ],
            'title' => [
                'title' => __('multiFields::global.card_title'),
                'type' => 'text',
                'placeholder' => '...',
                'class' => 'col-12',
            ],
        ],
    ],
];
