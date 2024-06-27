<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComGrl',
        'googlereviewlist',
        [
            \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprGoogleReviewListController::class => 'index , showReviews'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprGoogleReviewListController::class => 'showReviews',
            \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComGrl',
        'gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComGrl\Controller\GdprCookieWidgetController::class => 'index'
        ],
        // non-cacheable actions
        [],
    );


    
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gdprcookiewidget {
                        iconIdentifier = gdpr_extensions_com_grl-plugin-googlereviewlist
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grl_googlereviewlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscomgrl_gdprcookiewidget
                        }
                    }
                }
                show = *
            }
       }'
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod.wizards.newContentElement.wizardItems {
               gdpr.header = LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_db.xlf:tx_GdprExtensionsComGrl_domain_model_googlereviewlist
        }'
    );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    googlereviewlist {
                        iconIdentifier = gdpr_extensions_com_grl-plugin-googlereviewlist
                        title = LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grl_googlereviewlist.name
                        description = LLL:EXT:gdpr_extensions_com_grl/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grl_googlereviewlist.description
                        tt_content_defValues {
                            CType = gdprextensionscomgrl_googlereviewlist
                        }
                    }
                }
                show = *
            }
       }'
    );
 
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\GdprExtensionsCom\GdprExtensionsComGrl\Commands\SyncReviewsTask::class] = [
        'extension' => 'GdprExtensionsComGrl',
        'title' => 'Fetch Google Reviews',
        'description' => 'Fetch google reviews from GDPR-extensions-com dashboard',
        'additionalFields' => \GdprExtensionsCom\GdprExtensionsComGrl\Commands\SyncReviewsTask::class,
    ];
    
    
})();
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \GdprExtensionsCom\GdprExtensionsComGrl\Hooks\DataHandlerHook::class;
if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['GdprExtensionsComGrl'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['GdprExtensionsComGrl'] = [
        'frontend' => \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class,
        'backend' => \TYPO3\CMS\Core\Cache\Backend\FileBackend::class,
        'groups' => ['all', 'GdprExtensionsComGrl'],
        'options' => [
            'defaultLifetime' => 3600, // Cache lifetime in seconds
        ],
    ];
}
