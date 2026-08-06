<?php return [
    'faq' => [
        'title' => __('multiFields::global.faq_block'),
        'label' => __('multiFields::global.faq_block'),
        'icon' => svg('tabler-message-question')->toHtml(),
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
            'description' => [
                'title' => __('global.description'),
                'type' => 'richtext',
                'class' => 'col-12',
            ],
            'faq_group' => [
                'title' => __('multiFields::global.faq_list'),
                'type' => 'row',
                'actions' => ['add'],
                'value' => false,
                'class' => 'col-12',
                'templates' => ['faq_item'],
            ],
        ],
    ],
    'faq_item' => [
        'type' => 'row',
        'hidden' => true,
        'actions' => ['edit', 'del', 'move'],
        'value' => false,
        'class' => 'col-12',
        'items' => [
            'question' => [
                'title' => __('multiFields::global.question'),
                'type' => 'text',
                'placeholder' => __('multiFields::global.question'),
                'class' => 'col-12',
            ],
            'answer' => [
                'title' => __('multiFields::global.answer'),
                'type' => 'richtext',
                'class' => 'col-12',
            ],
        ],
    ],
];
