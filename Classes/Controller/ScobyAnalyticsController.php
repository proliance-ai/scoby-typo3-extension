<?php

namespace Dse\Scoby\Controller;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use Dse\Scoby\Analytics\Client as ScobyClient;
use Dse\Scoby\Domain\Model\Dto\ExtensionConfiguration as ExtensionConfiguration;


class ScobyAnalyticsController
{
    /**
     * Insert getcod js in pages to collect visit data for analytics
     *
     * @param array $parameter
     */
    public function writeScobyAnalytics(array $parameter)
    {
        if (TYPO3_MODE === 'FE') {

            $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

            if (!empty($extensionConfiguration->getApiKey()) && !empty($extensionConfiguration->getSaltHere())) {

                $client = new ScobyClient($extensionConfiguration->getApiKey(), $extensionConfiguration->getSaltHere());

                if (!empty($extensionConfiguration->getIpBlacklisting())) {
                    $ipsBlack = $extensionConfiguration->getIpBlacklisting();
                    $ipsBlackArray = explode( ';', $ipsBlack);
                    if (isset($ipsBlackArray)) {
                        foreach($ipsBlackArray as $ipBlack) {
                            $client->blacklistIpRange($ipBlack);
                        }
                    }
                }


                $client->logPageViewAsync();
                /*
                $client
                    ->setIpAddress('1.2.3.4')
                    ->setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:103.0) Gecko/20100101 Firefox/103.0')
                    ->setVisitorId('some-anonymous-identifier')
                    ->setRequestedUrl('https://example.com/some/path?and=some&query=parameters')
                    ->setReferringUrl('https://eyample.com/the/page/that?was=visited&before=yay')
                    ->logPageViewAsync();*/
            }
        }

        if (TYPO3_MODE === 'BE') {

        }

    }


    /**
     * Get the account configuration data
     *
     * @return string
     */
    protected function getData($name): string
    {
        $tsfe = $this->getTypoScriptFrontendController();
        $sysTemplate = $tsfe->cObj->getRecords('sys_template', [
            'pidInList' => $tsfe->cObj->getData('leveluid:0'),
            'max' => 1,
        ]);

        // Returns the account name from the sys_template record
        if (isset($sysTemplate[0][$name])) {
            return $sysTemplate[0][$name];
        }

        return "";
    }


    /**
     * @return PageRenderer
     */
    protected function getPageRenderer(): PageRenderer
    {
        return GeneralUtility::makeInstance(PageRenderer::class);
    }


    /**
     * @return TypoScriptFrontendController
     */
    protected function getTypoScriptFrontendController(): TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'] ?? GeneralUtility::makeInstance(TypoScriptFrontendController::class);
    }
}
