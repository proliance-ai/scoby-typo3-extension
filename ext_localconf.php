<?php
defined('TYPO3_MODE')  OR  die ('Access denied.');

$extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Dse\Scoby\Domain\Model\Dto\ExtensionConfiguration::class);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] =
    \Dse\Scoby\Controller\ScobyAnalyticsController::class . '->writeScobyAnalytics';

