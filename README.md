# MaxMVC
A lightweight MVC framework made just for fun!

## Introduction
MaxMVC is a PHP super-lightweight MVC framework constructed in 2 days, it started as a challenge I got requested, but it ended being a super fun quick journey throughout all the basic nuts and bolts that put a MVC framework to work. To construct it I based myself mostly in my own experience using other frameworks, but also in stackoverflow posts, blogs and youtube videos in an intention to use the best practices out there, and not completely reinvent the wheel.

In this readme file you will find how to use it to construct a basic site. If you are not a documentation reading guy, I recommend you to just download it and check the sample project included "My Favorite Movies" to see how to construct a basic CRUD site using MaxMVC framework.

## Quick Start Guide
In order to get your local environment set and ready to start your own development with MaxMVC, follow the next steps:

1. Open a terminal window (command if you are in windows)
2. Download or clone this repository<br>
`git clone https://github.com/maxhanglin/maxmvc.git`<br>
or `git clone git@github.com:maxhanglin/maxmvc.git` (if you use SSH)

4. Go to the folder where the repository was cloned<br>
i.e. `cd ~/my_projects/maxmvc`

5. Type:<br>
`php composer.phar install` (Make sure you have a PHP CLI version installed in your system)

6. (Optional) Create the sample project database and load the included dump<br>
`mysql -p -u[user] [database] < sample-db-dump.sql`

7. Open the project on your favorite text editor and edit the config file located in `app/config/globals.php`<br>
```php
/* Database Configuration Section */
"database" => array(
	"host" => "localhost", /* replace with your DB server host here */
	"username" => "root", /* replace with your DB server username here */
	"password" => "root", /* replace with your DB server password here */
	"dbname" => "movies" /* replace with your DB name here */
)
```

You are set to start working! Test it by going to the URL where you installed the project, i.e.: `http://www.maxmvc.dev/`. You should see something like this:<br><br>
![Home Screen](https://raw.githubusercontent.com/maxhanglin/maxmvc/master/screenshot.png "Home Screen")

*Note: Make sure you configure your hosts to be of the form "http://www.myhost.something/" and avoid using a prefixed directory like in the case "http://localhost/maxmvc" as your root domain. The router is very basic for now and has this limitation.*

## Controllers
Creating a new controller is really easy:

- Create a new file under `app/controllers`
- The new file should look like this

```php
<?php

class test {
	function index() {
		echo "My first controller";
	}
}
```

- If you navigate to `http://www.maxmvc.dev/test` you should see "My first controller" text printed on the top of the screen.
- You can create as much actions as you want, i.e. `http://www.maxmvc.dev/test/foo` will print "Foo action":
```php
<?php

class test {
	function index() {
		echo "My first controller";
	}
	function foo() {
		echo "Foo action";
	}
}
```

## Routing
By default, the system will use your [controller class_name + "/" + action_name] as the standard route for any of your actions. You can override this behavior by adding your configuration to the routes section.

For example, lets imagine you don't like to use `test/foo` for your URL, instead you want to get the foo text when you navigate to `test/my-first-action`. In that case you should update your config routing section this way:

```php
/* Routes Definition Section */
"routes" => array(
	array(
		"url" => "test/my-first-action",
		"controller" => "test",
		"action" => "foo"
	)
),
```

Now, imagine you want to send your own custom test to the foo action. First, lets edit the controller:

```php
	function foo($mytext) {
		echo "Foo action says ".$mytext;
	}
```

Second, edit the routes configuration to look like the one below:

```php
/* Routes Definition Section */
"routes" => array(
	array(
		"url" => "test/my-first-action/:mytext",
		"controller" => "test",
		"action" => "foo"
	)
),
```

Now, if you navigate to `http://www.maxmvc.dev/test/my-first-action/hello` you will see: *Foo action says hello*!!

## Views
All the views in MaxMVC are structured like `app/views/<controller-name>/<action-name>`. For example, and following our previous case of the `test/foo` controller, the organization should be like: `app/views/test/foo.php`.

### Layout
All the views use the default system layout (unless specified differently), defined in `app/layouts/default.php`, which implements a basic bootstrap template. 

### Content
The content will need to include only the HTML specific for that view, and any script needed. 

To give a basic example, lets implement the view for our test/foo action, and use it on the controller:

In `app/views/test/foo.php`:
```html
<!-- View for test/foo -->
<h1>Foo action says</h1>
<h3><?=$text?></h3>

<a href="#" id="showAlertBtn">Click me!</a>

<script type="text/javascript">
	$('document').ready(function() {
		$('#showAlertBtn').click(function() {
			alert("Thanks for clicking on me!");
		});
	});
</script>
```

In `app/controllers/test.php`:
```php
	function foo($mytext) {
		View::render("test/foo", ["text" => $mytext]);
	}
```

#### Specify a NO LAYOUT content
Sometimes, for example in AJAX responses, you don't need to render all the main layout again, but only some content specified in the view. In those cases, you can use the following directive in the controller, to render only the view contents:

```php
	function nolayout($mytext) {
		View::renderNoLayout("test/foo", ["text" => $mytext]);
	}
```

## Models
Models in MaxMVC are pretty much freeform to let you express your creativity while using them. However, here are a few lines of recommendations in order to follow the best practices.

Basic form:
```php
class MyModel extends BaseModel 
{	
	private $_name = "";
}
```

By using the above form you will be extending from `BaseModel`, the main utility of this base class for now, is to give you getters and setters for your members following the `$_<name>` structure. Using this base class is optional.

Now lets create a constructor and one method inside it:
```php
class MyModel extends BaseModel 
{	
	private $_name = "";
	
	function __construct($name) {
		$this->_name = $name;
	}
	
	function displayName() {
		return "The name is ".$this->_name;
	}
}
```

Use `MyModel` from the test controller is really simple, thanks to the autoload functionality:

```php
<?php

class test {
    function index() {
        echo "My first controller";
    }
    function foo($mytext) {
        View::render("test/foo", ["text" => $mytext]);
    }

    // Lets use the new model here
    function name() {
    	$myModel = new MyModel('Max');
    	View::render("test/foo", ["text" => $myModel->displayName()]);	
    }
}
```

## Database
The approach used for giving MaxMVC database capabilities was to make a wrapper to this very cool featured library:<br>
https://github.com/joshcam/PHP-MySQLi-Database-Class

In order to use it inside MaxMVC just do:
```php
$DB = new Database();
```

and to get all the records from the *test* table, do:
```php
$DB = new Database();
$result = $DB->connection()->get('test');
```

Please check the library README file [here](https://github.com/joshcam/PHP-MySQLi-Database-Class/blob/master/readme.md) and also check the [Movie Model](https://github.com/maxhanglin/maxmvc/blob/master/app/models/Movie.php) included in the sample project to get an idea of how to use the database functionalities.
