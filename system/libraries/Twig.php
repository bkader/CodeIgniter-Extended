<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Part of CodeIgniter Simple and Secure Twig
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/codeigniter-ss-twig
 */

require_once BASEPATH.'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();

class CI_Twig
{
	private $CI;
	private $config = array();

	private $functions_asis = array(
		'base_url', 'site_url'
	);
	private $functions_safe = array(
		'form_open', 'form_close', 'form_error', 'set_value', 'form_hidden'
	);

	/**
	 * @var bool Whether added CodeIgniter functions or not
	 */
	private $add_ci_functions = FALSE;

	/**
	 * @var Twig_Environment
	 */
	private $twig;

	/**
	 * @var Twig_Loader_Filesystem
	 */
	private $loader;

	/**
	 * HMVC
	 */
	private $module = null;

	public function __construct($params = array())
	{
		$this->CI =& get_instance();
		// default config
		$this->config = array(
			'paths' => array(VIEWPATH),
			'cache' => APPPATH.'/cache/twig',
		);
		if ( ! empty($params['twig']))
		{
			$this->config = array_merge($this->config, $params['twig']);
			$this->functions_asis = array_merge($this->functions_asis, $this->config['functions_asis']);
			$this->functions_safe = array_merge($this->functions_safe, $this->config['functions_safe']);
		}

		if (method_exists($this->CI->router, 'fetch_module'))
			$this->module = $this->CI->router->fetch_module();
		if ($this->module !== null)
			array_push($this->config['paths'], APPPATH.'modules/'.$this->module.'/views/');

		// Add some useful globals
		$this->addGlobal(array(
			'ENVIRONMENT' => ENVIRONMENT,
			'CI_VERSION'  => CI_VERSION,
			'FCPATH'      => FCPATH,
			'APPPATH'     => APPPATH,
			'BASEPATH'    => BASEPATH,
			'VIEWPATH'    => VIEWPATH,
			'DOMAIN'      => DOMAIN,
		));

		if (class_exists('CI_Session'))
			$this->addGlobal('session', $this->CI->session);

	}

	protected function resetTwig()
	{
		$this->twig = null;
		$this->createTwig();
	}

	protected function createTwig()
	{
		// $this->twig is singleton
		if ($this->twig !== null)
			return;

		$debug = (ENVIRONMENT === 'production') ? false : true;

		if ($this->loader === null)
		{
			$this->loader = new \Twig_Loader_Filesystem($this->config['paths']);
		}

		$twig = new \Twig_Environment($this->loader, array(
			'cache'      => $this->config['cache'],
			'debug'      => $debug,
			'autoescape' => true,
		));

		if ($debug)
			$twig->addExtension(new \Twig_Extension_Debug());

		$this->twig = $twig;
	}

	protected function setLoader($loader)
	{
		$this->loader = $loader;
	}

	/**
	 * Registers a Global
	 *
	 * @param string $name  The global name
	 * @param mixed  $value The global value
	 */
	public function addGlobal($name, $value = null)
	{
		$this->createTwig();
		if (is_array($name))
		{
			foreach ($name as $key => $val)
			{
				$this->twig->addGlobal($key, $val);
			}
		}
		else
		{
			$this->twig->addGlobal($name, $value);
		}
	}

	/**
	 * Renders Twig Template and Set Output
	 *
	 * @param string $view   Template filename without `.twig`
	 * @param array  $params Array of parameters to pass to the template
	 */
	public function display($view, $params = array())
	{
		$this->CI->output->set_output($this->render($view, $params));
	}

	/**
	 * Renders Twig Template and Returns as String
	 *
	 * @param string $view   Template filename without `.twig`
	 * @param array  $params Array of parameters to pass to the template
	 * @return string
	 */
	public function render($view, $params = array())
	{
		$this->createTwig();
		// We call addCIFunctions() here, because we must call addCIFunctions()
		// after loading CodeIgniter functions in a controller.
		$this->addCIFunctions();

		$view = $view.$this->config['ext'];
		return $this->twig->render($view, $params);
	}

	protected function addCIFunctions()
	{
		// Runs only once
		if ($this->add_ci_functions)
		{
			return;
		}

		// as is functions
		foreach ($this->functions_asis as $function)
		{
			if (function_exists($function))
			{
				$this->twig->addFunction(
					new \Twig_SimpleFunction(
						$function,
						$function
					)
				);
			}
		}

		// safe functions
		foreach ($this->functions_safe as $function)
		{
			if (function_exists($function))
			{
				$this->twig->addFunction(
					new \Twig_SimpleFunction(
						$function,
						$function,
						array('is_safe' => array(
							'html',
						))
					)
				);
			}
		}

		// customized functions
		if (function_exists('anchor'))
		{
			$this->twig->addFunction(
				new \Twig_SimpleFunction(
					'anchor',
					array($this, 'safe_anchor'),
					array('is_safe' => array(
						'html',
					))
				)
			);
		}

		$this->add_ci_functions = true;
	}

	/**
	 * @param string $uri
	 * @param string $title
	 * @param array  $attributes [changed] only array is acceptable
	 * @return string
	 */
	public function safe_anchor($uri = '', $title = '', $attributes = array())
	{
		$uri = html_escape($uri);
		$title = html_escape($title);

		$new_attr = array();
		foreach ($attributes as $key => $val)
		{
			$new_attr[html_escape($key)] = html_escape($val);
		}

		return anchor($uri, $title, $new_attr);
	}

	/**
	 * @return \Twig_Environment
	 */
	public function getTwig()
	{
		$this->createTwig();
		return $this->twig;
	}
}

/* End of file Twig.php */
/* Location: ./system/libraries/Twig.php */