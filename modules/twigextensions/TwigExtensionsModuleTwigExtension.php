<?php
/**
 * twigExtensions module for Craft CMS 3.x
 *
 * Extending Twig for more functionality.
 *
 * @copyright Copyright (c) 2020 Francis Drouin
 */

namespace modules\twigextensionsmodule\twigextensions;

use modules\twigextensionsmodule\TwigExtensionsModule;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Francis Drouin
 * @package   TwigExtensionsModule
 * @since     1.0.0
 */
class TwigExtensionsModuleTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'TwigExtensionsModule';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('something', [$this, 'someFilter']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('findWordPosition', [$this, 'findWordPositionFunction']),
            new \Twig_SimpleFunction('findPeriodPosition', [$this, 'findPeriodPositionFunction']),
            new \Twig_SimpleFunction('setKeywordBold', [$this, 'setKeywordBoldFunction']),
        ];
    }

    /**
     *  This function returns a string or an array with
     *  all occurrences of search in subject (ignoring case)
     *  replaced with the given replace value.
     *
     * @param subject
     * The string or array being searched and replaced on, otherwise known as the haystack.
     *
     * @param search
     * The value being searched for, otherwise known as the needle.
     *
     * @return string
     */

    public function setKeywordBoldFunction($search, $subject)
    {
        return preg_replace("/\b($search)\b/i", "<strong>$1</strong>", $subject);
    }

     /**
     *  Find the position of the first occurrence of a substring in a string
     *
     * @param haystack
     * The string or array being searched and replaced on, otherwise known as the haystack.
     *
     * @param needle
     * The keyword that we are looking for
     *
     * @return int
     */
    public function findWordPositionFunction($haystack, $needle)
    {
        $haystack = str_replace(['.',','],'',$haystack); //This will remove the period and comma form a word
        $arrHaystack = explode(" ", $haystack);
        $arrNeedle = explode(" ", $needle);
        return array_search(strtolower($arrNeedle[0]),  array_map('strtolower', $arrHaystack));
    }

}
