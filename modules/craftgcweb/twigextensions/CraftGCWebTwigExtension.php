<?php
/**
 * Add some custom twig functions to be used in template files.
 *
 * @author    Francis Drouin
 * @package   CraftGCWebModule
 * @since     1.0.0
 */

namespace modules\craftgcweb\twigextensions;

class CraftGCWebTwigExtension extends \Twig\Extension\AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'CraftGCWeb';
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     * {% set this = someFunction('something') %}
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('findWordPosition', [$this, 'findWordPositionFunction']),
            new \Twig\TwigFunction('setKeywordBold', [$this, 'setKeywordBoldFunction']),
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
        $search = str_replace(['/', '\\'], '', $search); // This will remove back slash and foward slash character
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
     * @return mixed
     */
    public function findWordPositionFunction($haystack, $needle)
    {
        $haystack = str_replace(['.', ','], '', $haystack); // This will remove the period and comma form a word
        $arrHaystack = explode(' ', $haystack);
        $arrNeedle = explode(' ', $needle);
        return array_search(strtolower($arrNeedle[0]), array_map('strtolower', $arrHaystack));
    }
}
