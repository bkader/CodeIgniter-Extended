# CodeIgniter Extended

I am a very big **fan** of **CodeIgniter** ! I love the way the framework handles everything. Except for languages :)
It is nice to have all language lines inside an array but there is a much better way, the one I prefer, which is **gettext**.

This is why I added the [PHP-GETTEXT Library](https://launchpad.net/php-gettext/) replacing all core language lines with lines I added in a **.po** file that you can edit as you wish.

I also added [Gas ORM 2](http://www.codingdrama.com/gas-orm/) inside the __system__ folder that you can call like so:
* $this->load->library('gas'); *(Or simply autoload it instead of the database library)*

I also added the Uhoh *MY_Exceptions.php* file into "application/core/" folder.

Enjoy using it and I hope it may be at least useful :)

__LICENSE__
All licenses go to their respective owners (CodeIgniter, PHP-Gettext, Gas-ORM and Uhoh!)