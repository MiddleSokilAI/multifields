<?php return [
    'richtext' => [
        'title' => __('multiFields::global.richtext_block'),
        'label' => __('multiFields::global.richtext_block'),
        'icon' => svg('tabler-text-size')->toHtml(),
        'type' => 'row',
        'actions' => ['move', 'hide', 'expand', 'del'],
        'value' => false,
        'class' => 'col-12',
        'items.class' => 'd-block',
        'items' => [
            'content' => [
                'type' => 'richtext',
                'class' => 'col-12',
            ],
        ],
    ],
];
