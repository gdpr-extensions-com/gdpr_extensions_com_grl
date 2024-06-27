<?php

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') || die();




(static function() {

    if ((int)\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version() < 12) {
        if (!array_key_exists('gdpr', $GLOBALS['TBE_MODULES'])) {
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
                'gdpr',
                '',
                '',
                null,
                [
                    'labels' => 'LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_mod_web.xlf',
                    'iconIdentifier' => 'gdpr_extensions_com_tab',
                    'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
                    'name' => 'gdpr'
                ]
            );
        }
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'GdprExtensionsComGrl',
            'gdpr',
            'gdprreviewlist',
            '',
            [
                \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprManagerController::class => 'list,index, show, new, create, edit, update, delete,uploadImage, manageReview',
                \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprGoogleReviewListController::class => 'list, index',

            ],
            [
                'access' => 'user,group',
                'icon'   => 'EXT:gdpr_extensions_com_grl/Resources/Public/Icons/ReviewLogo.svg',
                'labels' => 'LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_gdprmanager.xlf',
            ]
        );
    }



    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_GdprExtensionsComGrl_domain_model_googlereviewlist', 'EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_csh_tx_GdprExtensionsComGrl_domain_model_googlereviewlist.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_GdprExtensionsComGrl_domain_model_googlereviewlist');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gdprextensionscomyoutube_domain_model_gdprmanager', 'EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_csh_tx_gdprextensionscomyoutube_domain_model_gdprmanager.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gdprextensionscomyoutube_domain_model_gdprmanager');
})();
