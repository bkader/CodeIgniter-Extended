<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Part of CodeIgniter-Extended
 *
 * Using dot-notation to access array value
 *
 * @package     CodeIgniter-Extended
 * @author      Kader Bouyakoub
 * @link        @bkader <github>
 * @link        @KaderBouyakoub <twitter>
 */

class CI_Dot
{
    public static function get($index, array $array)
    {
        $index = explode('.', $index);
        return self::getValue($index, $array);
    }
    private static function getValue($index, $value)
    {
        if (is_array($index) and count($index))
        {
            $current_index = array_shift($index);
        }
        if (
            is_array($index) and
            count($index) and
            is_array($value[$current_index]) and
            count($value[$current_index]))
        {
            return self::getValue($index, $value[$current_index]);
        }
        else
        {
            return $value[$current_index];
        }
    }
}

// Create an alias of the class above.
class_alias('CI_Dot', 'Dot');

/* End of file Dot.php */
/* Location: ./application/libraries/Dot.php */