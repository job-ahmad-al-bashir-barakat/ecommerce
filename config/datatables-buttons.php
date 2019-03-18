<?php

return [
    /*
     * Namespaces used by the generator.
     */
    'namespace' => [
        /*
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base' => 'DataTables',

        /*
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => '',
    ],

    /*
     * Set Custom stub folder
     */
    //'stub' => '/resources/custom_stub',

    /*
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator' => 'snappy',

    /*
     * Snappy PDF options.
     */
    'snappy' => [
        'options' => [
            'no-outline'    => true,
            'margin-left'   => '0',
            'margin-right'  => '0',
            'margin-top'    => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    /*
     * Default html builder parameters.
     */
    'parameters' => [
        'dom'        => "tr<'row m-0 pt-2 pb-2 border-top' <'col' i> <'col' p>>", // Bfrtip
        'scrollX'    => true,
        'order'      => [[1, 'desc']],
        "processing" => false,
        'drawCallback' => "function() { 
            var api = this.api();
            var container = api.table().container();
            
            /* nice scroll on table body */
            $('.table[id]',container).parent().niceScroll({
                cursorwidth: '7.5px',
                cursorcolor: 'rgba(105, 105, 105, 0.78)'
            });
         }",
        'buttons' => [
            'create',
            'export',
            'print',
            'reset',
            'reload',
        ],
    ],
];
