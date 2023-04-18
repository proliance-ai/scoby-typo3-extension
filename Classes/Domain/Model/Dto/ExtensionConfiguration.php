<?php
declare(strict_types=1);

namespace Dse\Scoby\Domain\Model\Dto;

use TYPO3\CMS\Core\SingletonInterface;

class ExtensionConfiguration implements SingletonInterface
{

    /** @var string */
    protected $apiKey = '';

    /** @var string */
    protected $saltHere = '';

    /** @var string */
    protected $ipBlacklisting = '';

    public function __construct()
    {
        $settings = (array)$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['dse_scoby'];
        if (!empty($settings)) {
            $this->apiKey = (string)$settings['apiKey'];
            $this->saltHere = (string)$settings['saltHere'];
            $this->ipBlacklisting = (string)$settings['ipBlacklisting'];
        }
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getSaltHere(): string
    {
        return $this->saltHere;
    }

    /**
     * @return string
     */
    public function getIpBlacklisting(): string
    {
        return $this->ipBlacklisting;
    }

}
