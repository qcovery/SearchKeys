<?php
/**
 * Search box view helper
 */
namespace SearchKeys\View\Helper\SearchKeys;
use VuFind\Search\Options\PluginManager as OptionsManager;

class SearchBox extends \VuFind\View\Helper\Root\SearchBox
{
    /**
     * Configuration for search box.
     *
     * @var array
     */
    protected $searchkeysConfig;

    /**
     * Constructor
     *
     * @param OptionsManager $optionsManager    Search options plugin manager
     * @param array          $config            Configuration for search box
     * @param array          $searchkeysConfig  Configuration for searchkeys
     * @param array          $placeholders      Array of placeholders keyed by
     * backend
     * @param array          $alphabrowseConfig source => label config for
     * alphabrowse options to display in combined box (empty for none)
     */
    public function __construct(OptionsManager $optionsManager, $config = [],
        $searchkeysConfig = [], $placeholders = [], $alphabrowseConfig = []
    ) {
        $this->searchkeysConfig = $searchkeysConfig;
        parent::__construct($optionsManager, $config, $placeholders, $alphabrowseConfig);
    }

    /**
     * Get an array of information on search handlers for use in generating a
     * drop-down or hidden field. Returns an array of arrays with 'value', 'label',
     * 'indent' and 'selected' keys.
     *
     * @param string $activeSearchClass Active search class ID
     * @param string $activeHandler     Active search handler
     *
     * @return array
     */
    public function getHandlers($activeSearchClass, $activeHandler)
    {
        $handlers = [];
        $keyClass = 'keys-' . strtolower($activeSearchClass);
        $searchKeys = [];
        if (isset($this->searchkeysConfig[$keyClass])) {
            $searchKeys = $this->searchkeysConfig[$keyClass];
        }
        $keyClass = 'phraseKeys-' . strtolower($activeSearchClass);
        if (isset($this->searchkeysConfig[$keyClass])) {
            foreach ($this->searchkeysConfig[$keyClass] as $searchKey) {
                $searchKeys[] = $searchKey;
            }
        }
        $searchKeys = array_unique($searchKeys);
        foreach( $searchKeys as $key => $value) {
            $handlers[] = [
                'value' => $value, 'label' => $value, 'indent' => false, 'selected' => ($activeHandler == $value)
            ];
        }
        return $handlers;
    }

    /**
     * Get an array of information on search handlers for use in generating a
     * drop-down or hidden field.
     *
     * @param string $activeSearchClass Active search class ID
     *
     * @return array
     */
    public function getAdvancedHandlers($activeSearchClass) {
        $handlers = [];
        $keyClass = 'keys-' . strtolower($activeSearchClass);
        foreach($this->searchkeysConfig[$keyClass] as $key => $value) {
            $handlers[$value] = $value;
        }
        return $handlers;
    }

}
?>

