<?php
namespace SearchKeys\Module\Configuration;

$config = [
    'service_manager' => [
        'allow_override' => true,
        'aliases' => [

        ],
        'factories' => [
            'SearchKeys\Search\SearchKeysHelper' => 'SearchKeys\Search\SearchKeysHelperFactory',
            'SearchKeys\View\Helper\SearchKeys\SearchBox' => 'SearchKeys\View\Helper\SearchKeys\SearchBoxFactory',
        ],
    ],

    'vufind' => [
        'plugin_managers' => [
            'search_params' => [
                'factories' => [
                    'VuFind\Search\Primo\Params' => 'SearchKeys\Search\Params\ParamsFactory',
                    'SearchKeys\Search\Search2\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
                    'SearchKeys\Search\Solr\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
                ],
                'aliases' => [
                    'search2' => 'SearchKeys\Search\Search2\Params',
                    'solr' => 'SearchKeys\Search\Solr\Params',
                    'VuFind\Search\Solr\Params' => 'SearchKeys\Search\Solr\Params',
                    'VuFind\Search\Search2\Params' => 'SearchKeys\Search\Solr2\Params',
                ],
            ],
        ],
    ],
];

return $config;

