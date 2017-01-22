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

You are set to start working! Test it by going to the URL where you installed the project, i.e.: `http://localhost/maxmvc`. You should see something like this:<br>
![Home Screen](https://raw.githubusercontent.com/maxhanglin/maxmvc/master/screenshot.png "Home Screen")
