<?php
/**
 * CraftGCWeb module for Craft CMS 3.x
 *
 * Handle common logic for the base framework
 *
 * @link      https://github.com/CSPS-EFPC-IT/craft-gcweb/
 * @copyright Copyright (c) 2020 CSPS
 */

namespace modules\craftgcweb;

use modules\craftgcweb\twigextensions\CraftGCWEBTwigExtension;

use Craft;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use yii\base\Event;
use yii\base\Module;

class CraftGCWeb extends Module
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftGCWeb
     */
    public static $instance;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/craftgcweb', $this->getBasePath());

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        self::$instance = $this;

        //Register twig extensions
        Craft::$app->view->registerTwigExtension(new CraftGCWEBTwigExtension());

        // Register site routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function(RegisterUrlRulesEvent $event) {
                $event->rules = array_merge($event->rules, [
                    // URL => Module/Controller/Method
                    'actions/craftgcweb/report-problem' => 'craftgcweb/report-problem/index',
                ]);
            }
        );
    }

    // Protected Methods
    // =========================================================================
    // ...
}
