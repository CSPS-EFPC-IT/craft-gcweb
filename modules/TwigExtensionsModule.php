<?php
/**
 * twigExtensions module for Craft CMS 3.x
 *
 * Extending Twig for more functionality.
 *
 * @link      https://github.com/fdrouin89
 * @copyright Copyright (c) 2020 Francis Drouin
 */

namespace modules\twigextensionsmodule;

use modules\twigextensionsmodule\twigextensions\TwigExtensionsModuleTwigExtension;

use Craft;
use craft\events\RegisterTemplateRootsEvent;
use craft\events\TemplateEvent;
use craft\i18n\PhpMessageSource;
use craft\web\View;

use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\Module;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Francis Drouin
 * @package   TwigExtensionsModule
 * @since     1.0.0
 *
 */
class TwigExtensionsModule extends Module
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this module class so that it can be accessed via
     * TwigExtensionsModule::$instance
     *
     * @var TwigExtensionsModule
     */
    public static $instance;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/twigextensionsmodule', $this->getBasePath());
        $this->controllerNamespace = 'modules\twigextensionsmodule\controllers';

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Set our $instance static property to this class so that it can be accessed via
     * TwigExtensionsModule::$instance
     *
     * Called after the module class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$instance = $this;

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new TwigExtensionsModuleTwigExtension());
    }

    // Protected Methods
    // =========================================================================
}
