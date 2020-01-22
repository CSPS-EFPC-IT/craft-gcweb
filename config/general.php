<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => getenv('SECURITY_KEY'),

        // Whether to save the project config out to config/project.yaml
        // (see https://docs.craftcms.com/v3/project-config.html)
        'useProjectConfigFile' => true,

        // Path to error templates
        'errorTemplatePrefix' => '_errors/',

        // Allow extra file types to be uploaded in assets
        'extraAllowedFileExtensions' => ['xml', 'css'],

        // List of additional file types Craft should support
        'extraFileKinds' => [
            'stylesheet' => [
                'label' => 'CSS',
                'extensions' => ['css'],
            ],
        ],

        // Aliases
        'aliases' => [
            '@default_site_url'    => getenv('DEFAULT_SITE_URL'),
            '@default_site_url_en' => getenv('DEFAULT_SITE_URL') . '/en',
            '@default_site_url_fr' => getenv('DEFAULT_SITE_URL') . '/fr',
            '@project_root_path'   => getenv('ROOT_PATH'),
            '@server_root_path'    => getenv('ROOT_PATH') . '/web',
            '@uploads_path'        => getenv('ROOT_PATH') . '/web/uploads',
        ],
    ],

    // Dev environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
        'devMode' => true,
    ],

    // Staging environment settings
    'staging' => [
        // Set this to `false` to prevent administrative changes from being made on staging
        'allowAdminChanges' => true,
    ],

    // Production environment settings
    'production' => [
        // Set this to `false` to prevent administrative changes from being made on production
        'allowAdminChanges' => true,
    ],
];
