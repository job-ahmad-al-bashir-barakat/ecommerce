<?php

return [
    'category' => [
        'model'   => \App\Category::class,
        'conditions' => [
            ["category_type_id" , '=' ,'request:key']
        ]
    ],

    'author-role' => [
        'model'   => \App\AuthorRole::class,
    ],

    'publisher-role' => [
        'model'   => \App\PublisherRole::class,
    ],

    'cover-type' => [
        'model'   => \App\CoverType::class,
    ],

    'product-type' => [
        'model'   => \App\ProductType::class,
    ],

    'product-size' => [
        'model'   => \App\ProductSize::class,
    ]
];