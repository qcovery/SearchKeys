<?php
/**
 * Search params plugin manager
 *
 * PHP version 7
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Search
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:plugins:record_drivers Wiki
 */
namespace SearchKeys\Search\Params;

/**
 * Search params plugin manager
 *
 * @category VuFind
 * @package  Search
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:plugins:record_drivers Wiki
 */
class PluginManager extends \VuFind\Search\Params\PluginManager
{
    /**
     * Default plugin aliases.
     *
     * @var array
     */
    protected $aliases = [
        'browzine' => 'VuFind\Search\BrowZine\Params',
        'combined' => 'VuFind\Search\Combined\Params',
        'eds' => 'VuFind\Search\EDS\Params',
        'eit' => 'VuFind\Search\EIT\Params',
        'emptyset' => 'VuFind\Search\EmptySet\Params',
        'favorites' => 'VuFind\Search\Favorites\Params',
        'libguides' => 'VuFind\Search\LibGuides\Params',
        'mixedlist' => 'VuFind\Search\MixedList\Params',
        'pazpar2' => 'VuFind\Search\Pazpar2\Params',
        'primo' => 'VuFind\Search\Primo\Params',
        'search2' => 'SearchKeys\Search\Search2\Params',
        'solr' => 'SearchKeys\Search\Solr\Params',
        'solrauth' => 'VuFind\Search\SolrAuth\Params',
        'solrauthor' => 'VuFind\Search\SolrAuthor\Params',
        'solrauthorfacets' => 'VuFind\Search\SolrAuthorFacets\Params',
        'solrcollection' => 'VuFind\Search\SolrCollection\Params',
        'solrreserves' => 'VuFind\Search\SolrReserves\Params',
        'solrweb' => 'VuFind\Search\SolrWeb\Params',
        'summon' => 'VuFind\Search\Summon\Params',
        'tags' => 'VuFind\Search\Tags\Params',
        'worldcat' => 'VuFind\Search\WorldCat\Params',
        'VuFind\Search\Solr\Params' => 'SearchKeys\Search\Solr\Params',
    ];

    /**
     * Default plugin factories.
     *
     * @var array
     */
    protected $factories = [
        'VuFind\Search\BrowZine\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Combined\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\EDS\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\EIT\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\EmptySet\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Favorites\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\LibGuides\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\MixedList\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Pazpar2\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Primo\Params' => 'SearchKeys\Search\Params\ParamsFactory',
        'SearchKeys\Search\Search2\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
        'SearchKeys\Search\Solr\Params' => 'SearchKeys\Search\Solr\ParamsFactory',
        'VuFind\Search\SolrAuth\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\SolrAuthor\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\SolrAuthorFacets\Params' =>
            'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\SolrCollection\Params' =>
            'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\SolrReserves\Params' =>
            'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\SolrWeb\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Summon\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\Tags\Params' => 'VuFind\Search\Params\ParamsFactory',
        'VuFind\Search\WorldCat\Params' => 'VuFind\Search\Params\ParamsFactory',
    ];

    /**
     * Constructor
     *
     * Make sure plugins are properly initialized.
     *
     * @param mixed $configOrContainerInstance Configuration or container instance
     * @param array $v3config                  If $configOrContainerInstance is a
     * container, this value will be passed to the parent constructor.
     */
    public function __construct($configOrContainerInstance = null,
        array $v3config = []
    ) {
        $this->addAbstractFactory('SearchKeys\Search\Params\PluginFactory');
        parent::__construct($configOrContainerInstance, $v3config);
    }
}
