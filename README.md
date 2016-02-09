# CodeIgniter Extended

I am a very big **fan** of **CodeIgniter** ! I love the way the framework handles everything. Except for languages :)
It is nice to have all language lines inside an array but there is a much better way, the one I prefer, which is **gettext**.

This is why I added the [PHP-GETTEXT Library](https://launchpad.net/php-gettext/) replacing all core language lines with lines I added in a **.po** file that you can edit as you wish.

I also added [Gas ORM 2](http://www.codingdrama.com/gas-orm/) inside the __system__ folder that you can call like so:
```
// Or simply autoload it instead of the database library
$this->load->library('gas');
```

I also added the Uhoh *MY_Exceptions.php* file into "application/core/" folder.

I added **MY_Config.php** into __application/core/__ folder with a custom method **get** that you can call so : __$this->config->get(...)__ ! This will use a **DOT-NOTATION** which allows you to have _super_ multidimensional config file :) . i.e:
```
$config = array(
    'site' => array(
        'name' => 'Website',
        'description' => 'Lorem ipsum dolor sit amet',
    ),
);
```
To echo the site name for instance, you just do:
```
// Make sure the config file is first loaded ;)
echo  $this->config->get('site.name');  // Return: "Website"
```

You must have seen, as well, a _MY_Lang.php_ file inside the _application/core_ folder ! I simple edited the *line()* method so it can, _AS WELL_, use the *dot-notation* method. Example:

Let's suppose you have a language file 'main_lang.php' and that you loaded it.
```
$lang = array(
    'hello' => 'Hello, %s',
    'user_lives' => '%s lives in %s',   // We'll user it below
    'btn' => array(
        'home' => 'Home',
        'login' => 'Login',
        'Register' => 'Register',
    ),
    'form' => array(
        'label' => array(
            'username' => 'Username',
            'password' => 'Password',
        ),
    ),
);

// Do this :)
echo $this->lang->line('btn.home'); // Echos: "Home"
```
There is a cumstom _MY_Language_helper.php_ inside _application/helpers_ folder with custom functions: line() and _e()

_line()_ Takes 3 arguments: line, args and default. If the line was not found, the "default" will be used, but to pass it, you need to set _args_ to __*null*__
```
echo line('btn.home', null, 'Home'); // Echos: "Home"
_e('btn.home'); // Alias of the above function except that it echoes the line

// Using the line with args supplied
_e('hello', 'Kader', 'Hello, %s');
// Echoes "Hello, Kader"

_e('users_lives', array('Kader', 'Algeria'), '%s lives in %s');
// Echos "Kader lives in Algeria"
```

I also Included **Bcrypt** library and its helper (but you can use only the library)
```
$this->load->library('bcrypt');
echo $this->bcrypt->hash('PASSWORD'); // Salt can be passed as a second param
// To check the password
if ($this->bcrypt->check('PASSWORD', 'HASHED_PASSWORD')...
```
You can as well use the **bcrypt** helper I provided if you want:
```
$this->load->helper('bcrypt');
echo hash_password('PASSWORD')
// ANd to check the password, always load the helper first, then:
if (check_password('PASSWORD', 'HASHED_PASSWORD')...
```

# [DEMO](http://bit.ly/CI3GitHub)
On this demo, the current language is automatically handled according to browser's supported language.
It is stored in a _session_ + _cookie_. You can change the language by clicking the links on the page.

Enjoy using it and I hope it may be at least useful :)

> __LICENSE__:
>
> All licenses go to their respective owners (CodeIgniter, PHP-Gettext, Gas-ORM and Uhoh!)
>