<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bcrypt Library
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Bccrypt Library
 * @author      Kader Bouyakoub <bkader@mail.com>
 * @link        @KaderBouyakoub
 */

class Bcrypt
{
    private $_rounds;
    private $_salt_prefix;

    /**
     * Constructor
     */
    function __construct($config = array())
    {
        // Make cure we can use CRYPT_BLOWFISH
        if (CRYPT_BLOWFISH != 1)
        {
            throw new Exception("Bcrypt is not supported in this installation.");
        }

        // Load the config file !
        $this->_rounds      = isset($config['rounds']) ? $config['rounds'] : 7;
        $this->_salt_prefix = isset($config['salt_prefix']) ? $config['salt_prefix'] : "$2y$";
    }

    /**
     * Hash Password
     *
     * @access  public
     * @param   string
     * @return  string
     */
    public function hash($str, $salt = false)
    {
        $salt OR $salt = $this->get_salt();
        $hashed = crypt($str, $salt);
        return (strlen($hashed) > 13) ? $hashed : false;
    }

    /**
     * Compare between plain text and hashed password
     *
     * @access  public
     * @param   string
     * @param   string
     * @return  boolean
     */
    public function check($str, $hashed_str)
    {
        $hashed = crypt($str, $hashed_str);
        return $hashed === $hashed_str;
    }

    /* ==================================================================
     * PRIVATE METHODS
     * ================================================================== */

    /**
     * Get SALT
     *
     * @access  private
     * @param   void
     * @return  string
     */
    public function get_salt()
    {
        $salt  = sprintf($this->_salt_prefix.'%02d$', $this->_rounds);
        $bytes = $this->get_random_bytes(16);
        $salt  .= $this->encode_bytes($bytes);
        return $salt;
    }

    /**
     * Get random bytes
     *
     * @access  private
     * @param   integer
     * @return  string
     */
    private $_random_state = null;
    private function get_random_bytes($length = 16)
    {
        $bytes = '';

        // We check if 'openssl_random_pseudo_bytes' exists
        // and make sure to ignore it if on windows as it is
        // TOO SLOW !
        if (function_exists('openssl_random_pseudo_bytes') and strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
        {
            $bytes = openssl_random_pseudo_bytes($length);
        }

        if ($bytes === '' and @is_readable('/dev/urandom') and
            ($h_rand = @fopen('/dev/urandom', 'rb')) !== false)
        {
            $bytes = fread($h_rand, $length);
            fclose($h_rand);
        }

        // In case length of "bytes" is less then the
        // wanted length, WE MANAGE ;)
        if (strlen($bytes) < $length)
        {
            $bytes = '';
            if ($this->_random_state === null)
            {
                $this->_random_state = microtime();
                if (function_exists('getmypid'))
                {
                    $this->_random_state = getmypid();
                }
            }

            for($i = 0; $i < $length; $i += 16)
            {
                $this->_random_state = md5(microtime().$this->_random_state);
                if (PHP_VERSION >= '5')
                {
                    $bytes .= md5($this->_random_state, TRUE);
                }
                else
                {
                    $bytes .= pack('H*', md5($this->_random_state));
                }
            }

            $bytes = substr($bytes, 0, $length);
        }
        return $bytes;
    }

    /**
     * Encode Bytes
     *
     * @access  private
     * @param   string
     * @return  string
     */
    private function encode_bytes($str)
    {
        $itoa64  = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        // We start encoding
        $encoded = '';
        $i       = 0;

        do
        {
            $c1 = ord($str[$i++]);
            $encoded .= $itoa64[$c1 >> 2];
            $c1 = ($c1 & 0x03) << 4;
            if ($i >= 16)
            {
                $encoded .= $itoa64[$c1];
                break;
            }

            $c2 = ord($str[$i++]);
            $c1 |= $c2 >> 4;
            $encoded .= $itoa64[$c1];
            $c1 = ($c2 & 0x0f) << 2;

            $c2 = ord($str[$i++]);
            $c1 |= $c2 >> 6;
            $encoded .= $itoa64[$c1];
            $encoded .= $itoa64[$c2 & 0x3f];
        } while(1);
        return $encoded;
    }
}

/* End of file Bcrypt.php */
/* Location: ./application/libraries/Bcrypt.php */
