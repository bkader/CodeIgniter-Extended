<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Config extends CI_Config
{
    /**
     * Get a config item and return a
     * default valueif it does not exist
     *
     * @param   mixed
     * @param   mixed
     * @return  mixed
     */
    public function get($item, $default = false)
    {
        return $this->dot($this->config, $item, $default);
    }

    /**
     * Access multidimensional array using
     * dot-notation method.
     *
     * @param   array
     * @param   string
     * @param   mixed
     * @return  mixed
     */
    private function dot(&$arr, $path = null, $default = false)
    {
        if ( ! $path)
        {
            user_error(__("Missing array path for array"), E_USER_WARNING);
        }
        $parts = explode(".", $path);
        $path  =& $arr;
        foreach ($parts as $e)
        {
            if ( ! isset($path[$e]) or empty($path[$e]))
            {
                return $default;
            }
            $path =& $path[$e];
        }
        return $path;
    }
}

/* End of file MY_Config.php */
/* Location: ./application/core/MY_Config.php */
