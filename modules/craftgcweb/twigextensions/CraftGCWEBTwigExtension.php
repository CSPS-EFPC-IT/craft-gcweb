<?php
/**
 * craftGCWEB module for Craft CMS 3.x
 *
 * New fitler and function in to use in Twig
 *
 * @copyright Copyright (c) 2020 Francis Drouin
 */

namespace modules\craftgcweb\twigextensions;

use modules\craftgcweb\CraftGCWEB;

use Craft;

/**
 * @author    Francis Drouin
 * @package   CraftGCWEBModule
 * @since     1.0.0
 */
class CraftGCWEBTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'CraftGCWEB';
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
