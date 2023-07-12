<?php
namespace SearchKeys\Module\Configuration;

$config = [
    'service_manager' => [
        'allow_override' => true,
        'aliases' => [
            'search2' => 'SearchKeys\Search\Search2\Params',
            'solr' => 'SearchKeys\Search\Solr\Params',
            'VuFind\Search\Solr\Params' => 'SearchKeys\Search\Solr\Params',
        ],
        'factories' => [
            'VuFind\Search\Primo\Params' => 'SearchKeys\Search\Params\ParamsFactory',
            'SearchKeys\Search\Search2\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
            'SearchKeys\Search\Solr\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
            'SearchKeys\Search\SearchKeysHelper' => 'SearchKeys\Search\SearchKeysHelperFactory',
            'SearchKeys\View\Helper\SearchKeys\SearchBox' => 'SearchKeys\View\Helper\SearchKeys\SearchBoxFactory',
        ],
    ],
];

return $config;

