<?php

namespace CodingStandard\Util;

use PHP_CodeSniffer\Util\Common as BaseCommon;

/**
 * Common
 *
 * Extrends common functions.
 *
 * @author Louis Linehan <louis@greynoise.co.uk>
 */
class Common extends BaseCommon
{

    /**
     * A list of all PHP magic methods.
     *
     * @var array
     */
    public static $magicMethods = array(
        'construct'  => true,
        'destruct'   => true,
        'call'       => true,
        'callstatic' => true,
        'get'        => true,
        'set'        => true,
        'isset'      => true,
        'unset'      => true,
        'sleep'      => true,
        'wakeup'     => true,
        'tostring'   => true,
        'set_state'  => true,
        'clone'      => true,
        'invoke'     => true,
        'debuginfo'  => true,
    );

    /**
     * Allowed public methodNames
     *
     * @var array
     */
    public static $publicMethodNames = array('_remap' => true);


    /**
     * Is lower snake case
     *
     * @param string $string The string to verify.
     *
     * @return boolean
     */
    public static function isLowerSnakeCase($string)
    {
        if (strcmp($string, strtolower($string)) !== 0) {
            return false;
        }

        if (strpos($string, ' ') !== false) {
            return false;
        }

        return true;

    }//end isLowerSnakeCase()


    /**
     * Has an underscore prefix
     *
     * @param string $string The string to verify.
     *
     * @return boolean
     */
    public static function hasUnderscorePrefix($string)
    {
        if (strpos($string, '_') !== 0) {
            return false;
        }

        return true;

    }//end hasUnderscorePrefix()


    /**
     * Pluralize
     *
     * Basic pluralize intended for use in error messages
     * tab/s, space/s, error/s etc.
     *
     * @param string $string String.
     * @param float  $num    Number.
     *
     * @return string
     */
    public static function pluralize($string, $num)
    {
        if ($num > 1) {
            return $string.'s';
        } else {
            return $string;
        }

    }//end pluralize()


}//end class